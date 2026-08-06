<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('instagram_posts', function (Blueprint $table) {
            $table->id();
            $table->string('image', 500)->comment('Path file gambar yang diupload');
            $table->text('caption')->nullable()->comment('Keterangan/caption postingan');
            $table->string('post_url', 500)->nullable()->comment('Link ke postingan Instagram asli');
            $table->boolean('is_active')->default(true)->index();
            $table->unsignedSmallInteger('sort_order')->default(0)->comment('Urutan tampil, semakin kecil semakin atas');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('instagram_posts');
    }
};
