<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('services', function (Blueprint $table) {
            $table->text('icon')->nullable()->change();
            $table->string('color', 20)->default('blue')->after('icon');
            $table->unsignedInteger('jumlah_permohonan')->default(0)->after('color');
        });
    }

    public function down(): void
    {
        Schema::table('services', function (Blueprint $table) {
            $table->string('icon', 255)->nullable()->change();
            $table->dropColumn(['color', 'jumlah_permohonan']);
        });
    }
};