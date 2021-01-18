@extends('backend.layouts.app')
@section('title', 'Edit Category')
@section('content')
<div class="row">
    <div class="col-md-4">
        <p>Edit exist Category, please fill the description for SEO needed</p>
    </div>
    <div class="col-md-6">
        <form method="POST" action="{{route('category.update', $category->id)}}">
            @csrf
            @method('patch')
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                    value="{{ $category->name}}">
                @error('name')
                <div id="name" class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" class="form-control" id="description"
                    rows="3">{{ $category->description}}</textarea>
            </div>
            <button type="submit" class="btn btn-info">Edit</button>
        </form>
    </div>
</div>
@endsection