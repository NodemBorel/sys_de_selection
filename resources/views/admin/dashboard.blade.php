@extends('layouts.app')

@section('content')

<h1>Welcome Here {{ $data->firstName }}</h1>
<a href="{{ url('/logout') }}">logout</a>

@endsection