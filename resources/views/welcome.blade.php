@extends('layouts.app')
@extends('nav.navbar')

@section('content')
<style>
    
</style>

<section class="hero">
    <div class="container">
        <h2>A Secured Way of Sending Files</h2>
        <h5>Top-tier security algorithm and compression for peak protection and efficiency.</h5>
        <div class="lottie-player-container">
            <dotlottie-player
                src="https://lottie.host/c14cb8a8-9762-4d99-8846-bfcc13cd40c2/rzWIQzwJAh.json"
                background="transparent"
                speed="1"
                style="width: 300px; height: 300px;"
                loop
                autoplay
                class="floating-lottie-player"
            ></dotlottie-player>
        </div>
        <div class="lottie-player-container1">
            <dotlottie-player
                src="https://lottie.host/63b1f8f1-95b3-41f9-b49c-877a7cfa9cfc/uAhYYoheai.json"
                background="transparent"
                speed="1"
                style="width: 300px; height: 300px;"
                loop
                autoplay
                class="floating-lottie-player1"
            ></dotlottie-player>
        </div>
        <p>No need to signup</p>
        <a href="{{ url('upload')}}" class="cta-button">Send files</a>
        <a href="{{('download')}}" class="cta-button">Download files</a>
        
    </div>
</section>
    <section class="content">
        <div class="instructions">How to Use </div>
        <div class="containa">
            <div class="silhouette" id="Bulbasaur"><div class="cover"></div></div>
                <div class="cards">
                    <h1>Upload</h1>
                    <div class="information" id="BulbasaurInfo">
                    <h2 id="BulbasaurName">Upload</h2>
                    <p>Easily secure your files by uploading one or more documents, and then safeguard your unique serial number with encryption.</p>
                </div>
            </div>
        </div>

        <div class="containa">
            <div class="silhouette" id="Charmander"><div class="cover"></div></div>
                <div class="cards">
                    <h1>Encrypt</h1>
                    <div class="information" id="CharmanderInfo">
                    <h2 id="CharmanderName">Encrypt</h2>
                    <p>We use advanced encryption techniques, involving four prime numbers and offline key generation, to enhance the security of your files.</p> 
                </div>
            </div>
        </div>

        <div class="containa">
            <div class="silhouette" id="Squirtle"><div class="cover"></div></div>
                <div class="cards">
                    <h1>Download</h1>
                    <div class="information" id="SquirtleInfo">
                    <h2 id="SquirtleName">Decrypt & Download</h2>
                    <p>This takes place on the recipient's side. We decrypt the code and compress it to confirm that you are the intended recipient.</p>
                </div>
            </div>
        </div>
    </section>

    <footer>
        <p>&copy; 2023 Secure Solutions. All rights reserved.</p>
    </footer>

    <script src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/16327/gsap-latest-beta.min.js"></script>
    <script>
   
    </script>
    @endsection
