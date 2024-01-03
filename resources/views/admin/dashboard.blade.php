@extends('layouts.extends.new')

@section('content')

<h1>Welcome Here {{ $data->firstName }}</h1>
<a href="{{ url('/logout') }}">logout</a>

@include('layouts.includes.navbar')

<div class="container py-5">
    <h2 class="text-center">On Hover Change Icon Color</h2>
    <div class="row row-cols-1 row-cols-md-3 g-4 py-5">
        <div class="col">
            <a href="{{ url('/licence1') }}" style="text-decoration: none">
                <div class="card">
                    <i class="bi bi-x"></i>
                    <div class="card-body">
                        <h5 class="card-title">Niveau 1</h5>
                        <p class="card-text">
                            Lorem ipsum, dolor sit amet consectetur adipisicing
                            elit. Debitis placeat odio facere vero voluptatem dolor
                            itaque exercitationem dolore nam doloribus.
                        </p>
                    </div>
                </div>
            </a>
        </div>
        <div class="col">
            <a href="{{ url('/licence2') }}" style="text-decoration: none">
                <div class="card">
                    <i class="bi bi-x"></i>
                    <div class="card-body">
                        <h5 class="card-title">Niveau 2</h5>
                        <p class="card-text">
                            Lorem ipsum, dolor sit amet consectetur adipisicing
                            elit. Debitis placeat odio facere vero voluptatem dolor
                            itaque exercitationem dolore nam doloribus.
                        </p>
                    </div>
                </div>
            </a>    
        </div>
        <div class="col">
            <a href="{{ url('/licence3') }}" style="text-decoration: none">
                <div class="card">
                    <i class="bi bi-x"></i>
                    <div class="card-body">
                        <h5 class="card-title">Niveau 3</h5>
                        <p class="card-text">
                            Lorem ipsum, dolor sit amet consectetur adipisicing
                            elit. Debitis placeat odio facere vero voluptatem dolor
                            itaque exercitationem dolore nam doloribus.
                        </p>
                    </div>
                </div>
            </a>
        </div>
        <div class="col">
            <a href="{{ url('/master1') }}" style="text-decoration: none">
                <div class="card">
                    <i class="bi bi-x"></i>
                    <div class="card-body">
                        <h5 class="card-title">Master 1</h5>
                        <p class="card-text">
                            Lorem ipsum, dolor sit amet consectetur adipisicing
                            elit. Debitis placeat odio facere vero voluptatem dolor
                            itaque exercitationem dolore nam doloribus.
                        </p>
                    </div>
                </div>
            </a>
        </div>
        <div class="col">
            <a href="{{ url('/master2') }}" style="text-decoration: none">
                <div class="card">
                    <i class="bi bi-x"></i>
                    <div class="card-body">
                        <h5 class="card-title">Master 2</h5>
                        <p class="card-text">
                            Lorem ipsum, dolor sit amet consectetur adipisicing
                            elit. Debitis placeat odio facere vero voluptatem dolor
                            itaque exercitationem dolore nam doloribus.
                        </p>
                    </div>
                </div>
            </a>
        </div>
        <div class="col">
            <a href="{{ url('/phd') }}" style="text-decoration: none">
                <div class="card">
                    <i class="bi bi-x"></i>
                    <div class="card-body">
                        <h5 class="card-title">Doctorat</h5>
                        <p class="card-text">
                            Lorem ipsum, dolor sit amet consectetur adipisicing
                            elit. Debitis placeat odio facere vero voluptatem dolor
                            itaque exercitationem dolore nam doloribus.
                        </p>
                    </div>
                </div>
            </a>
        </div>
    </div>
</div>

@include('layouts.includes.footer')

@endsection