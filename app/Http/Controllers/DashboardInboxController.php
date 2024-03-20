<?php

namespace App\Http\Controllers;

use App\Models\Inbox;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use function Ramsey\Uuid\v1;

class DashboardInboxController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.inbox.inbox_index',[
            // 'users' => Auth::user(),
            'kotakmasuk' => Inbox::all()
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
    public function store(Request $request,)
    {
        $validated = $request->validate([
            'nama'     => 'required',
            'email'    => 'required',
            'subjek'   => 'required',
            'isipesan' => 'required',
        ]);
        
        Inbox::create($validated);

        return redirect()->route('inbox.create')->with('success', 'Alhamdulillah Berhasil Dibuat');
    }
    /**
     * Display the specified resource.
     */
    public function show(Inbox $inbox)
    {
        return view('dashboard.inbox.inbox_show', [
            // 'users'     => Auth::user(),
            'kotakmasuk'  => $inbox
        ]);
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
    public function destroy(Inbox $inbox)
    {
        $inbox->delete();

        return redirect()->route('inbox.index')->with('success', 'Alhamdulillah Berhasil Dihapus');
    }
}
