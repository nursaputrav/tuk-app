<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProfileTuk;
use Illuminate\Validation\Rule;

class ProfileTukController extends Controller
{
    public function index()
    {
        $data = ProfileTuk::first();
        return view('home.profile-tuk.index', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = ProfileTuk::find($id);

        $request->validate([
            'nama_tuk' => 'required',
            'alamat_tuk' => 'required',
            'telp_tuk' => ['required','min:13','max:13',Rule::unique('profile_tuk')->ignore($data->id)],
            'ketua_tuk' => 'required',
            'admin_tuk' => 'required',
            'foto_tuk' => 'required',
            'foto_lsp' => 'required',
            'foto_bnsp' => 'required',
            'mou_tuk' => 'required','mimes:pdf'
        ]);

        $data->update([
            'nama_tuk' => $request->nama_tuk,
            'alamat_tuk' => $request->alamat_tuk,
            'telp_tuk' => $request->telp_tuk,
            'ketua_tuk' => $request->ketua_tuk,
            'admin_tuk' => $request->admin_tuk,
            // 'foto_tuk' => $request->foto_tuk,
            // 'foto_lsp' => $request->foto_lsp,
            // 'foto_bnsp' => $request->foto_bnsp,
            'mou_tuk' => $request->mou_tuk
        ]);

        if($request->hasFile('mou_tuk')){
            $request->file('mou_tuk')->move('image/mou-tuk/',$request->file('mou_tuk')->getClientOriginalName());
            $data->mou_tuk = $request->file('mou_tuk')->getClientOriginalName();
            $data->save();
        }

        if($request->hasFile('foto_tuk')){
            $request->file('foto_tuk')->move('image/foto_tuk/',$request->file('foto_tuk')->getClientOriginalName());
            $data->foto_tuk = $request->file('foto_tuk')->getClientOriginalName();
            $data->save();
        }

        if($request->hasFile('foto_lsp')){
            $request->file('foto_lsp')->move('image/foto_tuk/',$request->file('foto_lsp')->getClientOriginalName());
            $data->foto_lsp = $request->file('foto_lsp')->getClientOriginalName();
            $data->save();
        }

        if($request->hasFile('foto_bnsp')){
            $request->file('foto_bnsp')->move('image/foto_tuk/',$request->file('foto_bnsp')->getClientOriginalName());
            $data->foto_bnsp = $request->file('foto_bnsp')->getClientOriginalName();
            $data->save();
        }

        // unlink(public_path('image/foto_tuk/'.$data->foto_bnsp));
        // $data->foto_bnsp->delete();

        session()->flash('success', 'Update Profile Tuk Berhasil');
        return redirect()->route('profile-tuk.index');
    }
}
