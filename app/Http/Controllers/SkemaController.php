<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Skema;

class SkemaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $skema = Skema::all();
        return view('home.skema.index', compact('skema'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('home.skema.create');
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
            'nama_skema' => 'required',
        ]);

        Skema::create([
            'nama_skema' => $request->nama_skema,
        ]);

        session()->flash('success', 'Create Skema Berhasil');
        return redirect()->route('skema.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $skema = Skema::find($id);
        return view('home.skema.edit', compact('skema'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_skema' => 'required',
        ]);

        $skema = Skema::find($id);

        $skema->update([
            'nama_skema' => $request->nama_skema,
        ]);

        session()->flash('success', 'Update Skema Berhasil');
        return redirect()->route('skema.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $skema = Skema::find($id);
        $skema->delete();

        session()->flash('success', 'Delete Skema Berhasil');
        return redirect()->route('skema.index');
    }
}
