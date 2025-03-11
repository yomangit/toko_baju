<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('kode_pakaian')->nullable();
            $table->string('nama_pakaian')->nullable();
            $table->string('jumlah_stok')->nullable();
            $table->string('harga_jual')->nullable();
            $table->string('harga_pokok')->nullable();
            $table->string('photo')->nullable();
            $table->unsignedBigInteger('kategori_id');
            $table->foreign('kategori_id')->references('id')->on('kategoris')->onDelete('cascade');
            $table->unsignedBigInteger('warna_id');
            $table->foreign('warna_id')->references('id')->on('warnas')->onDelete('cascade');
            $table->unsignedBigInteger('ukuran_pakaian_id');
            $table->foreign('ukuran_pakaian_id')->references('id')->on('ukuran_pakaians')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
