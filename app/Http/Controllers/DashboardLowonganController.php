<?php

namespace App\Http\Controllers;

use App\Models\Lowongan;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Facades\Storage;

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
        $validated = $request->validate([
            'judul'         => 'required',
            'perusahaan'    => 'required',
            'posisi'        => 'required',
            'batas_waktu'   => 'required',
            'persyaratan'   => 'required',
            'gambar'        => 'image|file'
        ]);
        
        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $fileName = $file->getClientOriginalName();
            Storage::disk('public')->put('gambarlowongan/'.$fileName, file_get_contents($file));
            $validated['gambar'] = 'gambarlowongan/'.$fileName;
        }
        
        $validated['user_id'] = auth()->user()->id;
        Lowongan::create($validated);

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
        $rules = [
            'judul'         => 'required',
            'perusahaan'    => 'required',
            'posisi'        => 'required',
            'batas_waktu'   => 'required',
            'persyaratan'   => 'required',
            'gambar'        => 'image|file'
        ];

        $validated = $request->validate($rules);

        if($request->hasFile('gambar')){
            if($lowongan->gambar){
                Storage::delete('public/'.$lowongan->gambar);
            }
            $file = $request->file('gambar');
            $fileName = $file->getClientOriginalName();
            Storage::disk('public')->put('gambarlowongan/'.$fileName, file_get_contents($file));
            $validated['gambar'] = 'gambarlowongan/'.$fileName;
        }

        $validated['user_id'] = auth()->user()->id;

        Lowongan::where('id', $lowongan->id)
            ->update($validated);

        return redirect()->route('lowongan.index')->with('success', 'Alhamdulillah Berhasil Diedit');  
    }

    /**
     * Remove the specified resource from storage.
     * @param  \App\Models\Lowongan  $lowongan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lowongan $lowongan)
    {
        if ($lowongan->gambar) {
            Storage::delete('public/'.$lowongan->gambar);
        }
    
        $lowongan->delete();

        return redirect()->back()->with('success', 'Alhamdulillah Berhasil Dihapus');
    }

    // public function checkSlug(Request $request)
    // {
    //     $slug = SlugService::createSlug(Lowongan::class, 'slug', $request->judul);
    //     return response()->json(['slug' => $slug]);
    // }
}
