@extends('layouts.app')

@section('content')

<div class="py-5">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            @if(session('message'))
                <div class="alert alert-success alert-dismissible fade show shadow" role="alert">
                    <strong>{{ session('message') }}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif 
            <div class="card mt-4 shadow-lg">
                <div class="card-header">
                    <h4 style="text-align: center">Login</h4>
                </div>
                <div class="card-body">
                    <form action="{{ url('login-user') }}" method="post">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="">Email</label>
                            <input type="email" name="email" value="" class="form-control">
                        </div>

                        <div class="form-group mb-3">
                            <label for="">Password</label>
                            <input type="password" name="password" value="" class="form-control">
                        </div>

                        <div class="form-group mb-3">
                            <button type="submit" class="btn btn-primary">Login</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection