@extends('layouts.app')

@section('content')
<div class="card mt-5">
    <div class="card-header text-center">
        Laporan Stock Barang
    </div>
    <div class="card-body">
        <table class="table table-bordered table-hover table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kode Barang</th>
                    <th>Nama Barang</th>
                    <th>Stock Awal</th>
                    <th>Penjualan</th>
                    <th>Stock Akhir</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($transaksis as $index=>$transaksi)
                <tr>
                    <td>
                        {{$index+1}}
                    </td>
                    <td>
                        {{$transaksi->code_item}}
                    </td>
                    <td>
                        {{$transaksi->name_item}}
                    </td>
                    <td>
                        {{$transaksi->stock_item}}
                    </td>
                    <td>
                        {{$transaksi->penjualan}}
                    </td>
                    <td style="background-color: {{($transaksi->stock_akhir < 0 ) ? '#F32013' : '#41a420'}}; font-weight:bold ; color:white " >
                        {{$transaksi->stock_akhir}}
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
</script>
@endpush