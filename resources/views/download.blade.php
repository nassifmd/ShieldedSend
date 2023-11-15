@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">File Download</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('download') }}" id="downloadForm">
                        @csrf

                        <div class="form-group">
                            <label for="serial_number">Serial Number</label>
                            <input type="text" name="serial_number" id="serial_number" class="form-control" required>
                        </div>

                        <button type="button" id="decryptAndDownload" class="btn btn-primary">Decrypt and Download</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
