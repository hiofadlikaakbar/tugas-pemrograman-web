<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransaksiTable extends Migration
{
    public function up()
    {
        Schema::create('transaksi', function (Blueprint $table) {
            $table->id();
            $table->foreignId('post_id')->constrained('posts')
                ->onDelete('cascade'); 
            // Foreign key ke tabel 'posts'
            $table->string('kode_transaksi')->unique();
            $table->string('nama_pelanggan');
            $table->decimal('total', 10, 2);
            $table->timestamp('tanggal_transaksi')->useCurrent();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('transaksi');
    }
}
