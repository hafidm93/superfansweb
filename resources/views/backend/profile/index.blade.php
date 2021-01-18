@extends('backend.layouts.app')
@section('title', 'Edit Profile')
@section('content')
<!-- Begin Page Content -->
        <div class="row">
            <div class="d-block d-flex flex-column mx-auto justify-content-center text-center">
                <div class="card" style="max-width: 18rem; width:100%">
                    <img class="card-img-top" src="" alt="">
                    <div class="card-body">
                        <h5 class="card-title">{{Auth::user()->name}}</h5>
                        <p>{{Auth::user()->phone_number}} </p>
                        <p class="card-text">Content</p>
                    </div>
                </div>
            </div>
        </div>
<!-- /.container-fluid -->
@endsection