<?php

namespace App\Http\Controllers;

use App\Models\Lowongan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;
use Cviebrock\EloquentSluggable\Services\SlugService;

class DashboardLowonganController extends Controller
{
    /**
     * Display a listing of the resource.
     * 
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.lowongan.lowongan_index',[
            'users' => Auth::user(),
            'lowongan' => Lowongan::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     * 
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.lowongan.lowongan_create', [
            'users' => Auth::user(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul'         => 'required',
            'perusahaan'    => 'required',
            'posisi'        => 'required',
            'batas_waktu'   => 'required',
            'persyaratan'   => 'required',
            'gambar'        => 'image|max:1024|mimes:jpeg,bmp,png,jpg',
        ]);

        $lowongan= New Lowongan();
        $lowongan->user_id=Auth::user()->id;
        $lowongan->judul=$request->get('judul');
        $lowongan->perusahaan=$request->get('perusahaan');
        $lowongan->posisi=$request->get('posisi');
        $lowongan->batas_waktu=$request->get('batas_waktu');
        $lowongan->persyaratan=$request->get('persyaratan');
        if($request->hasFile('gambar'))
        {
            $file = $request->file('gambar');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('gambarlowongan/', $filename);
            $lowongan->gambar = $filename;
        }
        $lowongan->save();

        return redirect()->route('lowongan.index')->with('success', 'Alhamdulillah Berhasil Dibuat');

    }

    public function show(Lowongan $lowongan)
    {
        return view('dashboard.lowongan.lowongan_show', [
            'users'     => Auth::user(),
            'lowongan'  => $lowongan
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     * @param  \App\Models\Lowongan  $lowongan
     * @return \Illuminate\Http\Response
     */
    public function edit(Lowongan $lowongan)
    {
        return view('dashboard.lowongan.lowongan_edit', [
            'users'     => Auth::user(),
            'lowongan'  => $lowongan
        ]);
    }

    /**
     * Update the specified resource in storage.
     * 
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Lowongan  $lowongan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lowongan $lowongan)
    {
        $request->validate([
            'judul'         => 'required',
            'perusahaan'    => 'required',
            'posisi'        => 'required',
            'batas_waktu'   => 'required',
            'persyaratan'   => 'required',
        ]);

        // $lowongan = Lowongan::findOrFail($lowongan);
        // $lowongan= New Lowongan();
        $lowongan->user_id=Auth::user()->id;
        $lowongan->judul=$request->get('judul');
        $lowongan->perusahaan=$request->get('perusahaan');
        $lowongan->posisi=$request->get('posisi');
        $lowongan->batas_waktu=$request->get('batas_waktu');
        $lowongan->persyaratan=$request->get('persyaratan');
        if($request->hasFile('gambar'))
        {
            $destination = 'gambarlowongan/'.$lowongan->gambar;
            if(File::exists($destination))
            {
                File::delete($destination);
            }
            $file = $request->file('gambar');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('gambarlowongan/', $filename);
            $lowongan->gambar = $filename;
            
        }
        $lowongan->update();
        
        return redirect()->route('lowongan.index')->with('success', 'Alhamdulillah Berhasil Diedit');
    }

    /**
     * Remove the specified resource from storage.
     * @param  \App\Models\Lowongan  $lowongan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lowongan $lowongan)
    {
        // $lowongan    = Lowongan::find($lowongan);
        $destination = 'gambarlowongan/'.$lowongan->gambar;
            if(File::exists($destination))
            {
                File::delete($destination);
            }
        $lowongan->delete();
        return redirect()->back()->with('success', 'Alhamdulillah Berhasil Dihapus');
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Lowongan::class, 'slug', $request->judul);
        return response()->json(['slug' => $slug]);
    }
}
