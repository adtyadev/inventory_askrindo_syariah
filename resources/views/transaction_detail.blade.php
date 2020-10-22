@extends('layouts.app')

@section('content')
<div class="card mt-5">
    <div class="card-header text-center">
        Data Detail Transaksi [Kode Transaksi]
    </div>
    <div class="card-body">
        <h6> Tanggal Transaksi : {{$detail -> date_of_transaction}} </h6>
        <h6> Kode Transaksi :  {{$detail -> code_transaction}}</h6>
        <h6> Jumlah Barang :  {{$detail -> sum_of_items}}</h6>
        <table class="table table-bordered table-hover table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kode Barang</th>
                    <th>Nama Barang</th>
                    <th>Harga Satuan</th>
                    <th>Jumlah</th>
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
                        {{$transaksi->code_item}}
                    </td>
                    <td>
                        {{$transaksi->name_item}}
                    </td>
                    <td>
                    {{"Rp " . number_format($transaksi->price_item,2,',','.')}}
                    </td>
                    <td>
                        {{$transaksi->amount_of_items}}
                    </td>
                    <td>
                    {{"Rp " . number_format($transaksi->total_transaction,2,',','.')}}
                    </td>
                </tr>
                @endforeach
                <tr>
                    <td colspan="5">
                        Total
                    </td>
                    <td >
                    {{"Rp " . number_format($detail->sum_of_transaction,2,',','.')}}
                    </td>
                </tr>

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