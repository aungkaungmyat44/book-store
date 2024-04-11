@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Book Detail</div>

                <div class="card-body">
                    <div class="form-group row">
                        <strong for="name" class="col-lg-3 font-weight-bold">Name</strong>
                        <div class="col-lg-9">
                            <p>{{ $book->name }}</p>
                        </div>
                    </div>
                    <div class="form-group row">
                        <strong for="name" class="col-lg-3 font-weight-bold">Book Unique ID</strong>
                        <div class="col-lg-9">
                            <p>{{ $book->book_uniq_id }}</p>
                        </div>
                    </div>
                    <div class="form-group row">
                        <strong for="name" class="col-lg-3 font-weight-bold">Content Owner</strong>
                        <div class="col-lg-9">
                            <p>{{ $book->contentOwner->name }}</p>
                        </div>
                    </div>
                    <div class="form-group row">
                        <strong for="name" class="col-lg-3 font-weight-bold">Publisher</strong>
                        <div class="col-lg-9">
                            <p>{{ $book->publisher->name }}</p>
                        </div>
                    </div>
                    <div class="form-group row">
                        <strong for="name" class="col-lg-3 font-weight-bold">Cover Photo</strong>
                        <div class="col-lg-9">
                            <img src="{{ asset("images/books/$book->cover_photo") }}" class="img-thumbnail" alt="" width="300px" height="300px">
                        </div>
                    </div>
                    <div class="mt-3">
                        <a href="{{ route('books.index') }}" class="btn btn-primary">Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
