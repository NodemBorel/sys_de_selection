@extends('layouts.extends.app') 

@section('content')

@include('layouts.includes.navbar')

<div class="container py-5">
    <h2 class="text-center">On Hover Change Icon Color</h2>
    <div class="row row-cols-1 row-cols-md-3 g-4 py-5">
        <div class="col">
            <a href="{{ url('/licence-1') }}" style="text-decoration: none">
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
            <a href="{{ url('/licence-2') }}" style="text-decoration: none">
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
            <a href="{{ url('/licence-3') }}" style="text-decoration: none">
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
            <a href="{{ url('/master-1') }}" style="text-decoration: none">
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
            <a href="{{ url('/master-2') }}" style="text-decoration: none">
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
            <a href="{{ url('/doctorat') }}" style="text-decoration: none">
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
