<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $alumniCount     = DB::table('users')->count();
        $lowonganCount   = DB::table('lowongans')->count();
        $informasiCount  = DB::table('informasis')->count();
        $testimoniCount  = DB::table('testimonis')->count();

        return view('/home', compact('alumniCount', 'lowonganCount', 'informasiCount', 'testimoniCount'));
    }

    // public function countHome()
    // {
    //     $pendaftarCount  = DB::table('pendaftars')->count();
    //     $lowonganCount   = DB::table('lowongans')->count();
    //     $informasiCount  = DB::table('informasis')->count();
    //     $testimonicount  = DB::table('testimonis')->count();

    //     return view('/home', compact('pendaftarCount', 'lowongancount', 'informasiCount', 'testimonicount'));
    // }
}
