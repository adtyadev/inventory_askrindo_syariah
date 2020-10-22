<?php

namespace App\Http\Controllers;

use App\Transaksi;
use App\Barang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use DateTime;
use Illuminate\Support\Str;
class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transaksis = DB::table('transaksis')
                     ->select(DB::raw('date_of_transaction,code_transaction, count(code_transaction) as sum_of_items, sum(total_transaction) as sum_of_transaction'))
                     ->groupBy('code_transaction')
                     ->groupBy('date_of_transaction')
                     ->get();
        $data = [
            'sidebar' => 3,
            'transaksis' => $transaksis];
        return view('transaction',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $barangs = Barang::all();
        return view('transaction_insert',['barangs'=>$barangs]);
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
            'id_item' => 'required',
            'amount_of_items'=>'required',
            'total_transaction'=>'required'
    	]);
        $dt = new DateTime();
        $code_trasaction = ($request->code_transaction == "") ? Str::random() : $request->code_transaction;
    	Transaksi::create([
            'id_item' => $request->id_item,
            'code_transaction'=>$code_trasaction,
            'amount_of_items' => $request->amount_of_items,
            'total_transaction'=> $request->total_transaction,
            'date_of_transaction'=> $dt->format('Y-m-d')
    	]);
        //print_r ($request);
    	return redirect('transaction/create')->with('code_transaction', $code_trasaction);;
    }

    public function detail($code_trasaction){
        $detail = DB::table('transaksis')
                     ->select(DB::raw('date_of_transaction,code_transaction, count(code_transaction) as sum_of_items, sum(total_transaction) as sum_of_transaction'))
                     ->where('code_transaction','=',$code_trasaction)
                     ->groupBy('code_transaction')
                     ->groupBy('date_of_transaction')
                     ->get();
        $transaksis = DB::table('transaksis')
        ->where('code_transaction','=',$code_trasaction)
        ->join('barangs', 'transaksis.id_item', '=', 'barangs.id')
        ->select('barangs.*', 'transaksis.*')
        ->get();
        $data = ['sidebar'=>3,
        'detail'=>$detail[0],
        'transaksis'=>$transaksis];
         //return $transaksis;
        return view('transaction_detail',$data);
    }

    public function report_stock_item(){
        $report_stock_item = DB::table('transaksis')
                                ->join('barangs','transaksis.id_item','=','barangs.id')
                                ->groupBy('id_item')
                                ->select(DB::raw('barangs.code_item,barangs.name_item,barangs.stock_item, sum(transaksis.amount_of_items) as penjualan,(barangs.stock_item - sum(transaksis.amount_of_items)) as stock_akhir'))
                                ->get();
        return view('transaction_report_item',['sidebar' => 4,
                                                'transaksis'=>$report_stock_item]);
    }

    public function report_sales_item(){
        $report_sales_item = DB::table('transaksis')
                                ->groupBy('date_of_transaction')
                                ->select(DB::raw('date_of_transaction,count(code_transaction) as jumlah_transaksi,sum(amount_of_items) as jumlah_barang_terjual,sum(total_transaction) as total'))
                                ->get();
        return view('transaction_report_sales',['sidebar' => 5,
        'transaksis'=>$report_sales_item]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function show(Transaksi $transaksi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaksi $transaksi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaksi $transaksi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaksi $transaksi)
    {
        //
    }
}