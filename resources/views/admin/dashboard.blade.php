@extends('layouts.extends.new')

@section('content')

@include('layouts.includes.navbarAdmin')

<style>
    .card:hover {
        transform: scale(1.05);
    }
</style>

<div class="container py-5">
    <h2 class="text-center">Welcome Here Admin <b>{{ $data->firstName }}</b></h2>
    <div class="row row-cols-1 row-cols-md-3 g-4 py-5">
        <div class="col">
            <a href="{{ url('/licence1') }}" style="text-decoration: none">
                <div class="card" style="transition: transform 0.3s;">
                    <i class="bi bi-x"></i>
                    <div class="card-body">
                        <h5 class="card-title">Niveau 1</h5>
                        <div class="py-1"></div>
                        <p class="card-text">  
                            <li>{{ $rowCounts['L1'] }} Postulants</li>
                        </p>
                    </div>
                </div>
            </a>
        </div>
        <div class="col">
            <a href="{{ url('/licence2') }}" style="text-decoration: none">
                <div class="card" style="transition: transform 0.3s;">
                    <i class="bi bi-x"></i>
                    <div class="card-body">
                        <h5 class="card-title">Niveau 2</h5>
                        <div class="py-1"></div>
                        <p class="card-text"> 
                            <li>{{ $rowCounts['L2'] }} Postulants</li> 
                        </p>
                    </div>
                </div>
            </a>    
        </div>
        <div class="col">
            <a href="{{ url('/licence3') }}" style="text-decoration: none">
                <div class="card" style="transition: transform 0.3s;">
                    <i class="bi bi-x"></i>
                    <div class="card-body">
                        <h5 class="card-title">Niveau 3</h5>
                        <div class="py-1"></div>
                        <p class="card-text">  
                            <li>{{ $rowCounts['L3'] }} Postulants</li>
                        </p>
                    </div>
                </div>
            </a>
        </div>
        <div class="col">
            <a href="{{ url('/master1') }}" style="text-decoration: none">
                <div class="card" style="transition: transform 0.3s;">
                    <i class="bi bi-x"></i>
                    <div class="card-body">
                        <h5 class="card-title">Master 1</h5>
                        <div class="py-1"></div>
                        <p class="card-text">  
                            <li>{{ $rowCounts['M1'] }} Postulants</li>
                        </p>
                    </div>
                </div>
            </a>
        </div>
        <div class="col">
            <a href="{{ url('/master2') }}" style="text-decoration: none">
                <div class="card" style="transition: transform 0.3s;">
                    <i class="bi bi-x"></i>
                    <div class="card-body">
                        <h5 class="card-title">Master 2</h5>
                        <div class="py-1"></div>
                        <p class="card-text">  
                            <li>{{ $rowCounts['M2'] }} Postulants</li>
                        </p>
                    </div>
                </div>
            </a>
        </div>
        <div class="col">
            <a href="{{ url('/phd') }}" style="text-decoration: none">
                <div class="card" style="transition: transform 0.3s;">
                    <i class="bi bi-x"></i>
                    <div class="card-body">
                        <h5 class="card-title">Doctorat</h5>
                        <div class="py-1"></div>
                        <p class="card-text">  
                            <li>{{ $rowCounts['PHD'] }} Postulants</li>
                        </p>
                    </div>
                </div>
            </a>
        </div>
    </div>
</div>

@include('layouts.includes.footer')

@endsection