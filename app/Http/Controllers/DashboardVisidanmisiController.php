<?php

namespace App\Http\Controllers;

use App\Models\Visidanmisi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardVisidanmisiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $visidanmisi = Visidanmisi::all();
        return view('dashboard.visimisi.visimisi_index', compact('visidanmisi'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.visimisi.visimisi_create', [
            'users' => Auth::user(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul'     => 'required',
            'visi'      => 'required',
            'misi'      => 'required',
            'motivasi'  => 'required',
        ]);
        
        Visidanmisi::create($validated);

        return redirect()->route('visidanmisi.index')->with('success', 'Alhamdulillah Berhasil Dibuat');
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
    public function edit(Visidanmisi $visidanmisi)
    {
        return view('dashboard.visimisi.visimisi_edit', [
            'users'     => Auth::user(),
            'visidanmisi'  => $visidanmisi
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Visidanmisi $visidanmisi)
    {
        $rules = [
            'judul'     => 'required',
            'visi'      => 'required',
            'misi'      => 'required',
            'motivasi'  => 'required',
        ];

        $validated = $request->validate($rules);

        Visidanmisi::where('id', $visidanmisi->id)
            ->update($validated);

        return redirect()->route('visidanmisi.index')->with('success', 'Alhamdulillah Berhasil Diedit');  
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Visidanmisi $visidanmisi)
    {
        $visidanmisi->delete();

        return redirect()->back()->with('success', 'Alhamdulillah Berhasil Dihapus');
    }
}
