@extends('backend.layouts.app')
@section('title', 'Category list')
@section('content')

<div class="row mb-2">
    <div class="col-md-6">
        <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseCat"
            aria-expanded="false" aria-controls="collapseExample">
            Tambah Kategori
        </button>
        <div class="collapse" id="collapseCat">
            <div class="row my-4">
                <div class="col-sm-4">
                    <p>Tambah Kategori, isi deskripsi untuk keperluan SEO</p>
                </div>
                <div class="col-sm-8">
                    <form method="POST" action="{{route('category.store')}}">
                        @csrf
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                                name="name" value="{{ old('name') }}">
                            @error('name')
                            <div id="name" class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="description">Deskripsi</label>
                            <textarea name="description" class="form-control" id="description"
                                rows="3">{{ old('description') }}</textarea>
                        </div>
                        <button type="submit" class="btn btn-info">Simpan</button>
                    </form>
                </div>
            </div>
        </div>

    </div>
    <div class="col-md-6">
        @if (Session::has('status'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ Session('status')}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif
    </div>
</div>
<div class="row">
    <div class="col">
        <table class="table table-striped ">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Kategori</th>
                    <th scope="col">Deskripsi</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($category as $cat => $item)
                <tr>
                    <th scope="row">{{$cat + $category->firstitem()}}</th>
                    <td>{{$item->name}}</td>
                    <td>{{$item->description}}</td>
                    <td>
                        <a href="{{Route('category.edit', $item->id)}}" class="btn btn-primary">Edit</a>
                        <form method="POST" action="{{route('category.destroy', $item->id)}}">
                            @csrf
                            @method('delete')
                            <button type="submit" onclick="return confirm('Are you sure?')"
                                class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $category->links() }}
    </div>
</div>

@endsection