@extends('backend.layouts.app')
@section('title', 'Dashboard')
@section('content')
<!-- Begin Page Content -->
   
        @if (Auth::user()->isVerified == 0)
        <div class="row justify-content-md-center">
        <script>window.location = "/verifyotp";</script>
        </div>
        @else
            @include('backend.parts._verified')
        @endif
    
<!-- /.container-fluid -->
@endsection