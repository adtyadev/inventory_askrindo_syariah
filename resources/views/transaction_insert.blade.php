@extends('layouts.master')

@section('content')
<div class="container">
    <div class="card mt-5">
        <div class="card-header text-center">
            Insert Data Transaksi
        </div>
        <div class="card-body primary">
            <div class="row">
                <div class="col-lg-4">
                </div>
                <div class="col-lg-4">
                    <h5> Kode Transaksi : {{(session()->has('code_transaction')) ? session('code_transaction') : ''}} </h5>
                </div>
                <div class="col-lg-4 text-right">
                <a href="/transaction" class="btn btn-primary ">End Transaction</a>
                </div>
            </div>
           
           
            <br />
            <br />

            <form method="post" action="/transaction">

                {{ csrf_field() }}

                <div class="form-group">
                    <input type="text" name="code_transaction" class="form-control" placeholder="10" hidden 
                    value="{{(session()->has('code_transaction')) ? session('code_transaction') : ''}}">
                    <label>Pilih Barang</label>

                    <select id="id_item" name="id_item">
                        <option disabled> Pilih Barang </option>
                        @foreach($barangs as $barang)
                        <option value="{{$barang->id}}">{{$barang->name_item}}</option>
                        @endforeach
                        @foreach($barangs as $barang)
                        <input id="data-{{$barang->id}}" value="{{$barang->price_item}}" hidden >
                        @endforeach
                    </select>

                    @if($errors->has('id_item'))
                    <div class="text-danger">
                        {{ $errors->first('id_item')}}
                    </div>
                    @endif
                    <br>

                    <label>Jumlah Barang</label>
                    <input id="jumlah_barang" type="number" name="amount_of_items" class="form-control" placeholder="10" onchange="myScript()">

                    @if($errors->has('amount_of_items'))
                    <div class="text-danger">
                        {{ $errors->first('amount_of_items')}}
                    </div>
                    @endif

                    <label>Total Transaksi</label>
                    <p id="total_transaksi2"> </p>
                    <input hidden id="total_transaksi" type="number" name="total_transaction" class="form-control" placeholder="25000">

                    @if($errors->has('total_transaction'))
                    <div class="text-danger">
                        {{ $errors->first('total_transaction')}}
                    </div>
                    @endif

                </div>

                <div class="form-group text-right">
                    <input type="submit" class="btn btn-success" value="Simpan">
                </div>

            </form>

        </div>
    </div>
</div>
@endsection('content')

@push('scripts')
<script type="text/javascript">
function myScript(){
   var total_transaksi = (document.getElementById("data-"+document.getElementById("id_item").value).value )*(document.getElementById("jumlah_barang").value)
   document.getElementById("total_transaksi").value = total_transaksi
   var x = document.getElementById("total_transaksi2")
   x.innerHTML = "Rp "+total_transaksi+" ,-"
}
</script>
@endpush