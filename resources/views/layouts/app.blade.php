<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'ShieldedSend') }}</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- Include the CSS file in your Blade views -->
    <link rel="stylesheet" href="{{ asset('styles.css') }}">
</head>
<body>
    <!-- <header class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <div class="container">
            <a style="color: #fff" class="navbar-brand" href="{{ url('/') }}">
                {{ config('app.name', 'ShieldedSend') }}
            </a>
        </div>
</header> -->

    <main>
        @yield('content')
    </main>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/3.1.9-1/crypto-js.js"></script>
    <script src="https://unpkg.com/gsap@3.9.2/dist/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
    <script src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/16327/gsap-latest-beta.min.js"></script>
    <script src="index.js"></script>
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
