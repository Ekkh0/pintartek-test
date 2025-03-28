<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;
use App\Models\User;

class SessionController extends Controller
{
    public function index(){
        return view('login');
    }

    public function register(){
        return view('register');
    }

    function create(Request $request){
        #session flash digunakan sehingga user tidak perlu mengisi data kembali ketika gagal register
        Session::flash('email', $request->email);
        Session::flash('name', $request->name);
        Session::flash('dob', $request->dob);

        $request->validate([
            'name'=>'required',
            'gender'=>'required',
            'dob'=>'required',
            'email'=>'required|unique:users',
            'password'=>'required|same:confpassword',
            'confpassword'=>'same:password',
        ],[
            'name.required'=>'Username wajib diisi',
            'gender.required'=>'Jenis kelamin wajib diisi',
            'dob.required'=>'Tanggal lahir wajib diisi',
            'email.required'=>'Email wajib diisi',
            'email.unique'=>'Email sudah terdaftar',
            'password.required'=>'Password wajib diisi',
            'password.same'=>'Password yang diisi tidak sama',
            'confpassword.same'=>'Password yang diisi tidak sama',
        ]);

        $data = [
            'name' => $request->name,
            'gender' => $request->gender,
            'dob' => date('Y/m/d', strtotime($request->dob)),
            'email' => $request->email,
            'password' => \Hash::make($request->password)
        ];
        
        $user = User::create($data);

        if($user){
            return redirect('login')->with(['success'=> 'Berhasil Login']);
        }else{
            return redirect('register')->withErrors(['wronginfo'=>'Username dan password yang dimasukkan tidak valid']);
        }
    }

    public function login(Request $request){
        #session flash digunakan sehingga user tidak perlu mengisi email kembali ketika gagal login
        Session::flash('email', $request->email);
        $request->validate([
            'email'=>'required',
            'password'=>'required',
        ],[
            'email.required'=>'Email wajib diisi',
            'password.required'=>'Password wajib diisi',
        ]);

        $infologin = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if(Auth::attempt($infologin)){
            return redirect('/')->with(['success'=> 'Berhasil Login']);
        }else{
            return redirect('login')->withErrors(['wronginfo'=>'Username dan password yang dimasukkan tidak valid']);
        }
    }

    public function logout(){
        Auth::logout();
        return redirect('login')->with(['success'=> 'Berhasil Logout']);
    }
}
