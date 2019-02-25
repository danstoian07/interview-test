@extends('layouts.app')

@section('content')

    <header class="jumbotron my-4">
        <h1 class="display-4">Your uploaded pictures!</h1>
        <p class="lead">
            In this area you ca view your uploaded pictures. You can also access them to edit any details.
        </p>
        <a href="{{ route('dashboard.content.create') }}" class="btn btn-primary btn-lg">Upload pictures!</a>
    </header>

    @if(isset($content))
    <div class="row text-center">
        @foreach($content as $item)
        <div class="col-lg-4 col-md-6 mb-4">
            <div class="card h-100">
                <a href="{{ route('dashboard.content.edit', ['id' => $item->id]) }}" class="pencil-edit"><i class="fa fa-pencil"></i></a>
                <img class="card-img-top" src="/storage/images/{{ $item->image }}" alt="">
                <div class="card-body">
                    <p class="card-text">{{ $item->description }}</p>

                </div>
                <div class="card-footer">
                    @if($item->status == 'published')
                        <b class="text-success text-capitalize">{{ $item->status }}</b> at {{ $item->schedule_on }}
                    @elseif($item->status == 'draft')
                        <b class="text-info text-capitalize">{{ $item->status }}</b>  to be publised at {{ $item->schedule_on }}
                    @endif
                </div>
            </div>
        </div>
        @endforeach
    </div>
    @endif

@endsection