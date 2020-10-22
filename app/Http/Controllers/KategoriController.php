<?php

namespace App\Http\Controllers;

use App\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $kategoris = Kategori::all();
        $data = [
            'sidebar' => 1,
            'kategoris' => $kategoris];
        return view('category',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('category_insert');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
    		'name_category' => 'required',
    	]);

    	Kategori::create([
    		'name_category' => $request->name_category,
    	]);
  
    	return redirect('/category');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function show(Kategori $kategori)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function edit($id,Kategori $kategori)
    {
        //return response()->json($kategori::find($id));
        return view('category_edit',['kategori'=>$kategori::find($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function update($id,Request $request, Kategori $kategori)
    {
        $this->validate($request,[
    		'name_category' => 'required',
        ]);
        
        $kategoris = kategori::find($id);
        $kategoris->name_category = $request->name_category;
        $kategoris->save();
        return redirect('/category');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function destroy($id,Kategori $kategori)
    {
        $kategoris = kategori::find($id);
        $message = "Anda yakin ingin menghapus ".$kategoris->name_category;
        // echo "<script type='text/javascript'>alert('$message');</script>";
        $kategoris->delete();
        return redirect('/category');
    }
}
