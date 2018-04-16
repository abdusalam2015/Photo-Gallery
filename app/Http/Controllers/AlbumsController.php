<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Album;
class AlbumsController extends Controller
{
    //

    public function index(){
      $albums = Album::with('photos')->get();

      return view('albums.index')->with('albums' , $albums);

    }

    public function create(){
      return view('albums.create');

    }

    public function store(Request $request){


      $this->validate($request ,[
        'name' => 'required',
        'cover_image' => 'image|max:1999'

      ]);
      // Get File name with extention ( extention mean -> .jpg or png ....)
      $filenamewithExt = $request->file('cover_image')->getClientOriginalName();

      //get just filename
      $filename = pathinfo($filenamewithExt,  PATHINFO_FILENAME);

      // Get Extinstion
      $extension = $request->file('cover_image')->getClientOriginalExtension();

      // Create filename
      $filenameToStore = $filename.'_'.time().'.'.$extension;

      //Upload image
      $path = $request->file('cover_image')->storeAs('public/album_covers',$filenameToStore);

      $album = new Album;
      $album->name = $request->input('name');
      $album->description = $request->input('description');
      $album->cover_image  = $filenameToStore;
      $album->save();

      return redirect('/albums')->with('success' , 'Album Created');
    }
    public function show($id){

      $album = Album::with('photos')->find($id);
      return view('albums.show')->with('album' , $album);
    }
}
