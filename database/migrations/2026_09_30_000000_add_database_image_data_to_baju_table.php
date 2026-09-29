<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('baju', function (Blueprint $table) {
            $table->longText('gambar_data')->nullable();
            $table->string('gambar_mime', 100)->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('baju', function (Blueprint $table) {
            $table->dropColumn(['gambar_data', 'gambar_mime']);
        });
    }
};
