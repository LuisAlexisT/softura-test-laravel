<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class movieController extends Controller
{
    public function index()
    {
        $movies = DB::table('m_pelicula')
        ->select('m_pelicula.*')
        ->get();

        return view('home',compact('movies'));
        //
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
        $data = array();

        $request->validate([
            'poster' => 'required',
            'duration' => 'required',
            'name' => 'required',
            'clasif' => 'required',
        ]);

        $file = $request->file('poster');
        $filename = time().'_'.$file->getClientOriginalName();

             // File extension
        $extension = $file->getClientOriginalExtension();

             // File upload location
        $location = public_path().'/img/movie/poster';

             // Upload file
        $file->move($location,$filename);

             // File path
        $filepath = url('files/'.$filename);

            // Response
        $data['success'] = 1;
        $data['message'] = 'Uploaded Successfully!';
        $data['filepath'] = $filepath;
        $data['extension'] = $extension;

        $id = DB::table('m_pelicula')->insertGetId([
            'name' => $request->name,
            'poster' => $filename,
            'duration' => $request->duration,
            'clasificacion' => $request->clasif,
            'sinopsis' => $request->sinopsis
        ]);

        $courses = DB::table('m_pelicula')
        ->select('m_pelicula.*')
        ->where('id',$id)
        ->first();

       return $courses;
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        DB::update('update m_pelicula set name = "'.$request->name.'" ,duration = '.$request->duration.' ,clasificacion = "'.$request->clasif.'",sinopsis = "'.$request->sinopsis.'" where id = '.$request->id.';');

        $movie = DB::table('m_pelicula')
        ->where('id', '=', $request->id)
        ->select('m_pelicula.*')
        ->first();

        return $movie;
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        $delete_movie = DB::table('m_pelicula')->where('id', $request->id)->delete();

        $movies_list = DB::table('m_pelicula')
        ->select('m_pelicula.*')
        ->get();

        return count($movies_list);
        //
    }
}

