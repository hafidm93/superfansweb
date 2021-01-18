<!-- ==========MODAL============== -->

    <!-- Login -->
    
    <!-- Login END -->

    <!-- Register -->
    <div class="modal fade" id="registerModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" id="registerContainer">
            <img class="img-fluid" src="upload/register.png" alt="">
            <div class="modal-content">
                <div class="row">
                    <div class="col text-center">
                        <p>Sudah punya akun?</p>
                        <a href="{{Route('login')}}" class="btn btn-primary btn-sm">Login di sini</a>
                    </div>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="text-center mb-3"><img class="w-50" src="upload/logo/superfans-dark.png" alt="">
                        </div>
                        <label for="name" class="sr-only">Nama Lengkap</label>
                        <input id="name" type="text" class="mb-1 form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="Nama Lengkap" required autocomplete="name" autofocus>
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                        <label for="gender" class="sr-only">Jenis Kelamin</label>

                        <select class="mb-1 form-control @error('gender') is-invalid @enderror" name="gender" id="gender">
                            <option disabled selected>Jenis Kelamin</option>
                            <option value="1">Laki - Laki</option>
                            <option value="0">Perempuan</option>
                        </select>
                          @error('gender')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <label for="email" class="sr-only">Email Valid</label>
                        <input id="emailReg" type="email" class="mb-1 form-control @error('email') is-invalid @enderror" name="email" placeholder="Email Valid" value="{{ old('email') }}" required autocomplete="email">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                        <label for="name" class="sr-only">No. Handphone</label>
                        <input id="phone_number" type="tel" class="form-control @error('phone_number') is-invalid @enderror" name="phone_number" value="{{ old('phone_number') }}" placeholder="No Handphone" required autocomplete="phone_number">                      
                        <small class="mb-1">No HP harus dimulai dengan +62, ex: +6287888777</small>

                        @error('phone_number')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                        <label for="name" class="sr-only">Password</label>
                        <input id="passwordReg" type="password" class="mb-1 form-control @error('password') is-invalid @enderror" name="password" placeholder="Password" required autocomplete="new-password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <input id="password-confirm" type="password" class="mb-1 form-control" placeholder="Konfirmasi Password" name="password_confirmation" required autocomplete="new-password">

                        <div class="form-check">
                            <input type="checkbox" name="isAggree" value="1" class="mb-1 form-check-input @error('isAggree') is-invalid @enderror" id="isAggree">
                            <label class="form-check-label @error('isAggree') is-invalid @enderror" for="isAggree">Dengan mendaftar sebagai pengguna, saya setuju dengan Syarat & Kebijakan Pengguna</label>
                            @error('isAggree')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                          </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Register END -->

    <!-- Modal -->
    <div class="modal fade" id="m3modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">        
            <div class="modal-body">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>        
            <!-- 16:9 aspect ratio -->
                <div class="embed-responsive embed-responsive-16by9">
                    <iframe class="embed-responsive-item" src="" id="m3video"  allowscriptaccess="always" allow="autoplay" ></iframe>
                </div>
            </div>
    
        </div>
        </div>
    </div> 