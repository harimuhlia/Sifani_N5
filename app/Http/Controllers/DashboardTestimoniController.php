<?php

namespace App\Http\Controllers;

use App\Models\Testimoni;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardTestimoniController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Auth::user()->role == 'Administrator') {
            $testimoni = Testimoni::All();
            return view('dashboard.testimoni.testi_index', compact('testimoni'));
        } else {
            $testimoni = Testimoni::where('user_id', auth()->user()->id)->get();
            return view('dashboard.testimoni.testi_index', compact('testimoni'));
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.testimoni.testi_create', [
            'users' => Auth::user(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $testimoni = new Testimoni();
        $testimoni->user_id = Auth::user()->id;
        $testimoni->star_rating = $request->rating;
        $testimoni->testimoni= $request->testimoni;
        $testimoni->save();
        return redirect()->route('testimoni.index')->with('success', 'Alhamdulillah Berhasil Dibuat');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $testimoni = Testimoni::find($id);
        return view('dashboard.testimoni.testi_show', compact('testimoni'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $testimoni = Testimoni::find($id);
        return view('dashboard.testimoni.testi_Edit', compact('testimoni'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        Testimoni::find($id)->update([
            'star_rating' => $request->rating,
            'testimoni' => $request->testimoni,
        ]);

       return redirect('dashboard/testimoni')->with('success', 'Alhamdulillah Berhasil Dibuat'); 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $testimoni = Testimoni::findOrFail($id);
        $testimoni->delete();
        return redirect()->route('testimoni.index')->with('success', 'Alhamdulillah Berhasil Dihapus');
    }
}
