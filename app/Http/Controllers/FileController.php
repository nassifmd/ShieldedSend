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
            // Generate a random private key
            $serial_number = Str::random(16); 
            return view('upload', compact('serial_number'));
        }
      
        public function upload(Request $request)
        {
            // Generate a random serial key
            $serial_number = Str::random(16); 
            // Generate a random private key
            $private_key = Str::random(16); 
    
            $request->validate([
                'files.*' => 'required|mimes:pdf,doc,docx',
            ]);
    
            $uploadedFiles = $request->file('files');
    
            foreach ($uploadedFiles as $file) {
                $rsa = new RSA();
                $key = $rsa->createKey();
                $public_key = $key['publickey'];
                $encrypted_private_key = Crypt::encrypt($private_key);
    
                $file_path = $file->store('uploads');
    
                File::create([
                    'file_path' => $file_path,
                    'public_key' => $public_key,
                    'private_key' => $encrypted_private_key,
                    'serial_number' => $serial_number,
                ]);
            }
    
            return redirect()->route('showPrivateKey', ['serial_number' => $serial_number])
                ->with('message', 'Files uploaded successfully.');
        }
    
        public function showPrivateKey($serial_number)
        {
            $storedPrivateKey = File::where('serial_number', $serial_number)->value('private_key');
    
            return view('showPrivateKey', compact('storedPrivateKey'));
        }


    public function downloadForm()
    {
        $private_key = Str::random(16);
        return view('download', compact('private_key'));
    }

    public function download(Request $request)
    {
        $request->validate([
            'private_key' => 'required',
        ]);
  
        $file = File::where('private_key', Crypt::encrypt($request->input('private_key')))->first();
    
        if (!$file) {
            return redirect()->back()->with('error', 'No file found for the given private key.');
        }
    
        //directory to store the file
        $tempDirectory = sys_get_temp_dir() . '/' . uniqid();
    
        if (!file_exists($tempDirectory)) {
            mkdir($tempDirectory);
        }
    
        // Decrypt the private key
        $privateKey = Crypt::decrypt($file->private_key);
    
        $filePath = storage_path('app/' . $file->file_path);
    
        // Copy the file to the directory
        copy($filePath, $tempDirectory . '/' . basename($filePath));
    
        // zip file
        $zipFileName = 'file_' . $file->id . '.zip';
        $zipFilePath = sys_get_temp_dir() . '/' . $zipFileName;
    
        $zip = new ZipArchive;
        if ($zip->open($zipFilePath, ZipArchive::CREATE | ZipArchive::OVERWRITE) === true) {

            $zip->addFile($tempDirectory . '/' . basename($filePath), basename($filePath));
            $zip->close();
        }
    
        $this->deleteTempDirectory($tempDirectory);

        return response()->download($zipFilePath)->deleteFileAfterSend(true);
    }
    

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

    