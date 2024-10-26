@extends('layout')

@section('content')
<div class="container">
    <h1>Daftar Transaksi</h1>
    <a href="{{ route('transaksi.create') }}" class="btn btn-primary">Tambah Transaksi</a>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table mt-4">
        <thead>
            <tr>
                <th>Kode Transaksi</th>
                <th>Nama Pelanggan</th>
                <th>Produk/Artikel</th>
                <th>Total</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($transaksi as $item)
                <tr>
                    <td>{{ $item->kode_transaksi }}</td>
                    <td>{{ $item->nama_pelanggan }}</td>
                    <td>{{ $item->post->title }}</td> <!-- Menampilkan judul post terkait -->
                    <td>{{ $item->total }}</td>
                    <td>
                        <a href="{{ route('transaksi.edit', $item->id) }}" class="btn btn-small btn-info">Edit</a>
                        <form action="{{ route('transaksi.destroy', $item->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-small btn-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
