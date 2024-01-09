@extends('layouts.extends.login')

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
    @if (session('message'))
        <div class="alert alert-success alert-dismissible fade show shadow" role="alert">
            <strong>{{ session('message') }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div class="container">
        <div class="login">
            <div class="row">
                <div class="col-md-6 login-left">
                    <img src="{{ asset('images/admin_icon.svg') }}" class="mx-4" style="height: 140px" width="170px"
                        alt="logo">
                    <h3 style="color: black;"> Welcome back</h3>
                </div>
                <div class="col-md-6 login-right">
                    <form action="{{ url('/login-user') }}" method="post">
                        @csrf
                        <h3>Connexion</h3>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>

                        <div class="form-group">
                            <label for="password">Mot de passe</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div><br>

                        <button type="submit" class="btn"
                            style="margin-left: 20%;background-color:rgb(0, 130, 115); color: black;">Se connecter</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
