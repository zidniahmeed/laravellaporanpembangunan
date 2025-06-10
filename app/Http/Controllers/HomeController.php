<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{

    public function index()
    {
        return view('home.index');
    }

    public function daftar()
    {
        return view('home.daftar');
    }

    public function dodaftar(Request $request)
    {
        // Validasi input
        $request->validate(
            [
                'nama' => 'required|string|max:255',
                'email' => 'required|email|unique:pengguna,email',
                'password' => 'required|confirmed',
                'telepon' => 'required|numeric',
                'alamat' => 'required|string',
            ],
            [
                'email.unique' => 'Email sudah terdaftar',
                'password.confirmed' => 'Konfirmasi password tidak sesuai',
                'password.required' => 'Password harus diisi',
                'email.required' => 'Email harus diisi',
                'nama.required' => 'Nama harus diisi',
                'telepon.required' => 'Telepon harus diisi',
                'alamat.required' => 'Alamat harus diisi',
                'telepon.numeric' => 'Telepon harus berupa angka',
            ]
        );

        // Ambil data input 
        $nama = $request->input('nama');
        $email = $request->input('email');
        $telepon = $request->input('telepon');
        $alamat = $request->input('alamat');
        $password = $request->input('password');

        // Simpan data ke tabel pengguna
        DB::table('pengguna')->insert([
            'nama' => $nama,
            'email' => $email,
            'password' => $password,
            'telepon' => $telepon,
            'alamat' => $alamat,
            'level' => 'User'
        ]);

        // Redirect dengan pesan sukses
        return redirect('home/login')->with('success', 'Pendaftaran Berhasil Silahkan Login');
    }


    public function login()
    {
        return view('home.login');
    }

    public function dologin(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');
        $akun = DB::table('pengguna')
            ->where('email', $email)
            ->where('password', $password)
            ->first();

        if ($akun) {
            if ($akun->level == "User") {
                session(['admin' => $akun]);
                return redirect('admin')->with('success', 'Anda sukses login');
            } elseif ($akun->level == "Admin") {
                session(['admin' => $akun]);
                return redirect('admin')->with('success', 'Anda sukses login');
            }
        } else {
            return redirect()->back()->with('error', 'Email atau Password anda salah');
        }
    }

    public function logout()
    {
        session()->flush();
        return redirect('/')->with('success', 'Anda Telah Logout');
    }
}
