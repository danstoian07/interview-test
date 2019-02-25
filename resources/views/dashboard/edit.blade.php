@extends('layouts.app')

@section('content')

    <!-- Jumbotron Header -->
    <header class="jumbotron my-4">
        <h1 class="display-4">Edit Form</h1>
        <p class="lead">
            Use the form below to edit the information or delete the image.
        </p>
    </header>

    <!-- Page Features -->
    <div class="form-style mb-4">

        <div class="col-lg-12">
            <form action="{{ route('dashboard.content.update', ['content' => $content->id]) }}" method="POST" enctype="multipart/form-data">
                @method('PATCH')
                @csrf
                <div class="form-group">
                    <label for="example-text-input">Publish On</label>
                    <date-time schedule_on="{{ $content->schedule_on }}"></date-time>
                </div>

                <div class="form-group">
                    <img src="/storage/images/{{ $content->image }}" class="img-fluid">
                </div>

                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea class="form-control" name="description" id="description" rows="3">{{ $content->description }}</textarea>
                </div>


                <div class="form-group ">
                    <button type="submit" class="btn btn-primary">Save</button>
                    <button type="button" class="btn btn-danger pull-right" id="deleteButton" data-toggle="modal" data-target="#deleteModal">Delete</button>
                </div>

            </form>

        </div>


    </div>


    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete Content</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete the image?
                </div>
                <div class="modal-footer">
                    <form action="{{ route('dashboard.content.destroy', ['content' => $content->id]) }}" method="POST">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-primary">Yes</button>
                    </form>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                </div>
            </div>
        </div>
    </div>

@endsection