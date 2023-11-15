<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\File;
use Illuminate\Support\Facades\Storage;
use phpseclib\Crypt\RSA;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Crypt;
use ZipArchive;

class FileController extends Controller
{
    public function index()
    {
        $serial_number = Str::random(16); // Generate a random private key
        return view('upload', compact('serial_number'));
    }

    public function upload(Request $request)
    {
        $serial_number = Str::random(16); // Generate a random serial key
        $private_key = Str::random(16); // Generate a random private key

        $request->validate([
            'files.*' => 'required|mimes:pdf,doc,docx', // Add more allowed file types
        ]);

        $uploadedFiles = $request->file('files');

        foreach ($uploadedFiles as $file) {
            // Generate a public and private key pair for each file
            $rsa = new RSA();
            $key = $rsa->createKey();
            $public_key = $key['publickey'];
            $encrypted_private_key = Crypt::encrypt($private_key); // Store the private key securely

            // Upload the file to storage
            $file_path = $file->store('uploads');

            // Save file information to the database
            File::create([
                'file_path' => $file_path,
                'public_key' => $public_key,
                'private_key' => $encrypted_private_key,
                'serial_number' => $serial_number, // Include the serial number here
            ]);
        }

        return view('upload', compact('private_key', 'serial_number'))->with('message', 'Files uploaded successfully.');
    }

    public function downloadForm()
    {
        $private_key = Str::random(16); // Generate a random private key or retrieve it from your data source
        return view('download', compact('private_key'));
    }

    public function download(Request $request)
{
    $request->validate([
        'serial_number' => 'required', // Validate the input
    ]);

    // Retrieve all files with the provided serial number
    $files = File::where('serial_number', $request->input('serial_number'))->get();

    if ($files->isEmpty()) {
        return redirect()->back()->with('error', 'No files found for the given serial number.');
    }

    // Create a temporary directory to store the files
    $tempDirectory = sys_get_temp_dir() . '/' . uniqid();

    if (!file_exists($tempDirectory)) {
        mkdir($tempDirectory);
    }

    // Iterate through the retrieved files
    foreach ($files as $file) {
        // Decrypt the private key
        $privateKey = Crypt::decrypt($file->private_key);

        // Get the file path
        $filePath = storage_path('app/' . $file->file_path);

        // Copy the file to the temporary directory
        copy($filePath, $tempDirectory . '/' . basename($filePath));
    }

    // Create a zip file
    $zipFileName = 'files_' . $request->input('serial_number') . '.zip';
    $zipFilePath = sys_get_temp_dir() . '/' . $zipFileName;

    $zip = new ZipArchive;
    if ($zip->open($zipFilePath, ZipArchive::CREATE | ZipArchive::OVERWRITE) === true) {
        // Add files to the zip archive
        $filesInTempDirectory = scandir($tempDirectory);
        foreach ($filesInTempDirectory as $file) {
            if ($file != '.' && $file != '..') {
                $zip->addFile($tempDirectory . '/' . $file, $file);
            }
        }
        $zip->close();
    }

    // Delete the temporary directory
    $this->deleteTempDirectory($tempDirectory);

    // Offer the zip file for download
    return response()->download($zipFilePath)->deleteFileAfterSend(true);
}

// Helper function to delete the temporary directory
private function deleteTempDirectory($directory)
{
    if (is_dir($directory)) {
        $files = glob($directory . '/*');
        foreach ($files as $file) {
            is_dir($file) ? $this->deleteTempDirectory($file) : unlink($file);
        }
        rmdir($directory);
    }
}

}

    