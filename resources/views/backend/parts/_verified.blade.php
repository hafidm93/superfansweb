<div class="row justify-content-center">
<div class="col-12">
    <h4 class="text-center">Selamat Datang {{ Auth::user()->name }}</h4>

</div>
    <div class="col-12">
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
         @endif
    </div>
</div>

<div class="row justify-content-center">
    <div class="col-md-4"></div>
    <div class="col-md-4">
        <p>Berikut adalah profile anda:</p>
        <ul class="list-group">
            <li class="list-group-item">
                <i class="fas fa-user"></i> {{Auth::user()->name}}
            </li>
            <li class="list-group-item">
                <i class="fas fa-phone"></i> {{Auth::user()->phone_number}} <i class="far fa-check-circle" style="color:blue" data-toggle="tooltip" data-placement="top" title="Terverifikasi"></i>
            </li>
            <li class="list-group-item">
                <i class="fas fa-envelope"></i> {{Auth::user()->email}} <i class="far fa-check-circle" style="color:blue"  data-toggle="tooltip" data-placement="top" title="Terverifikasi"></i> 
            </li>
            <li class="list-group-item">
                <i class="fas fa-envelope"></i> 
                @if (Auth::user()->isJOin == 1)
                {{Auth::user()->profile['game_id']}}
                @else 
                <em>belum bergabung</em>
                @endif
                <i class="far fa-check-circle" style="color:blue"  data-toggle="tooltip" data-placement="top" title="Terverifikasi"></i> 
            </li>
        </ul>
        @if (Auth::user()->isJOin == 1)
        <a href="#" class="my-3 text-center btn btn-primary btn-block justify-content-center disabled">Anda Sudah Bergabung</a>
        @else
        <a href="{{Route('fantasy.index')}}" class="my-3 text-center btn btn-primary btn-block justify-content-center">Gabung Liga Fantasy</a>
        @endif
    </div>
    <div class="col-md-4"></div>
</div>