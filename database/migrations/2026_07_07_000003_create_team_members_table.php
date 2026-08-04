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
        Schema::create('team_members', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('position')->comment('Jabatan atau posisi, misal: Kepala Dinas, Koordinator...');
            $table->text('bio')->nullable()->comment('Deskripsi singkat profil anggota tim');
            $table->string('photo')->nullable()->comment('Path file foto di storage');
            $table->unsignedSmallInteger('order')->default(0)->comment('Urutan tampilan');
            $table->boolean('is_active')->default(true);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('team_members');
    }
};
