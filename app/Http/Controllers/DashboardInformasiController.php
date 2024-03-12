<?php

namespace App\Http\Controllers;

use App\Models\Informasi;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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
        $validated = $request->validate([
            'judulinformasi'=> 'required',
            'deskripsi'     => 'required',
            'fileupload'    => 'mimes:xlsx,xls,doc,docx,pdf'
        ]);

        if($request->hasFile('fileupload')){
            $file = $request->file('fileupload');
            $fileName = $file->getClientOriginalName();
            Storage::disk('public')->put('fileinformasi/' .$fileName, file_get_contents($file));
            $validated['fileupload'] = 'fileinformasi/' .$fileName;
        }

        $validated['user_id'] = auth()->user()->id;
        $validated['excerpt'] = Str::limit(strip_tags($request->deskripsi), 50);
    
        Informasi::create($validated);

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
        $rules = [
            'judulinformasi'=> 'required',
            'deskripsi'     => 'required',
            'fileupload'    => 'mimes:xlsx,xls,doc,docx,pdf'
        ];

        $validated = $request->validate($rules);

        if($request->hasFile('fileupload')){
            if($informasi->fileupload){
                Storage::delete('public/'.$informasi->fileupload);
            }
            $file = $request->file('fileupload');
            $fileName = $file->getClientOriginalName();
            Storage::disk('public')->put('fileinformasi/'.$fileName, file_get_contents($file));
            $validated['fileupload'] = 'fileinformasi/'.$fileName;
        }

        $validated['user_id'] = auth()->user()->id;
        $validated['excerpt'] = Str::limit(strip_tags($request->deskripsi), 50);

        Informasi::where('id', $informasi->id)
            ->update($validated);
        
        return redirect()->route('informasi.index')->with('success', 'Alhamdulillah Berhasil Diedit');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Informasi $informasi)
    {
        if ($informasi->fileupload) {
            Storage::delete('public/'.$informasi->fileupload);
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
