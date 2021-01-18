@extends('backend.layouts.app')
@section('title', 'Fantasy League Marca')
@section('content')
<!-- Begin Page Content -->
<div class="row">
    <div class="col">
        <p class="text-center">
            Berikut ini adalah <strong>kode liga Laligasuperfans.com</strong>, silahkan masukan kode liga di bawah ini 
        </p>
    </div>
</div>
        <div class="row my-5">
            
            <div class="col"></div>
            <div class="col-md-4 col-sm-12 text-center">
                <div class="card bg-primary text-white">
                    <div class="card-body">
                        <h5 class="card-title"><strong>iqrzy131</strong></h5>
                    </div>
                </div>
            </div>
            <div class="col">

            </div>
        </div>

        <div class="row text-center">
            <div class="col">
                
            </div>
            <div class="col-sm-4">
                <p>Apakah anda sudah bergabung? Klik Tombol di bawah ini</p>
                <form action="{{route('fantasy.store')}}" method="POST">
                    @csrf
                    <input id="my-input" class="form-control" type="hidden" name="isJoin" value="1">
                    <input id="my-input" class="form-control" type="hidden" name="user_id" value="{{Auth::user()->id}}">
                    
                    <div class="form-group">
                        <label for="my-input">Username</label>
                        <input id="game_id" class="form-control" type="text" name="game_id" placeholder="Username Laliga Fantasy Marca">
                        @error('game_id')
                        <div id="game_id" class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-warning">Saya Sudah Bergabung</button>
                </form>
            </div>
            <div class="col">
                
            </div>
        </div>
<!-- /.container-fluid -->
@endsection