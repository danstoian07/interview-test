@extends('layouts.app')

@section('content')

    <!-- Jumbotron Header -->
    <header class="jumbotron my-4">
        <h1 class="display-4">Upload Area!</h1>
        <p class="lead">
            Use the form below to upload new pictures.
        </p>
    </header>

    <!-- Page Features -->
    <div class="form-style">

        <div class="col-lg-12">
            <form action="{{ route('dashboard.content.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label for="example-text-input">Publish On</label>
                    <date-time></date-time>
                </div>

                <div class="form-group">
                    <label for="image">Choose the file (JPG/JPEG/PNG)</label>
                    <input type="file" class="form-control-file" id="image" name="image" required>
                </div>

                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea class="form-control" name="description" id="description" rows="3"></textarea>
                </div>


                <div class="form-group ">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>

            </form>
        </div>


    </div>
    <!-- /.row -->

@endsection