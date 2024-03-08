<?php

namespace App\Http\Controllers;

use App\Models\Informasi;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use function Ramsey\Uuid\v1;

class DashboardInformasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.informasi.informasi_index',[
            'users' => Auth::user(),
            'informasi' => Informasi::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.informasi.informasi_create', [
            'users' => Auth::user(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'judulinformasi'    => 'required',
            'deskripsi'         => 'required',
            'uploadfile'        => 'mimes:xlsx,xls,doc,docs,pdf',
        ]);

        $informasi= New Informasi();
        $informasi->user_id=Auth::user()->id;
        $informasi->judulinformasi=$request->get('judulinformasi');
        $informasi->excerpt= Str::limit(strip_tags($request->deskripsi), 30);
        $informasi->deskripsi=$request->get('deskripsi');
        if($request->hasFile('fileupload'))
        {
            $file = $request->file('fileupload');
            $extention = $file->getClientOriginalName();
            $filename = time().'.'.$extention;
            $file->move('fileinformasi/', $filename);
            $informasi->fileupload = $filename;
        }
        $informasi->save();

        return redirect()->route('informasi.index')->with('success', 'Alhamdulillah Berhasil Dibuat');
    }

    /**
     * Display the specified resource.
     */
    public function show(Informasi $informasi)
    {
        return view('dashboard.informasi.informasi_show', [
            'users'     => Auth::user(),
            'informasi'  => $informasi
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Informasi $informasi)
    {
        return view('dashboard.informasi.informasi_edit', [
            'users'     => Auth::user(),
            'informasi'  => $informasi
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Informasi $informasi)
    {
        $request->validate([
            'judulinformasi'    => 'required',
            'deskripsi'         => 'required',
            'uploadfile'        => 'mimes:xlsx,xls,doc,docs,pdf',
        ]);

        // $lowongan = Lowongan::findOrFail($lowongan);
        // $lowongan= New Lowongan();
        $informasi->user_id=Auth::user()->id;
        $informasi->judulinformasi=$request->get('judulinformasi');
        $informasi->excerpt= Str::limit(strip_tags($request->deskripsi), 30);
        $informasi->deskripsi=$request->get('deskripsi');
        if($request->hasFile('fileupload'))
        {
            $destination = 'fileinformasi/'.$informasi->fileupload;
            if(File::exists($destination))
            {
                File::delete($destination);
            }
            $file = $request->file('fileupload');
            $extention = $file->getClientOriginalName();
            $filename = time().'.'.$extention;
            $file->move('fileinformasi/', $filename);
            $informasi->fileupload = $filename;
            
        }
        $informasi->update();
        
        return redirect()->route('informasi.index')->with('success', 'Alhamdulillah Berhasil Diedit');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Informasi $informasi)
    {
        // $lowongan    = Lowongan::find($lowongan);
        $destination = 'fileinformasi/'.$informasi->fileupload;
            if(File::exists($destination))
            {
                File::delete($destination);
            }
        $informasi->delete();
        return redirect()->back()->with('success', 'Alhamdulillah Berhasil Dihapus');

        }

    // public function checkSlug(Request $request)
    // {
    //     $slug = SlugService::createSlug(Informasi::class, 'slug', $request->judulinformasi);
    //     return response()->json(['slug' => $slug]);
    // }
}
