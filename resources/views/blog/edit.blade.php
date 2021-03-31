@extends('layouts.app')

@section('title')
    Edit Artikel 
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                @if ($message = Session::get('success'))
                    <div class="alert alert-success alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>{{ $message }}</strong>
                    </div>
                @endif
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('update', $blog->id) }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Title Artikel</label>
                                <input type="text" class="form-control" name="title" id="exampleFormControlInput1"
                                    placeholder="Ex : Tuturial Membuat Blog" value="{{ $blog->title }}">
                                @error('title')
                                    <small class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Example textarea</label>
                                <textarea class="form-control" name="body" id="exampleFormControlTextarea1"
                                    rows="3">{{ $blog->body }}</textarea>
                                @error('body')
                                    <small class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </small>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
