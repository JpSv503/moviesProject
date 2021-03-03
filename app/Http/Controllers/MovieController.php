<?php

namespace App\Http\Controllers;

use App\Models\Movie_Category as ModelsMovie_Category;
use App\Models\Movie;
use Illuminate\Http\Request;
use Symfony\Component\Console\Input\Input;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $movies = Movie::all();
        return view('movies-dir.index-table', compact('movies'));
        /** Otra vista, pero en forma de tarjetas
         * 
         *  return view('movies-dir.index', compact('movies'));
         */
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $movie = new Movie();
        $type=ModelsMovie_Category::pluck('id','nombre');
        $type->all();
        return view('movies-dir.create',compact('type', 'movie'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->hasFile('img')){
            $file = $request->file('img');
            $name = time().$file->getClientOriginalName();
            $file->move(public_path().'/imgPelicula/',$name);
        }
        $movie = new Movie();
        $movie->titulo = $request->input('titulo');
        $movie->estreno = $request->input('estreno');
        $movie->duracion = $request->input('duracion');
        $movie->stock = $request->input('stock');
        $movie->fotografia = $name;
        $movie->slug = $movie->titulo;
        $movie->category_id = $request->get('id_category');
        $movie->estado = 1;
        $movie->save();
        return redirect()->route('movie.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $movie = Movie::find($id);
        return view('movies-dir.show', compact('movie'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $movie = Movie::find($id);
        $type=ModelsMovie_Category::pluck('id','nombre');
        $type->all();
        return view('movies-dir.edit',compact('type', 'movie'));
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
        $movie = Movie::find($id);
        $movie->fill($request->except('fotografia'));
        if($request->hasFile('fotografia')){
            $file = $request->file('fotografia');
            $name = time().$file->getClientOriginalName();
            $movie->fotografia = $name;
            $file->move(public_path().'/imgPelicula/',$name);
        }
        $movie->save();
        return redirect()->route('movie.show', [$movie]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $movie = Movie::find($id);
        $foto_url = public_path().'/imgPelicula/'.$movie->fotografia;
        if(is_file($foto_url)){
            unlink($foto_url);
        }
        $movie->delete();
        return redirect()->route('movie.index');
    }
}
