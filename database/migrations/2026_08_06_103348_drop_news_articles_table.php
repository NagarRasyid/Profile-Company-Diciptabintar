<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::dropIfExists('news_articles');
    }

    public function down(): void
    {
        // No restore — data is intentionally removed
    }
};
