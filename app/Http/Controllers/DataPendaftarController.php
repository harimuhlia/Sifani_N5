<?php

namespace App\Http\Controllers;

use App\Models\Lowongan;
use App\Models\Pendaftar;
use Barryvdh\DomPDF\PDF;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DataPendaftarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.pendaftar.pendaftar_index',[
            'users' => Auth::user(),
            'lowongan' => Lowongan::all()
        ]);
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function pendaftar(Lowongan $lowongan){
        return view('dashboard.pendaftar.pendaftar_list',[
            'users' => Auth::user(),
            'pendaftar' => $lowongan
        ]);
    }

    public function printPdf(Lowongan $lowongan)
    {
        $logoBKKPath    = storage_path('/app/public/logo/LogoBKK.jpeg');
        $logoBKK        = base64_encode(file_get_contents($logoBKKPath));

        $logoSekolahPath    = storage_path('/app/public/logo/LogoSekolah.jpeg');
        $logoSekolah        = base64_encode(file_get_contents($logoSekolahPath));

        $pdf = PDF::loadView('dashboard.pendaftar.print-pdf', [
            'users'         => Auth::user(),
            'lowongan'      => $lowongan,
            'logoBKK'       => $logoBKK,
            'logoSekolah'   => $logoSekolah,
        ]);

        return $pdf->stream('data-pendaftar.pdf');
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Pendaftar::class, 'slug', $request->nama);
        return response()->json(['slug' => $slug]);
    }
}
