@extends('layouts.app')

@section('content')
<div class="card mt-5">
    <div class="card-header text-center">
        Data Master Barang
    </div>
    <div class="card-body">
        <a href="/item/create" class="btn btn-primary">Input Barang Baru</a>
        <br />
        <br />
        <table class="table table-bordered table-hover table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kode Barang</th>
                    <th>Nama Barang</th>
                    <th>Kategori</th>
                    <th>Harga Satuan</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($barangs as $index=>$barang)
                <tr>
                    <td>
                        {{$index+1}}
                    </td>
                    <td>
                        {{$barang->code_item}}
                    </td>
                    <td>
                        {{$barang->name_item}}
                    </td>
                    <td>
                       {{$barang->name_category}}
                    </td>
                    <td>
                        {{"Rp " . number_format($barang->price_item,2,',','.')}}
                    </td>
                    <td>
                        <a href="/item/{{ $barang->id }}/edit" class="btn btn-warning">Edit</a>
                        <a onclick='check()' href="/item/hapus/{{ $barang->id }}" class="btn btn-danger">Hapus</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

@push('styles')
<style>

</style>
@endpush
@push('scripts')
<script type="text/javascript">
function check() {
    alert('Apakah anda yakin ingin menghapus data ?');
}
</script>
@endpush