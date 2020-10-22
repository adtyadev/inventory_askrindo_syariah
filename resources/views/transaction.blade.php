@extends('layouts.app')

@section('content')
<div class="card mt-5">
    <div class="card-header text-center">
        Data Transaksi
    </div>
    <div class="card-body">
        <a href="/transaction/create" class="btn btn-primary">Input Transaksi Baru</a>
        <br />
        <br />
        <table class="table table-bordered table-hover table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Tanggal Transaksi</th>
                    <th>Kode Transaksi</th>
                    <th>Jumlah Barang</th>
                    <th>Total</th>
                    <th>Detail</th>
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
                        {{$transaksi->code_transaction}}
                    </td>
                    <td>
                        {{$transaksi->sum_of_items}}
                    </td>
                    <td>
                    {{"Rp " . number_format($transaksi->sum_of_transaction,2,',','.')}}
                    </td>
                    <td>
                        <a href="\transaction\detail\{{$transaksi->code_transaction}}" class="btn btn-primary">Detail</a>
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