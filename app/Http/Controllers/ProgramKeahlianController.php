<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProgramKeahlian;

class ProgramKeahlianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $program_keahlian = ProgramKeahlian::all();
        return view('home.program-keahlian.index', compact('program_keahlian'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('home.program-keahlian.create');
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
            'nama_keahlian' => 'required',
        ]);

        ProgramKeahlian::create([
            'nama_keahlian' => $request->nama_keahlian,
        ]);

        session()->flash('success', 'Create Program Keahlian Berhasil');
        return redirect()->route('program-keahlian.index');
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
        $program_keahlian = ProgramKeahlian::find($id);
        return view('home.program-keahlian.edit', compact('program_keahlian'));
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
            'nama_keahlian' => 'required',
        ]);

        $program_keahlian = ProgramKeahlian::find($id);

        $program_keahlian->update([
            'nama_keahlian' => $request->nama_keahlian,
        ]);

        session()->flash('success', 'Update Program Keahlian Berhasil');
        return redirect()->route('program-keahlian.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $program_keahlian = ProgramKeahlian::find($id);
        $program_keahlian->delete();

        session()->flash('success', 'Delete Program Keahlian Berhasil');
        return redirect()->route('program-keahlian.index');
    }
}
