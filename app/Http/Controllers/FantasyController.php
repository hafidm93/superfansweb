<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Twilio\Rest\Client;
use App\User;
use App\Otp;
use App\Profile;

class FantasyController extends Controller
{
    public function index () {
        $user_verified = Auth::user()->isVerified;
        $user_join = Auth::user()->isJOin;
        if ( $user_verified == 0) {
            return redirect('/verifyotp')->with('status', 'Silahkan lakukan verifikasi No HP terlebih dahulu');
        }
        else {
            return view ('backend.fantasy.index');
        }
        
    }

    public function league_code () {
        $user_verified = Auth::user()->isVerified;
        $user_join = Auth::user()->isJOin;
        if ( $user_verified == 0) {
            return redirect('/verifyotp')->with('status', 'Silahkan lakukan verifikasi No HP terlebih dahulu');
        } elseif ($user_join == 1) {
            return redirect ('/home')->with('status', 'Anda sudah bergabung di Fantasy League');
        }
        else {
            return view ('backend.fantasy.code');
        }
    }
     /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $user_id = $request->user_id;
        $game_id = $request->game_id;

        // validation
        $rules = [
            'game_id' => 'required',
        ];
        $customMessages = [
            'required' => 'Kolom :attribute wajib diisi!',
        ];
        $this->validate($request, $rules, $customMessages);

        $user = Auth::user();
        $POST = Profile::create([
            'game_id' => $game_id,
            'isJoin' => $request->isJoin,
            'user_id' => $user_id,
        ]);

        if($POST) {
            $user_update = [
                'isJOin' => TRUE,
            ];

            User::where('id', Auth::user()->id)->update($user_update);
        }

        return redirect('/home')->with('status', 'Selamat! Anda menyatakan sudah bergabung, selamat bermain.');
    
    }
}
