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
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function welcome()
    {
        $users = User::oldest();

        if (request('search')) {
            $users->where('nama','like','%'.request('search').'%');
        }

        if (request('user_sekolah')) {
            $users->where('sekolah_id','like','%'.request('user_sekolah').'%');
        }

        $sekolahs = Sekolah::all();
        $project = Project::all();
        // $image = Image::where('project_id',$project->id)->get();

        if($project->isEmpty()) {

        }else {
            // $project = User::find()->project;
            $user = User::all();
            $s = Project::whereBelongsTo($user)->get();
        }

        return view('welcome',['users' => $users->paginate(10) , 'sekolahs' => $sekolahs , 'project' => $project]);
    }

    public function index()
    {
        $user = Auth::user();
        $projects = Project::where('user_id', $user->id)->get();
        $skemas = Skema::all();
        return view('home.project.index', compact('projects','skemas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'judul_project' => 'required|min:5|max:200',
            'alamat_project' => 'required|max:2000',
            'login_project' => 'required|max:2000',
            'skema_id' => 'required',
//          'user_id' => 'required',
//            'gambar_project' => 'required','image','mimes:jpeg,jpg,png',
            'dokumentasi_project' => 'required','mimes:pdf','size:2048',
            'deskripsi' => 'required|max:2000',
        ]);


        $project = Project::create([
            'judul_project' => $request->judul_project,
            'alamat_project' => $request->alamat_project,
            'login_project' => $request->login_project,
            'skema_id' => $request->skema_id,
            'user_id' => Auth::user()->id,
//          'gambar_project' => $request->gambar_project,
            'dokumentasi_project' => $request->dokumentasi_project,
            'deskripsi' => $request->deskripsi,
        ]);

        if($request->hasFile('dokumentasi_project')){
            $request->file('dokumentasi_project')->move('image/dokumentasi_project/',$request->file('dokumentasi_project')->getClientOriginalName());
            $project->dokumentasi_project = $request->file('dokumentasi_project')->getClientOriginalName();
            $project->save();
        }

        if($request->hasFile('image')){

    foreach ($request->file('image') as $image) {
        $image->move('image/gambar_project/',$image->getClientOriginalName());
        $image = $image->getClientOriginalName();
        Image::create([
            'image' => $image,
            'project_id' => $project->id,
        ]);
    }
        }

        session()->flash('success', 'Create Project Berhasil');
        return redirect()->route('project.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $projects = Project::find($id);
        $skema = Skema::all();
        $image = $projects->image;
        return view('home.project.view', compact('projects','skema','image',));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $projects = Project::find($id);
        $skema = Skema::all();
        // tadinya uyang ini
        // $image = $projects->image;
        $image = Image::where('project_id',$projects->id)->get();
        return view('home.project.edit', compact('projects','skema','image'));
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
            'judul_project' => 'required|min:5|max:200',
            'alamat_project' => 'required|max:2000',
            'login_project' => 'required|max:2000',
            'skema_id' => 'required',
//          'user_id' => 'required',
//          'gambar_project' => 'required','mimes:jpeg,jpg,png',
            'dokumentasi_project' => 'required','mimes:pdf',
            'deskripsi' => 'required|max:2000',
        ]);

        $projects = Project::find($id);
        $projects->update([
            'judul_project' => $request->judul_project,
            'alamat_project' => $request->alamat_project,
            'login_project' => $request->login_project,
            'skema_id' => $request->skema_id,
            'user_id' => Auth::user()->id,
//          'gambar_project' => $request->gambar_project,
            'dokumentasi_project' => $request->dokumentasi_project,
            'deskripsi' => $request->deskripsi,
        ]);

        if($request->hasFile('dokumentasi_project')){
            $request->file('dokumentasi_project')->move('image/dokumentasi_project/',$request->file('dokumentasi_project')->getClientOriginalName());
            $projects->dokumentasi_project = $request->file('dokumentasi_project')->getClientOriginalName();
            $projects->save();
        }

        if($request->hasFile('image')){
            foreach ($request->file('image') as $image) {
                $image->move('image/gambar_project/',$image->getClientOriginalName());
                $image = $image->getClientOriginalName();

                Image::create([
                    'image' => $image,
                    'project_id' => $projects->id,
                ]);
            }

        }


        session()->flash('success', 'Update Project Berhasil');
        return redirect()->route('project.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $project = Project::find($id);
        $project->delete();

        session()->flash('success', 'Delete Project Berhasil');
        return redirect()->route('project.index');
    }

    public function destroyImg($id)
    {
        $img = Image::find($id);
        if(!$img) abort(404);
        unlink(public_path('image/gambar_project/'.$img->image));
        $img->delete();

        session()->flash('success', 'Delete Image Berhasil');
        return redirect()->back();
    }
}
