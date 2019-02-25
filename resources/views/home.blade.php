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
            @foreach($content as $item)
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card h-100">
                        <img class="card-img-top" src="/storage/images/{{ $item->image }}" alt="">
                        <div class="card-body">
                            <p class="card-text">{{ $item->description }}</p>
                            <a class="pencil-edit" href="{{ route('show.image', ['id' => $item->id]) }}">
                                <i class="fa fa-eye"></i>
                            </a>
                        </div>
                        <div class="card-footer">
                            <b class="text-capitalize">{{ $item->status }}</b> by {{ $item->user->name }}

                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif

@endsection