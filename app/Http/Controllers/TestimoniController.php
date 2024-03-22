<?php

namespace App\Http\Controllers;

use App\Models\Testimoni;
use Illuminate\Http\Request;

class TestimoniController extends Controller
{
    public function testimoni()
    {
        // $testifront = Testimoni::all();
        $testifront = Testimoni::orderBy('id', 'DESC')->paginate(9);
        return view('testifrontend.testifront_index',[
            'testifront' => $testifront
        ]);
    }

    public function show($id)
    {
        $testifront = Testimoni::find($id);
        return view('testifrontend.testifront_show', compact('testifront'));
    }
}
