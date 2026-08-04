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
        Schema::create('news_articles', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('excerpt', 500)->nullable()->comment('Ringkasan singkat artikel untuk preview');
            $table->longText('content')->comment('Isi artikel lengkap (HTML/Markdown)');
            $table->string('image')->nullable()->comment('Thumbnail/gambar utama artikel');
            $table->string('author', 150)->comment('Nama penulis artikel');
            $table->boolean('is_published')->default(false)->index();
            $table->timestamp('published_at')->nullable()->comment('Jadwal atau waktu publikasi');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('news_articles');
    }
};
