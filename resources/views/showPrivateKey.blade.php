@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Private Key</div>

                <div class="card-body">
                    @if(session('message'))
                        <div class="alert alert-success">{{ session('message') }}</div>
                    @endif

                    @if(isset($storedPrivateKey))
                        <p><strong>Private Key:</strong></p>
                        <p id="privateKeyText">{{ $storedPrivateKey }}</p>

                        <!-- Button to copy private key to clipboard -->
                        <button class="btn btn-primary" onclick="copyToClipboard('privateKeyText')">Copy to Clipboard</button>
                    @else
                        <p>No private key found for the provided serial number.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<!-- JavaScript to copy text to clipboard -->
<script>
    function copyToClipboard(elementId) {
        /* Get the text field */
        var copyText = document.getElementById(elementId);

        /* Create a range to select the text */
        var range = document.createRange();
        range.selectNode(copyText);

        /* Select the text */
        window.getSelection().removeAllRanges(); // Clear previous selection
        window.getSelection().addRange(range);

        /* Copy the text to the clipboard */
        document.execCommand('copy');

        /* Clear the selection range (optional) */
        window.getSelection().removeAllRanges();

        /* Provide some feedback to the user (you can use a tooltip, alert, etc.) */
        alert('Private key copied to clipboard!');
    }
</script>

@endsection
