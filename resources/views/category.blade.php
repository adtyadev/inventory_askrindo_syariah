@extends('layouts.app')

@section('content')
<div class="card mt-5">
    <div class="card-header text-center">
        Data Master Kategori
    </div>
    <div class="card-body">
        <a href="/category/create" class="btn btn-primary">Input Kategori Baru</a>
        <br />
        <br />
        <table class="table table-bordered table-hover table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kategori</th>
                    <th>Action </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($kategoris as $index=>$kategori)
                <tr>
                    <td>
                        {{$index+1}}
                    </td>
                    <td>
                        {{$kategori->name_category}}
                    </td>
                    <td>
                        <a href="/category/{{ $kategori->id }}/edit" class="btn btn-warning">Edit</a>
                        <a onclick='check()' href="/category/hapus/{{ $kategori->id }}" class="btn btn-danger">Hapus</a>
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