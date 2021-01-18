@extends('backend.layouts.app')
@section('title', 'Post Terhapus')
@section('content')

<div class="row mb-2">
    <div class="col-md-12">
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
        <table class="table table-fit">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th>Title</th>
                    <th>thumbnail</th>
                    <th>Category</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($videos as $video => $item)
                <tr>
                    <th scope="row">{{$video + $videos->firstitem()}}</th>
                    <td>{{$item->title}}</td>
                    <td class="w-25"><img class="w-25" src="{{asset($item->cover)}}" alt=""></td>
                    <td>
                        @foreach ($item->category as $cat)
                        <span class="badge badge-primary list-badge-category">
                            {{$cat->name}}
                        </span>
                        @endforeach
                    </td>
                    <td>
                        <form method="POST" action="{{route('mvideo.kill', $item->id)}}">
                            @csrf
                            @method('delete')
                            <a href="{{route('mvideo.restore', $item->id)}}" class="btn btn-info" onclick="return confirm('Kembalikan post?')">Restore</a>
                            <button type="submit"
                                onclick="return confirm('Yakin ingin delete PERMANENT?')"
                                class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $videos->links() }}
    </div>
</div>

@endsection