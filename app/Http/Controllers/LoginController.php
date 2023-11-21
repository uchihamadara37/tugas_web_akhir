<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Transaction;

class LoginController extends Controller
{
    public function index(){

        $users = User::all();
        return view('login', [
            'data' => $users
        ]);
    }
    public function register(){

        $users = User::all();
        return view('register');
    }

    public function loginStart(Request $request){
        // dd($request->_token);
        $users = User::all();
        $user;
        $ketemu = false;
        // dd($users);
        // echo "email = ".$request->email." pw = ".$request->password."<br>";

        foreach ($users as $key => $value) {
            // echo "Nama ". $value->name." email = ".$value->email." ".$value->password."<br>";
            if ($request->email == $value->email){
                if ($request->password == $value->password){
                    $ketemu = true;
                    $user = $value;
                    break;
                }
            }
        }

        if ($ketemu){
            
            $transaksis = Transaction::where('seller_id', $user->id)->get();
            // var_dump($transaksis);

            // foreach ($transaksis as $key => $value) {
            //     echo 'value : '.$value->seller_id.'<br>';
            //     echo '<img src="data:image/png;base64,' . base64_encode($value->img) .'" alt="..."><br>';
            // }

            // dd($transaksis);
            return view("dashboard", [
                'user' => $user,
                'auth' => $user->admined,
                'paginator' => 'profile',
                'token' => $request->_token,
                'transaksis' => $transaksis
            ]);
        }else{
            return view('login', [
                'pesan' => "Maaf email atau password anda keliru!"
            ]);
        }
    }

    public function registration(Request $request){
        // dd($request->all());

        if ($request->password == $request->confirm_password){

            $user = new User;
            $user->name = $request->name;
            $user->email = $request->email;
            $user->nowa = $request->nowa;
            $user->nik = $request->nik;
            $user->password = $request->password;
            $user->admined = 0;
            $user->save();
            return view('login' );

        }else{
            // dd("pw = ".$request->password." psw=" .$request->confirm_password);
            return view('register', [
                'data' => $request,
                'pesan' => "Password anda belum cocok"
            ]);
        }


    }
}
