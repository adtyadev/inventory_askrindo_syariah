@extends('layouts.master')

@section('content')
<div class="container">
    <div class="card mt-5">
        <div class="card-header text-center">
            Insert Data Category
        </div>
        <div class="card-body primary">
            <a href="/category" class="btn btn-primary">Kembali</a>
            <br />
            <br />

            <form method="post" action="/category">

                {{ csrf_field() }}

                <div class="form-group">
                    <label>Nama Kategori</label>
                    <input type="text" name="name_category" class="form-control" placeholder="Makanan">

                    @if($errors->has('name_category'))
                    <div class="text-danger">
                        {{ $errors->first('name_category')}}
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