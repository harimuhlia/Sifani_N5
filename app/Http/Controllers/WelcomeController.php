<?php

namespace App\Http\Controllers;

use App\Models\Lowongan;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {
        return view('welcome', [
            'newLowongan' => Lowongan::orderBy('id', 'desc')->take(3)->get(),
            'titleHero' => "Sistem informasi BKK"
        ]);
    }
}
