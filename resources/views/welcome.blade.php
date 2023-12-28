@extends('layouts.extends.app')

@section('content')

    <section class="header">
        <nav>
            <!-- <a href=""><img src="{{ asset('images/logo4.jpg') }}" width="40px" height="40px" alt=""></a> -->
            <div class="nav-links" id="navLinks">
                <i class="bi bi-x" onclick="hideMenu()"></i>
                <ul>
                    <li><a href="#">HOME</a></li>
                    <li><a href="#">ABOUT</a></li>
                    <li><a href="{{ url('/course') }}">COURSE</a></li>
                    <li><a href="#">PUBLICATION</a></li>
                    <li><a href="{{ url('/login') }}">LOGIN</a></li>
                    <li><a href="#">CONTACT</a></li>
                </ul>
            </div>
            <i class="bi bi-arrow-bar-left" onclick="showMenu()"></i>
        </nav>
        <div class="text-box">
            <h1>World's Biggest University</h1>
            <p>
                Making website is now one of the easiest thing in the world. You just need to learn HTML, CSS, <br> Javascript and you are good to go.
            </p>
            <a href="" class="hero-btn">Visit Us To Know More</a>
        </div>
    </section>

    <script src="{{ asset('styles/js/main.js') }}"></script>

@endsection