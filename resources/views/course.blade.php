@extends('layouts.extends.app')

@section('content')
    <header id="header" class="header d-flex align-items-center">

        <div class="container-fluid container-xl d-flex align-items-center justify-content-between">
            <a href="{{ url('/') }}" class="logo d-flex align-items-center">
                <img src="{{ asset('images/UY1.jpg') }}" alt="logo">
                <h1>UYI<span>.</span></h1>
            </a>
            <nav id="navbar" class="navbar">
                <ul>
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li><a href="{{ url('/course') }}">Candidat</a></li>
                    <li><a href="{{ url('/publication') }}">Publication</a></li>
                    <li><a href="{{ url('/login') }}">Administrateur</a></li>
                </ul>
            </nav>

            <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
            <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>

        </div>
    </header>
    <!-- End Header -->

    <!-- ======= Hero Section ======= -->
    <section id="hero" class="hero">
        <div class="container position-relative">
            <div class="row gy-5" data-aos="fade-in">
                <div
                    class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center text-center text-lg-start">
                    <h2>Bienvennue a toi <span>Future etudiant de UYI</span></h2>
                    <p>Ici tu peut t'inscrire pour un niveau specifique allant de Licence I jusqu'au Doctorat (PHD), afin
                        d'integrer la faculté des sciences de l'université de Yaoundé</p>
                    <div class="d-flex justify-content-center justify-content-lg-start">

                    </div>
                </div>
                <div class="col-lg-6 order-1 order-lg-2">
                    <img src="{{ asset('images/hero-img.svg') }}" class="img-fluid" alt="" data-aos="zoom-out"
                        data-aos-delay="100">
                </div>
            </div>
        </div>
    </section>


    <!-- ======= Recent Blog Posts Section style="background-color:rgb(0, 130, 115);" ======= -->
    <section id="recent-posts" class="recent-posts sections-bg">
        <div class="container" data-aos="fade-up">

            <div class="row gy-4">
                @foreach ($links as $link)
                    <div class="col-xl-4 col-md-6">
                        <article>

                            <div class="post-img">
                                <a href="{{ $link['url'] }}" @if($link['blocked'] == "true") class="blocked" @elseif($link['blocked'] == "false") class="ol" @else class="o" @endif><img src="{{ $link['img'] }}" alt=""
                                        class="img-fluid"></a>
                            </div>

                            <h2 class="title">
                                <a href="{{ $link['url'] }}" @if($link['blocked'] == "true") class="blocked" @elseif($link['blocked'] == "false") class="ol" @else class="o" @endif>{{ $link['name'] }}</a>
                            </h2>

                            <div class="d-flex align-items-center">
                                <div class="post-meta">
                                </div>
                            </div>

                        </article>
                    </div>
                @endforeach
            </div><!-- End recent posts list -->

        </div>
    </section>

    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">
        <div class="container">
            <div class="row gy-4">
                <div class="col-lg-5 col-md-12 footer-info">
                    <a href="{{ url('/') }}" class="logo d-flex align-items-center">
                    </a>
                </div>

            </div>
        </div>
    </footer>
    <!-- End Footer -->

    <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- <div id="preloader"></div> -->
@endsection
