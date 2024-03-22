<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class DashboardProfilController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.profil.profil_index', [
            'profilusers' => Auth::user(),
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
        return view('dashboard.profil.profil_edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $user = auth()->user();
        $rules = [
            'name'  => 'required',
            'email' => 'required|unique:users,email,' . $user->id,
            'kelas'  => 'required',
            'alamat'  => 'required',
            'foto_profil'  => 'image|mimes:jpg,jpeg,png'
        ];

        if($request->filled('password')){
            $rules['password']  = 'required|min:8';
        }

        $validated = $request->validate($rules);

        if($request->hasFile('foto_profil')){
            if($user->foto_profil){
                Storage::delete($user->foto_profil);
            }
            $file = $request->file('foto_profil');
            $fileName = $file->getClientOriginalName();
            Storage::disk('public')->put('fotoprofil/'.$fileName, file_get_contents($file));
            $validated['foto_profil'] = 'fotoprofil/'.$fileName;
        }

        if ($request->filled('password')) {
            $validated['password'] = bcrypt($request->password);
        } else {
            unset($validated['password']);
        }

        User::where('id', $user->id)
            ->update($validated);

        Alert::success('Berhasil !', 'Berhasil Memperbarui Profil');
        return redirect('/dashboard/profil');   
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
