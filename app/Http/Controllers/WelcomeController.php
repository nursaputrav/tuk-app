<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Project;
use App\Models\Skema;
use App\Models\Image;
use App\Models\Sekolah;
use App\Models\User;
use App\Models\Kelas;
use App\Models\ProgramKeahlian;
use Auth;

class WelcomeController extends Controller
{
    public function welcomeView($id)
    {
        $projects = Project::find($id);
        $skema = Skema::all();
        $image = Image::where('project_id',$projects->id)->get();
        // $image = $projects->image;
        $user = $projects->user;
        $sekolah = Sekolah::all();
        $kelas = Kelas::all();
        $program_keahlian = ProgramKeahlian::all();
        $tahun_sekarang = date('Y');
        $tahun_depan = date('Y', strtotime("+1 years", strtotime(date("Y"))));
        return view('view-welcome', compact('projects','skema','image','user','sekolah','kelas','tahun_sekarang','tahun_depan','program_keahlian'));
    }
}
