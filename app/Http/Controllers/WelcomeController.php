<?php

namespace App\Http\Controllers;

use App\Models\Informasi;
use App\Models\Lowongan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WelcomeController extends Controller
{
    public function index()
    {
        $pendaftarCount  = DB::table('pendaftars')->count();
        $lowonganCount   = DB::table('lowongans')->count();
        $informasiCount  = DB::table('informasis')->count();
        $alumniCount     = DB::table('users')->count();
        $informasi = Informasi::orderBy('id', 'DESC')->paginate(6);
        $newLowongan = Lowongan::orderBy('id', 'DESC')->paginate(6);
        return view('welcome', [
            // 'newLowongan' => Lowongan::orderBy('id', 'desc')->take(3)->get(),
            'titleHero' => "Sistem informasi BKK",
            'newLowongan' => $newLowongan,
            'informasis' => $informasi,
            'pendaftarCount' => $pendaftarCount,
            'lowonganCount' => $lowonganCount,
            'informasiCount' => $informasiCount,
            'alumniCount' => $alumniCount,
        ]);
    }

}
