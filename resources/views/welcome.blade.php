@extends('layouts.app')
@extends('nav.navbar')

@section('content')
<style>

</style>

    <section class="hero">
        <div class="container">
            <h2>A Secured Way of Sending Files</h2>
            <h2>Based on R.S.A Algorithm & Huffman Coding Compression technique</h2>
            <p>No need to signup</p>
            <a href="{{ url('upload')}}" class="cta-button">Send files</a>
            <a href="{{('download')}}" class="cta-button">Download files</a>
        </div>
    </section>

    <!-- how to use -->
    <section class="content">
        <div class="instructions">How to Use </div>
        <div class="containa">
            <div class="silhouette" id="Bulbasaur"><div class="cover"></div></div>
                <div class="cards">
                    <h1>Secure</h1>
                    <div class="information" id="BulbasaurInfo">
                    <h2 id="BulbasaurName">Upload</h2>
                    <p>Bulbasaur can be seen napping in bright sunlight. There is a seed on its back. By soaking up the sun's rays, the seed grows progressively larger.</p>
                    <p class="type">Type: <button id="grass">Grass</button> <button id=poison>Poison</button></p>
                </div>
            </div>
        </div>

        <div class="containa">
            <div class="silhouette" id="Charmander"><div class="cover"></div></div>
                <div class="cards">
                    <h1>Your</h1>
                    <div class="information" id="CharmanderInfo">
                    <h2 id="CharmanderName">Encrypt & Decrypt</h2>
                    <p>The flame that burns at the tip of its tail is an indication of its emotions. The flame wavers when Charmander is enjoying itself. If the Pokémon becomes enraged, the flame burns fiercely.</p> 
                    <p class="type">Type: <button id="fire">Fire</button>
                </div>
            </div>
        </div>

        <div class="containa">
            <div class="silhouette" id="Squirtle"><div class="cover"></div></div>
                <div class="cards">
                    <h1>Files?</h1>
                    <div class="information" id="SquirtleInfo">
                    <h2 id="SquirtleName">Download</h2>
                    <p>Squirtle's shell is not merely used for protection. The shell's rounded shape and the grooves on its surface help minimize resistance in water, enabling this Pokémon to swim at high speeds.</p>
                    <p class="type">Type: <button id="water">Water</button>
                </div>
            </div>
        </div>

        <div class="instructions">How to Use </div>
    </section>
 
    <section id="features" class="features">
        <div class="container">
            <div class="feature">
                <img src="icon1.png" alt="Icon 1">
                <h3>24/7 Monitoring</h3>
                <p>Our systems are actively monitoring your security round the clock.</p>
            </div>
            <div class="feature">
                <img src="icon2.png" alt="Icon 2">
                <h3>Advanced Encryption</h3>
                <p>We use cutting-edge encryption technologies to safeguard your data.</p>
            </div>
            <div class="feature">
                <img src="icon3.png" alt="Icon 3">
                <h3>Access Control</h3>
                <p>Manage and control access to your premises with our secure solutions.</p>
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
