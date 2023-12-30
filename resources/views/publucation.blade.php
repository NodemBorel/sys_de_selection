@extends('layouts.extends.new')

@section('content')

@include('layouts.includes.navbar')

<div class="container-fluid px-4">
    <div class="py-3"></div>
    <div class="dropdown">
        <button class="btn btn-primary btn-lg dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
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
      </div>
    <div class="card mt-4">
        <div class="card-header">
            <h4>Liste Des Etudiant  &nbsp;&nbsp;&nbsp;  <b>{{$niveau}}</b></h4>
        </div>
        <div class="card-body">    
            <table id="myDataTable" class="table table-bordered">
                <thead>
                    <tr>
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
                    @foreach($etudiants as $etudiant)
                    <tr>
                        <td>{{ $etudiant->id }}</td>
                        <td>{{ $etudiant->nom }}</td>
                        <td>{{ $etudiant->prenom }}</td>
                        <td>{{ $etudiant->sexe}}</td>
                        <td>{{ $etudiant->region}}</td>
                        <td>{{ $etudiant->dateNaiss}}</td>
                        <td>{{ $etudiant->filiere}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div> 

    </div>   
</div>

@endsection