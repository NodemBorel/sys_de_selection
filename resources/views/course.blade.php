@extends('layouts.extends.app') 

@section('content')

@include('layouts.includes.navbar')

<div class="container py-5">
    <h2 class="text-center">On Hover Change Icon Color</h2>
    <div class="row row-cols-1 row-cols-md-3 g-4 py-5">
        @foreach($links as $link)
        <div class="col">
            <a href="{{ $link['url'] }}" @if($link['blocked'] == "true") class="blocked" @elseif($link['blocked'] == "false") class="ol" @else class="o" @endif style="text-decoration: none">
                <div class="card">
                    <i class="bi bi-x"></i>
                    <div class="card-body">
                        <h5 class="card-title">{{ $link['name'] }}</h5>
                        <p class="card-text">
                            Lorem ipsum, dolor sit amet consectetur adipisicing
                            elit. Debitis placeat odio facere vero voluptatem dolor
                            itaque exercitationem dolore nam doloribus.
                        </p>
                    </div>
                </div>
            </a>
        </div>
        @endforeach
    </div>
</div>

@include('layouts.includes.footer')

@endsection
