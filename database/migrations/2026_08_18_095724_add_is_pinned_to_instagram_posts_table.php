<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('instagram_posts', function (Blueprint $table) {
            // Hapus kolom sort_order lama, ganti dengan is_pinned
            $table->dropColumn('sort_order');
            $table->boolean('is_pinned')->default(false)->after('is_active');
        });
    }

    public function down(): void
    {
        Schema::table('instagram_posts', function (Blueprint $table) {
            $table->dropColumn('is_pinned');
            $table->unsignedSmallInteger('sort_order')->default(0)->after('is_active');
        });
    }
};
