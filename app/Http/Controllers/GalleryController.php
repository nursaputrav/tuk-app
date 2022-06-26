<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gallery;
class GalleryController extends Controller
{
    public function index()
    {
        $data = Gallery::all();
        $first = Gallery::first();
        return view('home.gallery.index', compact('data','first'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'foto_gallery' => 'required'
        ]);

        if($request->hasFile('foto_gallery')){
             foreach ($request->file('foto_gallery') as $image) {
                 $image->move('image/hero/',$image->getClientOriginalName());
                 $image = $image->getClientOriginalName();


                 Gallery::create([
                     'foto_gallery' => $image,
                 ]);
             }
         }
         session()->flash('success', 'Update Gallery Berhasil');
         return redirect()->route('gallery.index');
    }

    public function destroy($id)
    {
        $img = Gallery::find($id);
        if(!$img) abort(404);
        unlink(public_path('image/hero/'.$img->foto_gallery));
        $img->delete();

        session()->flash('success', 'Delete Gallery Berhasil');
        return redirect()->back();
    }
}
