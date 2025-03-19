<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\superheroe;
use DB;

class SuperheroController extends Controller
{
    //
    public function index(){



        $superheroe = DB::table('superheroes')->get();


        return view('Superheroe.index', compact('superheroe'));
    }


    public function create()
    {
        return view('Superheroe.create');
    }

    public function store(Request $request)
    {
        $data = array();
        $data['name'] = $request->name;
        $data['real_name'] = $request->real_name;
        $data['details'] = $request->details;
        
        
        $image = $request->file('hero_image');
        if ($image)
        {
            $image_name = date('dmy_H_s_i');
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name.'.'.$ext;

            $upload_path = 'public/media/';
            $image_url = $upload_path.$image_full_name;
            $success = $image->move($upload_path,$image_full_name);

            $data['hero_image'] = $image_url;
            $superhero = DB::table('superheroes')->insert($data);

            return redirect()->route('Superheroe.index')->with('success','Superhero created succesfully');
        }
    }


    public function edit($id)
    {
        $superhero = DB::table('superheroes')->where('id', $id)->first();
        return view('Superheroe.edit', compact('superhero'));
    }


    public function update(Request $request, $id)
    {

        $oldImage = $request->old_image;

        $data = array();
        $data['name'] = $request->name;
        $data['real_name'] = $request->real_name;
        $data['details'] = $request->details;
        
        
        $image = $request->file('hero_image');
        if ($image)
        {
            unlink($oldImage);

            $image_name = date('dmy_H_s_i');
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name.'.'.$ext;

            $upload_path = 'public/media/';
            $image_url = $upload_path.$image_full_name;
            $success = $image->move($upload_path,$image_full_name);

            $data['hero_image'] = $image_url;
            $superhero = DB::table('superheroes')->where('id', $id)->update($data);

            return redirect()->route('Superheroe.index')->with('success','Superhero updated succesfully');
        }
    }


    public function Delete($id)
    {
        $data = DB::table('superheroes')->where('id',$id)->first();
        $image = $data->hero_image;

        unlink($image);

        $superhero = DB::table('superheroes')->where('id',$id)->delete();

        return redirect()->route('Superheroe.index')->with('success','Superhero deleted succesfully');
    }


}
