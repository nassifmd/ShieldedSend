@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">File Upload</div>

                <div class="card-body">
                    @if(session('message'))
                        <div class="alert alert-success">{{ session('message') }}</div>
                    @endif

                    @if(session('error'))
                        <div class="alert alert-danger">{{ session('error') }}</div>
                    @endif

                    <form method="POST" action="{{ route('upload') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label for="file">Upload File</label>
                            <input type="file" name="files[]" id="file" class="form-control" multiple required>
                        </div>

                        <div class="form-group">
                            <label for="serial_number">Serial Number</label>
                            <input type="text" name="serial_number" id="serial_number" class="form-control" required>
                        </div>

                        <button type="button" id="encryptSerial" class="btn btn-primary">Encrypt and Show Serial</button>

                        <div id="encryptedSerialPopup" style="display: none;">
                            <p><strong>Encrypted Serial Number:</strong></p>
                            <p id="encryptedSerialValue"></p>
                        </div>

                        <button type="submit" class="btn btn-primary">Upload</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
