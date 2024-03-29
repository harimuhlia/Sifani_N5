<?php

namespace App\Http\Controllers;

use App\Models\Inbox;
use App\Models\Informasi;
use App\Models\Lowongan;
use App\Models\Testimoni;
use App\Models\User;
use App\Models\Visidanmisi;
use App\Models\Visimisi;
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
        $visimisi = Visidanmisi::all();
        $kotakmasuk = Inbox::all();
        $users = User::all();
        $testipage = Testimoni::orderBy('id', 'DESC')->paginate(10);
        $informasi = Informasi::orderBy('id', 'DESC')->paginate(6);
        $newLowongan = Lowongan::orderBy('id', 'DESC')->paginate(6);
        return view('welcome', [
            'titleHero' => "Sistem informasi BKK",
            'visimisi' => $visimisi,
            'kotakmasuk' => $kotakmasuk,
            'newLowongan' => $newLowongan,
            'users' => $users,
            'testipage' => $testipage,
            'informasis' => $informasi,
            'pendaftarCount' => $pendaftarCount,
            'lowonganCount' => $lowonganCount,
            'informasiCount' => $informasiCount,
            'alumniCount' => $alumniCount,
        ]);
    }

}
