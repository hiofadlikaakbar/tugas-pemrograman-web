<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use App\Models\Post; // Mengimpor model Post
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    // Menampilkan daftar transaksi (Read)
    public function index()
    {
        $transaksi = Transaksi::with('post')->get(); // Ambil semua transaksi beserta post terkait
        return view('transaksi.index', compact('transaksi'));
    }

    // Menampilkan form untuk membuat transaksi baru (Create)
    public function create()
    {
        $posts = Post::all(); // Ambil semua data Post untuk dropdown
        return view('transaksi.create', compact('posts'));
    }

    // Menyimpan transaksi baru ke database (Store)
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'post_id' => 'required|exists:posts,id',
            'kode_transaksi' => 'required|unique:transaksi,kode_transaksi',
            'nama_pelanggan' => 'required',
            'total' => 'required|numeric',
        ]);

        // Menyimpan data transaksi ke database
        Transaksi::create($request->all());

        // Redirect ke halaman transaksi dengan pesan sukses
        return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil ditambahkan.');
    }

    // Menampilkan form untuk mengedit transaksi (Edit)
    public function edit($id)
    {
        $transaksi = Transaksi::findOrFail($id); // Ambil data transaksi
        $posts = Post::all(); // Ambil semua Post untuk pilihan
        return view('transaksi.edit', compact('transaksi', 'posts'));
    }

    // Mengupdate transaksi yang sudah ada (Update)
    public function update(Request $request, $id)
    {
        $request->validate([
            'post_id' => 'required|exists:posts,id',
            'kode_transaksi' => 'required|unique:transaksi,kode_transaksi,'.$id,
            'nama_pelanggan' => 'required',
            'total' => 'required|numeric',
        ]);

        $transaksi = Transaksi::findOrFail($id);
        $transaksi->update($request->all());

        return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil diupdate.');
    }

    // Menghapus transaksi (Delete)
    public function destroy($id)
    {
        $transaksi = Transaksi::findOrFail($id);
        $transaksi->delete();

        return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil dihapus.');
    }
}
