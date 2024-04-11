@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Book Create</div>

                <div class="card-body">
                    <form action="{{ route('books.store') }}" enctype="multipart/form-data" method="POST">
                        @csrf
                        <div class="form-group row">
                            <label for="name" class="col-lg-3">Name</label>
                            <div class="col-lg-9">
                                <input type="text" class="form-control" id="name" name="name">
                                <div class="text-error">
                                    @if($errors->has('name'))
                                        <span class="text-danger" role="alert">
                                            <small><b>{{ $errors->first('name') }}</b></small>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group row mt-3">
                            <label for="unique_id" class="col-lg-3">Book ID</label>
                            <div class="col-lg-9">
                                <input type="text" class="form-control" id="unique_id" name="unique_id" value="{{ $bookUniqueId }}" readonly>
                                <div class="text-error">
                                    @if($errors->has('unique_id'))
                                        <span class="text-danger" role="alert">
                                            <small><b>{{ $errors->first('unique_id') }}</b></small>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group row mt-3">
                            <label for="content_owner_id" class="col-lg-3">Content Owner</label>
                            <div class="col-lg-9">
                                <select class="form-control select2" name="content_owner_id" id="content_owner_id">
                                    <option value="">Select Content Owner</option>
                                    @foreach($contentOwners as $contentOwner)
                                        <option value="{{ $contentOwner->id }}">{{ $contentOwner->name }}</option>
                                    @endforeach
                                </select>
                                <div class="text-error">
                                    @if($errors->has('content_owner_id'))
                                        <span class="text-danger" role="alert">
                                            <small><b>{{ $errors->first('content_owner_id') }}</b></small>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group row mt-3">
                            <label for="publisher_id" class="col-lg-3">Publisher</label>
                            <div class="col-lg-9">
                                <select class="form-control select2" name="publisher_id" id="publisher_id">
                                    <option value="">Select Publisher</option>
                                    @foreach($publishers as $publisher)
                                        <option value="{{ $publisher->id }}">{{ $publisher->name }}</option>
                                    @endforeach
                                </select>
                                <div class="text-error">
                                    @if($errors->has('publisher_id'))
                                        <span class="text-danger" role="alert">
                                            <small><b>{{ $errors->first('publisher_id') }}</b></small>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group row mt-3">
                            <label for="cover_photo" class="col-lg-3">Cover Photo</label>
                            <div class="col-lg-9">
                                <input type="file" class="form-control" id="cover_photo" name="cover_photo">
                                <div class="text-error">
                                    @if($errors->has('cover_photo'))
                                        <span class="text-danger" role="alert">
                                            <small><b>{{ $errors->first('cover_photo') }}</b></small>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="mt-3">
                            <button type="submit" class="btn btn-primary">Create</button>
                            <a href="{{ route('books.index') }}" class="btn btn-danger">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
