<?php

namespace App\Http\Controllers;

use App\Models\Informasi;
use App\Models\Lowongan;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {
        $informasi = Informasi::orderBy('id', 'DESC')->paginate(10);
        return view('welcome', [
            'newLowongan' => Lowongan::orderBy('id', 'desc')->take(3)->get(),
            'titleHero' => "Sistem informasi BKK",
            'informasis' => $informasi
        ]);
    }
}
