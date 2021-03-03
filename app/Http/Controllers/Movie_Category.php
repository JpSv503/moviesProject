<?php

namespace App\Http\Controllers;

use App\Models\Movie_Category as ModelsMovie_Category;
use Illuminate\Http\Request;

class Movie_Category extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = ModelsMovie_Category::all();
        return view('movies-categories-dir.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = new ModelsMovie_Category();
        return view('movies-categories-dir.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->hasFile('imgname')){
            $file = $request->file('imgname');
            $name = time().$file->getClientOriginalName();
            $file->move(public_path().'/imgCategories/',$name);
        }
        $category = new ModelsMovie_Category();
        $category->nombre = $request->input('nombrename');
        $category->descripcion = $request->input('descripcionname');
        $category->fotografia = $name;
        $category->slug = $category->nombre;
        $category->save();
        return redirect()->route('category.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = ModelsMovie_Category::find($id);
        return view('movies-categories-dir.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = ModelsMovie_Category::find($id);
        return view('movies-categories-dir.edit', compact('category'));

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
        $category = ModelsMovie_Category::find($id);
        $category->fill($request->except('fotografia'));
        if($request->hasFile('fotografia')){
            $file = $request->file('fotografia');
            $name = time().$file->getClientOriginalName();
            $category->fotografia = $name;
            $file->move(public_path().'/imgCategories/',$name);
        }
        $category->save();
        return redirect()->route('category.show', [$category]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = ModelsMovie_Category::find($id);
        $foto_url = public_path().'imgCategories'.$category->fotografia;
        if(is_file($foto_url)){
            unlink($foto_url);
        }
        $category->delete();
        return redirect()->route('category.index');
    }
}
