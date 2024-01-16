@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">File Download</div>

                <div class="card-body">
                    @if(session('message'))
                        <div class="alert alert-success">{{ session('message') }}</div>
                    @endif

                    <form method="POST" action="{{ route('download') }}" id="downloadForm">
                        @csrf

                        <div class="form-group">
                            <label for="serial_number">Serial Number</label>
                            <input type="text" name="serial_number" id="serial_number" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="private_key">Private Key</label>
                            <input type="text" name="private_key" id="private_key" class="form-control" required>
                        </div>

                        <button type="button" id="decryptAndDownload" class="btn btn-primary">Decrypt and Download</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        function decryptSerial(encryptedSerial, secretKey) {
            var decryptedSerial = CryptoJS.AES.decrypt(encryptedSerial, secretKey);
            return decryptedSerial.toString(CryptoJS.enc.Utf8);
        }

        document.getElementById('decryptAndDownload').addEventListener('click', function() {
            var serialNumberInput = document.getElementById('serial_number');
            var privateKeyListener = document.getElementById('private_key');
            var serialNumber = serialNumberInput.value;
            var privateKey = privateKeyListener.value;

            if (serialNumber && privateKey) {
                axios.post('/validatePrivateKey', {
                    serial_number: serialNumber,
                    private_key: privateKey,
                })
                .then(function (response) {
                    document.getElementById('downloadForm').submit();
                })
                .catch(function (error) {
                    alert('Invalid private key. Please try again.');
                });
            }
        });
    });
</script>

@endsection
