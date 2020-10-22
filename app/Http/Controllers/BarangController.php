<?php

namespace App\Http\Controllers;

use App\Kategori;
use App\Barang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $barangs = Barang::all();
        $barangs = DB::table('barangs')
            ->join('kategoris', 'barangs.id_category', '=', 'kategoris.id')
            ->select('barangs.*', 'kategoris.name_category')
            ->get();
        $data = [
            'sidebar' => 2,
            'barangs' => $barangs];
        return view('item',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategoris = Kategori::all();
        return view('item_insert',['kategoris' => $kategoris]);
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
            'id_category' => 'required',
            'code_item' => 'required',
            'name_item' => 'required',
            'stock_item' => 'required',
            'price_item' => 'required',
    	]);

    	Barang::create([
    		'id_category' => $request->id_category,
            'code_item' => $request->code_item,
            'name_item' => $request->name_item,
            'stock_item' => $request->stock_item,
            'price_item' => $request->price_item,
        ]);
  
    	return redirect('/item');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function show(Barang $barang)
    {
        //
    }

    public function find_api(Request $request){
        try{
            if(!$request->code_item){
                return response()->json([
                    'status' => 'False',
                    'items'=> [
                    'kode_barang'=> '-',
                    'nama_barang'=> '-',
                    'harga'=> '-'
                    ],
                    'message'=>'params required !'
                ], 500);
            }else{
                $items = DB::table('barangs')
                     ->select('code_item', 'name_item','price_item')
                     ->where('code_item','=',$request->code_item)
                     ->get();

                if(sizeof($items)==0){
                    return response()->json([
                        'status' => 'False',
                        'items'=> [
                        'kode_barang'=> '-',
                        'nama_barang'=> '-',
                        'harga'=> '-'
                        ],
                        'message'=>'Data Not Found !'
                    ], 400);
                }else{
                    return response()->json([
                        'status'=>'True',
                        'items'=>$items,
                        'message'=>"Data Found !!"
                    ], 201);
                }
                
            }
        }catch (Exception $e) {
            return response()->json([
                'error' => 'Error !!'
            ], 500);
        
    }
}

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function edit($id,Barang $barang)
    {
            $barang = barang::find($id);
            $kategoris = Kategori::all();
            return view('item_edit', ['kategoris' => $kategoris,
                                      'barang' => $barang]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function update($id,Request $request, Barang $barang)
    {
        $this->validate($request,[
            'id_category' => 'required',
            'code_item' => 'required',
            'name_item' => 'required',
            'stock_item' => 'required',
            'price_item' => 'required',
        ]);
        
        $barangs = barang::find($id);
        $barangs->id_category = $request->id_category;
        $barangs->code_item = $request->code_item;
        $barangs->name_item = $request->name_item;
        $barangs->stock_item = $request->stock_item;
        $barangs->price_item = $request->price_item;
        $barangs->save();
        return redirect('/item');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function destroy($id,Barang $barang)
    {
        $barangs = barang::find($id);
        $barangs->delete();
        return redirect('/item');
    }
}