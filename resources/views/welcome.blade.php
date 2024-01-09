@extends('layouts.extends.app')

@section('content')
    <!-- ======= Header ======= -->

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
    </header><!-- End Header -->
    <!-- End Header -->

    <!-- ======= Hero Section ======= -->
    <section id="hero" class="hero">
        <div class="container position-relative">
            <div class="row gy-5" data-aos="fade-in">
                <div
                    class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center text-center text-lg-start">
                    <h2>BIENVENUE SUR LE SITE DE SÉLECTION DE L'UNIVERSITÉ <span>DE YAOUNDÉ I</span></h2>
                    <p>Desirez vous poursuivre vos etude a la faculte des sciences de l'université de Yaoundé I ?</p>
                </div>
                <div class="col-lg-6 order-1 order-lg-2">
                    <img src="{{ asset('images/hero-img.svg') }}" class="img-fluid" alt="" data-aos="zoom-out"
                        data-aos-delay="100">
                </div>
            </div>
        </div><br><br>

        <div class="container px-4">
            <div class="row gx-4 justify-content-center">
                <div class="col-lg-8">
                    <div class="service-item">
                        <h2>Nos Programmes</h2>
                        <p>
                            L'Université de Yaoundé I propose une variété de programmes d'études dans divers domaines tels
                            que les sciences, les arts, les sciences sociales, les langues, l'informatique, etc. Nos
                            programmes sont conçus pour répondre aux besoins des étudiants et les préparer pour une carrière
                            réussie dans leurs domaines respectifs.
                        </p>
                        <p>
                            Notre processus de sélection est basé sur des critères rigoureux pour garantir que seuls les
                            meilleurs étudiants sont admis dans nos programmes.
                        </p>
                    </div>
                </div>
            </div>
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
