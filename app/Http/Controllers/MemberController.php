<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class MemberController extends Controller
{
    public function profile($id, $token){
        // mengembalikan dashboard bagian profile
        $leng = Str::length($token);
        // echo 'id = '.$id.'token = '.$token." pnjng=".$leng.'<br>';



        // filter tokens by user
        if($leng == 40){
            $user = User::findOrFail($id);

            return view("home", [
                'user' => $user,
                'auth' => $user->admined,
                'paginator' => 'profile',
                'token' => $token
            ]);
        }else{
            return redirect('/');
        }

    }
    public function penjualan($id, $token){
        // mengembalikan dashboard bagian profile
        $leng = Str::length($token);
        // echo 'id = '.$id.'token = '.$token." pnjng=".$leng.'<br>';

        // filter tokens by user
        if($leng == 40){
            $user = User::findOrFail($id);
            // echo " user = ".$user->name;
            // dd($user);

            return view("home", [
                'user' => $user,
                'auth' => $user->admined,
                'paginator' => 'penjualan',
                'token' => $token
            ]);
        }else{
            return redirect('/');
        }

    }
    public function pembelian($id, $token){
        // mengembalikan dashboard bagian profile
        $leng = Str::length($token);
        // echo 'id = '.$id.'token = '.$token." pnjng=".$leng.'<br>';

        // filter tokens by user
        if($leng == 40){
            $user = User::findOrFail($id);

            return view("home", [
                'user' => $user,
                'auth' => $user->admined,
                'paginator' => 'pembelian',
                'token' => $token
            ]);
        }else{
            return redirect('/');
        }

    }


}
