@extends('layouts.extends.login')

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
                    <li class="dropdown"><a href="#"><span>Niveau</span> <i
                                class="bi bi-chevron-down dropdown-indicator"></i></a>
                        <ul>
                            <li><a href="{{ url('/publication') }}">Licence I</a></li>
                            <li><a href="{{ url('/pub-licence2') }}">Licence II</a></li>
                            <li><a href="{{ url('/pub-licence3') }}">Licence III</a></li>
                            <li><a href="{{ url('/pub-master1') }}">Master I</a></li>
                            <li><a href="{{ url('/pub-master2') }}">Master II</a></li>
                            <li><a href="{{ url('/pub-doctorat') }}">PHD</a></li>
                        </ul>
                    </li>
                </ul>
            </nav>

            <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
            <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>

        </div>
    </header>
    <!-- End Header -->
    <section>
        <div class="my-3 p">
            <h2 style="text-align: center; color:rgb(0, 130, 115);">
                LISTE DES CANDIDATS SELCTIONNES POUR LA &nbsp; <b>{{ $niveau }}</b>
            </h2>
            <div class="py-1"></div>
            <!--- <div class="dropdown">
                                <button class="btn btn-primary btn-lg dropdown-toggle" type="button" id="dropdownMenuButton"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    Choisie ta filiere
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="{{ url('/publication') }}">Licence 1</a>
                                    <a class="dropdown-item" href="{{ url('/pub-licence2') }}">Licence 2</a>
                                    <a class="dropdown-item" href="{{ url('/pub-licence3') }}">Licence 3</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="{{ url('/pub-master1') }}">Master 1</a>
                                    <a class="dropdown-item" href="{{ url('/pub-master2') }}">Master 2</a>
                                    <a class="dropdown-item" href="{{ url('/pub-doctorat') }}">Doctorat</a>
                                </div>
                            </div> -->
            <div class="card mt-4">
                <div class="card-header">
                    <!--- <h4>Liste Des Etudiant &nbsp;&nbsp;&nbsp; <b>{{ $niveau }}</b></h4>  ---->
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover" id="myDataTablePub" class="table table-bordered">
                            <thead style=" text-align: center;" class="table-bordered">
                                <tr style="background-color:rgb(0, 130, 115); text-align: center; color:antiquewhite">
                                    <th>ID</th>
                                    <th>Nom</th>
                                    <th>Prenom</th>
                                    <th>Sexe</th>
                                    <th>region</th>
                                    <th>Date de naissance</th>
                                    <th>Filiere</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($etudiants as $etudiant)
                                    <tr>
                                        <td>{{ $etudiant->id }}</td>
                                        <td>{{ $etudiant->nom }}</td>
                                        <td>{{ $etudiant->prenom }}</td>
                                        <td>{{ $etudiant->sexe }}</td>
                                        <td>{{ $etudiant->region }}</td>
                                        <td>{{ $etudiant->dateNaiss }}</td>
                                        <td>{{ $etudiant->filiere }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
    </section>
@endsection
