@extends('layouts.app')

@section('content')

    <header class="jumbotron my-4">
        <h1 class="display-4">Time your posts!</h1>
        <p class="lead">
            You can upload your pictures and set a time to publish them.
        </p>
        @guest
            <a href="{{ route('register') }}" class="btn btn-primary btn-lg">Register for an account!</a>
        @endguest
    </header>

    @if(isset($content))
        <div class="row text-center">
            <div class="col-lg-12 mb-4">
                <div class="card h-100">
                    <img class="card-img-top" src="/storage/images/{{ $content->image }}" alt="">
                    <div class="card-body">
                        <p class="card-text">{{ $content->description }}</p>
                    </div>
                    <div class="card-footer">
                        <b class="text-capitalize">{{ $content->status }}</b> by {{ $content->user->name }}
                    </div>
                </div>
            </div>
            <div class="col-lg-12 mb-4">
                <a href="/">BACK</a>
            </div>
        </div>
    @endif

@endsection