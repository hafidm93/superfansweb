@extends('frontend.layouts.app')

@section('content')
    <main>
        @include('frontend.home._main')
    </main>    
    {{-- include modal --}}
    @include('frontend.parts._modal')
@endsection