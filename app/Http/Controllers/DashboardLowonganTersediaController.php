<?php

namespace App\Http\Controllers;

use App\Models\Lowongan;
use Illuminate\Http\Request;
use App\Models\Pendaftar;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class DashboardLowonganTersediaController extends Controller
{
    // Mengarahkan ke halaman lowongan tersedia
    public function index()
    {
        return view('dashboard.lowongan_tersedia.index', [
            'users' => Auth::user(),
            'lowongans' => Lowongan::all()
        ]);
    }

    // Mengarahkan ke formulir untuk mendaftar
    public function daftar(Lowongan $lowongan)
    {
            return view('dashboard.lowongan_tersedia.daftar', [
                'users' => Auth::user(),
                'lowongan' => $lowongan
            ]);
        
    }

    // Proses create atau tambah pendaftaran
    public function store(Request $request)
    {   
        $validated = $request->validate([
            'no_ak1'         => 'required',
            'nama'           => 'required',
            'jurusan'        => 'required',
            'asal_sekolah'   => 'required',
            'jenis_kelamin'  => 'required',
            'lowongan_id'    => 'required'
        ]);

        $validated['user_id'] = auth()->user()->id;

        $kodePendaftaran = strtoupper(substr(str_shuffle('0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ'), 0, 5));
        $validated['kode_pendaftaran'] = $kodePendaftaran;

        Pendaftar::create($validated);
        Alert::success('Berhasil', 'Berhasil Mendaftar');
        return redirect('/dashboard/lowongan-tersedia/');
    }
}
