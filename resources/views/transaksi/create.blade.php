@extends('layout')

@section('content')
<div class="container">
    <h1>Tambah Transaksi</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('transaksi.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="post_id">Pilih Produk/Artikel:</label>
            <select name="post_id" class="form-control">
                @foreach ($posts as $post)
                    <option value="{{ $post->id }}">{{ $post->title }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="kode_transaksi">Kode Transaksi:</label>
            <input type="text" name="kode_transaksi" class="form-control"
                value="{{ old('kode_transaksi') }}">
        </div>

        <div class="form-group">
            <label for="nama_pelanggan">Nama Pelanggan:</label>
            <input type="text" name="nama_pelanggan" class="form-control"
                value="{{ old('nama_pelanggan') }}">
        </div>
        
        <div class="form-group">
            <label for="total">Total:</label>
            <input type="text" name="total" class="form-control"
                value="{{ old('total') }}">
        </div>

        <br />
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
