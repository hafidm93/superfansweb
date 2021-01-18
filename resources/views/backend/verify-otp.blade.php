@extends('backend.layouts.app')
@section('title', 'Verify')
@section('content')
<!-- Begin Page Content -->
<div class="my-5">
    <div class="row justify-content-md-center">
        
        @if (Auth::user()->isVerified == 1)
        <script>window.location = "/home";</script>
        @else
            <div class="col-sm-12 text-center">
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
            <p>Silahkan masukan OTP untuk bisa bergabung dengan game berhadiah dari LaligaSuperfans.com: {{ Auth::user()->phone_number }}</p>
        </div>
        <div class="col-md-auto text-center">
            <form action="{{route('verifyOtp')}}" method="post">
                @csrf
                <div class="form-group row">
                    <label for="verification_code"
                        class="col-md-4 col-form-label text-md-right">{{ __('OTP') }}</label>
                    <div class="col-md-6">
                        <input type="hidden" name="phone_number" value="{{ Auth::user()->phone_number }}">
                        <input id="verification_code" type="tel"
                            class="form-control @error('verification_code') is-invalid @enderror"
                            name="verification_code" value="{{ old('verification_code') }}" required>
                        @error('verification_code')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Verify Phone Number') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
        @endif
        
    </div>
</div>
    
<!-- /.container-fluid -->
@endsection