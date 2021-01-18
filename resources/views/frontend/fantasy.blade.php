@extends('frontend.layouts.page')
@section('title', 'Laliga Fantasy Marca')
@section('content')
    <section id="fantasy" class="container full-height">
        <div class="row my-2">
            <div class="d-flex flex-row p-3">
                <h2>Fantasy League Marca</h2>
            </div>
            <div class="col-md-auto text-justify">
                <p>
                    Bergabung dalam game <strong>Fantasy League Marca</strong> dan dapatkan hadiah total <strong>Rp. 88 Juta</strong> dan hadiah mingguan dari Laligasuperfans.com. 
                    Cukup ikuti Rule dari kami berikut ini untuk bergabung dan bermain Fantasy League Marca berhadiah.
                </p>
                {{-- nav tabs --}}
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#rule" role="tab" aria-controls="home" aria-selected="true">Peraturan</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#gameplay" role="tab" aria-controls="profile" aria-selected="false">Cara Main</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="contact-tab" data-toggle="tab" href="#reward" role="tab" aria-controls="contact" aria-selected="false">Hadiah</a>
                    </li>
                </ul>
                    <div class="tab-content p-2" id="myTabContent">
                    <div class="tab-pane fade show active" id="rule" role="tabpanel" aria-labelledby="home-tab">
                        <p>
                            Dengan mengikuti program Fantasy League Marca berhadiah dari LaligaSuperfans.com, anda harus mengikuti semua peraturan yang tertulis di bawah ini :
                        </p>
                        <ul id="tab-content">
                            <li>
                                Pemain harus terdaftar sebagai user di LaligaSuperfans.com dan telah memverifikasi nomer handphone dan email yang terdaftar di user. Apabila dalam database kami peserta tidak terverifikasi, maka status pemenang yang nanti diterima akan dibatalkan.
                            </li>

                            <li>
                                Pemain mendaftarkan diri di aplikasi Laliga Fantasy Marca atau di web <a href="https://www.laligafantasymarca.com/" target="_blank" rel="noopener noreferrer">www.laligafantasymarca.com</a> dan sudah memiliki tim aktif.
                            </li>

                            <li>
                                Wajib mengikuti semua sosial media laligasuperfans.com seperti Facebook, Twitter, Instagram, TikTok dan YouTube.
                            </li>

                            <li>
                                Peserta wajib melakukan share <strong>Banner Promosi</strong> LaligaSuperfans.com di salah satu akun social media yang dimiliki dan <em>mention</em>  ke 3 teman sosial media anda. <br>
                                Banner dapat diunduh pada halaman link berikut: <br>
                                <a href="#">Unduh Banner</a> | <a href="#">Contoh caption</a>
                            </li>
                            
                            <li>
                                1 Nomer Handphone dan 1 Email Valid hanya bisa mendaftarkan 1 team Laliga Fantasy Marca.
                            </li>
                        </ul>
                    </div>
                    <div class="tab-pane fade" id="gameplay" role="tabpanel" aria-labelledby="profile-tab">
                        <p>
                        Berikut adalah cara main dan mendapatkan hadiah dari LaligaSuperFans.com :
                        </p>

                        <ul id="gamePlayRule">
                        <li>Daftar akun Laliga Fantasy Marca di <a href="http://www.laligafantasymarca.com" target="_blank" rel="noopener noreferrer">www.laligafantasymarca.com</a> atau via Aplikasi Android:  <a href="https://play.google.com/store/apps/details?id=com.lfp.laligafantasy&hl=en&gl=US" target="_blank" rel="noopener noreferrer"><strong>Laliga Fantasy Marca</strong></a></li>
                        <li>Buat sebuah tim Fantasy anda dan bentuk tim terbaik anda <strong>tiap minggunya</strong></li>
                        <li><strong>GABUNG</strong> dengan Liga Resmi Kami dengan kode, lihat kode dengan klik tombol <a href="#ctaLeague">di bawah</a></li>
                        <li>Jangan lupa untuk selalu Update tiap minggu tim terbaik anda untuk mendapatkan poin liga tiap minggunya.</li>
                        </ul>
                    </div>
                    <div class="tab-pane fade" id="reward" role="tabpanel" aria-labelledby="contact-tab">
                        <p>
                        Total hadiah utama untuk Fantasy League Marca season 2020/2021 adalah Rp. 88.000.000,-
                        </p>
                        <strong>Hadiah Utama</strong>
                        <ul id="rewardAll">
                        <li>Juara 1st 2020/21 Laliga Fantasy Marca : <strong>Rp. 58.000.000,-</strong></li>
                        <li>Juara 2nd 2020/21 Laliga Fantasy Marca : <strong>Rp. 20.000.000,-</strong></li>
                        <li>Juara 3rd 2020/21 Laliga Fantasy Marca : <strong>Rp. 10.000.000,-</strong></li>
                        </ul>

                        <strong>Hadiah Mingguan untuk Manager Terbaik</strong>
                        <ul id="weekly">
                        <li>Juara 1st : Rp. 580.000,-</li>
                        <li>Juara 2nd : Rp. 200.000,-</li>
                        <li>Juara 3rd : Rp. 100.000,-</li>
                        </ul>
                    </div>
                    </div>
            </div>
            <div class="col-md-auto text-center">
                <a id="ctaLeague" href="{{Route('register')}}" class="btn btn-primary">Gabung</a>
            </div>
        </div>
    </section>
@endsection
