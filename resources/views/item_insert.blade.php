@extends('layouts.master')

@section('content')
<div class="container">
    <div class="card mt-5">
        <div class="card-header text-center">
            Insert Data Item
        </div>
        <div class="card-body primary">
            <a href="/item" class="btn btn-primary">Back</a>
            <br />
            <br />

            <form method="post" action="/item">

                {{ csrf_field() }}

                <div class="form-group">
                    <label>Kategori Barang</label>

                    <select id="id_category" name="id_category">
                        <option disabled> Pilih Kategori </option>
                        @foreach($kategoris as $kategori)
                        <option value="{{$kategori->id}}">{{$kategori->name_category}}</option>
                        @endforeach
                    </select>

                    @if($errors->has('id_category'))
                    <div class="text-danger">
                        {{ $errors->first('id_category')}}
                    </div>
                    @endif
                    <br>

                    <label>Kode Barang</label>
                    <input type="text" name="code_item" class="form-control" placeholder="TRX120">

                    @if($errors->has('code_item'))
                    <div class="text-danger">
                        {{ $errors->first('code_item')}}
                    </div>
                    @endif

                    <label>Nama Barang</label>
                    <input type="text" name="name_item" class="form-control" placeholder="Indomie Goreng">

                    @if($errors->has('name_item'))
                    <div class="text-danger">
                        {{ $errors->first('name_item')}}
                    </div>
                    @endif

                    <label>Stock Barang</label>
                    <input type="number" name="stock_item" class="form-control" placeholder="100">

                    @if($errors->has('stock_item'))
                    <div class="text-danger">
                        {{ $errors->first('stock_item')}}
                    </div>
                    @endif

                    <label>Harga Barang</label>
                    <input type="text" name="price_item" class="form-control" placeholder="25000">

                    @if($errors->has('price_item'))
                    <div class="text-danger">
                        {{ $errors->first('price_item')}}
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