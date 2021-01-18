@extends('backend.layouts.app')
@section('title', 'MVideo')
@section('content')
<!-- Begin Page Content -->
   
        @if (Auth::user()->isVerified == 0)
        <div class="row justify-content-md-center">
        <script>window.location = "/verifyotp";</script>
        </div>
        @else
        <div class="row my-3">
            <div class="col-md-6">
                <a href="{{route('mvideo.create')}}" class="btn btn-primary">Tambah Post</a>
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
        <div class="row my-3">
            <div class="col">
                <table class="table table-responsive" style="font-size: 0.9em;">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th>Title</th>
                            <th>Created</th>
                            <th>Category</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody id="postIndex">
                        @foreach ($videos as $video => $item)
                        <tr>
                            <th scope="row">{{$video + $videos->firstitem()}}</th>
                            <td class="titleIndex">{{$item->title}}</td>
                            <td>{{date('d M Y H:i T', strtotime($item->created_at))}}</td>
                            <td id="categoryList">
        
                                @foreach ($item->category as $cat)
                                <span class="badge badge-primary list-badge-category">
                                    {{$cat->name}}
                                </span>
                                @endforeach
        
                            </td>
                            <td>
        
                                @if ($item->isPublished == false)
                                <span class="badge badge-warning">Draft</span>
                                @elseif ($item->published_at >= date('Y-m-d H:i:s')) <span class="badge badge-secondary"
                                    data-toggle="tooltip" data-placement="top"
                                    title="Scheduled at {{date('d M Y H:i T', strtotime($item->published_at))}}">
                                    Schedule</span>
                                @else
                                <span class="badge badge-success">Published</span>
                                @endif
        
                                @if ($item->isPublished == false)
                                <form action="{{route('update_published', $item->id)}}" method="POST">
                                    @csrf
                                    @method("PATCH")
                                    <input type="hidden" value="1" name="isPublished">
                                    <button onclick="return confirm('Are you sure?')" type="submit"
                                        class="btn badge btn-primary">
                                        Publish Now</button>
                                </form>
                                @endif
                                {{-- @if ($item->published_at >= date("Y-m-d H:i:s") ) <span class="badge badge-dager">
                                    Schedule</span>
                                @else
                                Null
                                @endif --}}
        
                            </td>
                            <td>
                                <a href="{{Route('mvideo.edit', $item->id)}}" class="btn btn-primary">Edit</a>
                                <form method="POST" action="{{route('mvideo.destroy', $item->id)}}">
                                    @csrf
                                    @method('delete')
                                    <button onclick="return confirm('Are you sure?')" type="submit"
                                        class="btn btn-danger">Delete</button>
                                </form>
                                <a href="{{route('show_video', $item->slug)}}" target="_blank" class="btn btn-success">View</a>
                                {{-- @php
                                $date = date("Y-m-d H:i:s");
                                echo $date;
                                @endphp --}}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <script>
                    $(document).ready(function(){
                      $("#myInput").on("keyup", function() {
                        var value = $(this).val().toLowerCase();
                        $("#postIndex tr").filter(function() {
                          $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                        });
                      });
                    });
                </script>
                {{$videos->links()}}
            </div>
        </div>

        @endif
    
<!-- /.container-fluid -->
@endsection