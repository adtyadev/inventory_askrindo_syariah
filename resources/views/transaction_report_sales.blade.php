@extends('layouts.app')

@section('content')
<div class="card mt-5">
    <div class="card-header text-center">
        Laporan Penjual Barang Setiap Hari
    </div>
    <div class="card-body">
        <table class="table table-bordered table-hover table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Tanggal Transaksi</th>
                    <th>Jumlah Transaksi</th>
                    <th>Jumlah Barang Terjual</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($transaksis as $index=>$transaksi)
                <tr>
                    <td>
                        {{$index+1}}
                    </td>
                    <td>
                        {{$transaksi->date_of_transaction}}
                    </td>
                    <td>
                        {{$transaksi->jumlah_transaksi}}
                    </td>
                    <td>
                        {{$transaksi->jumlah_barang_terjual}}
                    </td>
                    <td>
                    {{"Rp " . number_format($transaksi->total,2,',','.')}}
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