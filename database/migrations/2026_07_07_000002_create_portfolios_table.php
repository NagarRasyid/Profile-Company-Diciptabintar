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
        Schema::create('portfolios', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('description');
            $table->string('client')->nullable()->comment('Nama klien/perusahaan');
            $table->string('category')->index()->comment('Kategori proyek, misal: konstruksi, desain');
            $table->string('image')->nullable()->comment('Gambar utama/thumbnail');
            $table->json('gallery')->nullable()->comment('Array path gambar galeri tambahan');
            $table->unsignedSmallInteger('year')->nullable()->comment('Tahun pengerjaan proyek');
            $table->string('url')->nullable()->comment('URL live project jika ada');
            $table->boolean('is_featured')->default(false)->comment('Tampil di halaman utama');
            $table->boolean('is_active')->default(true);
            $table->unsignedSmallInteger('order')->default(0)->comment('Urutan tampilan');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('portfolios');
    }
};
