<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\Models\Sekolah;
use App\Models\Kelas;
use App\Models\ProgramKeahlian;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{
    public function view()
    {
        $user = Auth::user();
        // Tahun Sekarang & Depan
        $tahun_sekarang = date('Y');
        $tahun_depan = date('Y', strtotime("+1 years", strtotime(date("Y"))));

        $sekolah = Sekolah::all();
        $kelas = Kelas::all();
        $program_keahlian = ProgramKeahlian::all();
        return view('home.profile.index', compact('user','tahun_sekarang','tahun_depan','sekolah','kelas','program_keahlian'));
    }


    public function update(Request $request)
    {
        $user = Auth::user();
        $request->validate([
            'nama' => 'required|min:3|max:50',
            'email' => ['required',Rule::unique('user')->ignore($user->id)],
            'no_telp' => ['required','min:13','max:13',Rule::unique('user')->ignore($user->id)],
            'sekolah_id' => 'required',
            'program_keahlian_id' => 'required',
            'jenis_kelamin' => 'required',
            'foto_profile' => 'required','mimes:jpeg,jpg,png',
            'kelas_id' => 'required',
            // 'tahun_ajaran' => 'required',
            'status_siswa' => 'required',
            'alamat' => 'required|max:500',
        ]);

        // Tahun Sekarang & Depan
        $tahun_sekarang = date('Y');
        $tahun_depan = date('Y', strtotime("+1 years", strtotime(date("Y"))));
        $user = Auth::user();

        $user->update([
            'nama' => $request->nama,
            'email' => $request->email,
            'no_telp' => $request->no_telp,
            'sekolah_id' => $request->sekolah_id,
            'program_keahlian_id' => $request->program_keahlian_id,
            'jenis_kelamin' => $request->jenis_kelamin,
            'kelas_id' => $request->kelas_id,
            'tahun_ajaran' => $tahun_sekarang."-".$tahun_depan,
            'status_siswa' => $request->status_siswa,
            'alamat' => $request->alamat,
        ]);

        if($request->hasFile('foto_profile')){
            $request->file('foto_profile')->move('image/foto_profile/',$request->file('foto_profile')->getClientOriginalName());
            $user->foto_profile = $request->file('foto_profile')->getClientOriginalName();
            $user->save();
        }

        session()->flash('success', 'Update Profile Berhasil');
        return redirect()->route('profile.view');
    }
}
