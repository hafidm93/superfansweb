@extends('backend.layouts.app')
@section('title', 'Users List')
@section('content')
<!-- Begin Page Content -->
   
        @if (Auth::user()->isVerified == 0)
        <div class="row justify-content-md-center">
        <script>window.location = "/verifyotp";</script>
        </div>
        @else
        <div class="row">
            <div class="col">
                <table class="table table-responsive" style="font-size: 0.9em;">
                    <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Game ID</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody id="postIndex">
                        @foreach ($users as $item =>$user)
                        <tr>
                            <th scope="row">
                                {{$item +1}}
                            </th>
                            <td class="titleIndex">{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->phone_number}}</td>
                            <td>
                                @if (isset($user->profile->game_id))
                                {{$user->profile->game_id}}
                                @else
                                    -
                                @endif
                            </td>
                            <td id="categoryList">
                                @if ($user->isVerified == true)
                                    <span class="badge badge-success">Verified</span>
                                @else
                                <span class="badge badge-warning">Not Verified</span>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                {{-- {{$users->links()}} --}}
            </div>
        </div>
        @endif

<!-- /.container-fluid -->
@endsection