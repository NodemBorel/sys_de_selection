@extends('layouts.extends.new')

@section('content')
    @include('layouts.includes.navbar')

    <div class="py-5"></div>
    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <div class="progress mb-4">
                    <div class="progress-bar" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0"
                        aria-valuemax="100">
                        <div class="progress-text"></div>
                    </div>
                </div>

                @if (session('message'))
                    <div class="alert alert-success alert-dismissible fade show shadow" role="alert">
                        <strong>{{ session('message') }}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <div class="card">
                    <div class="card-header">
                        Niveau 1
                        <a href="{{ url('/course') }}" class="btn btn-danger float-end">Back</a>
                    </div>

                    <div class="card-body">

                        <form id="multi-step-form" method="post">
                            @csrf
                            @method('PUT')

                            <div class="step" id="step1">
                                <div class="form-group md-3 py-3">
                                    <label for="title">Title</label>
                                    <input type="text" name="title" id="title" class="form-control">
                                </div>
                                <button type="button" class="btn btn-primary next-step">Next</button>
                            </div>

                            <div class="step" id="step2" style="display: none;">
                                <div class="form-group md-3">
                                    <label for="description">Description</label>
                                    <textarea name="description" id="description" class="form-control" rows="3"></textarea>
                                </div>
                                <button type="button" class="btn btn-primary prev-step">Previous</button>
                                <button type="button" class="btn btn-primary next-step">Next</button>
                            </div>

                            <div class="step" id="step3" style="display: none;">
                                <div class="form-group md-3">
                                    <label for="status">Status</label>
                                    <input type="checkbox" name="status" id="status"> 0=show, 1=hide
                                </div>
                                <button type="button" class="btn btn-primary prev-step">Previous</button>
                                <button type="button" class="btn btn-primary next-step">Next</button>
                            </div>

                            <div class="step" id="step3" style="display: none;">
                                <div class="form-group md-3">
                                    <label for="status">Status</label>
                                    <input type="checkbox" name="status" id="status"> 0=show, 1=hide
                                </div>
                                <button type="button" class="btn btn-primary prev-step">Previous</button>
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>

    @include('layouts.includes.footer')

    <script src="{{ asset('styles/js/multi_step_form.js') }}"></script>
@endsection
