<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mvideo;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('backend.index');
    }

    public function index_site(Mvideo $Mvideo)
    {
        $videos = $Mvideo->where('published_at', '<=', Carbon::now())->where('isPublished', true)->orderBy('published_at', 'desc')->limit(6)->get();
        return view('frontend.index', compact('videos'));
    }

    public function show_video($slug) 
    {
        $videos = Mvideo::where('slug', $slug)->get();

        return view ('frontend.video', compact('videos'));
    }
}
