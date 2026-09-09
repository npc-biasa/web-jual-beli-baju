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
        schema::table('keranjangs', function (Blueprint $table) {
            $table->foreign('id_baju')
                ->references('id_baju')
                ->on('bajus')
                ->cascadeOnDelete();
        });

        schema::table('detail_pesanans', function (Blueprint $table) {
            $table->foreign('id_baju')
                ->references('id_baju')
                ->on('bajus')
                ->cascadeOnDelete();
        });

        Schema::table('detail_pesanans', function (Blueprint $table) {
            $table->foreign('id_pesanan')
                ->references('id_pesanan')
                ->on('pesanans')
                ->cascadeOnDelete();
        });

        Schema::table('pembayarans', function (Blueprint $table) {
            $table->foreign('id_pesanan')
                ->references('id_pesanan')
                ->on('pesanans')
                ->cascadeOnDelete();
        });


        Schema::table('pesanans', function (Blueprint $table) {
            $table->foreign('id_user')
                ->references('id_user')
                ->on('users')
                ->cascadeOnDelete();
        });

        Schema::table('keranjangs', function (Blueprint $table) {
            $table->foreign('id_user')
                ->references('id_user')
                ->on('users')
                ->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        schema::table('keranjangs', function (Blueprint $table) {
            $table->dropForeign(['id_baju']);
        });

        Schema::table('detail_pesanans', function (Blueprint $table) {
            $table->dropForeign(['id_baju']);
        });

        Schema::table('detail_pesanans', function (Blueprint $table) {
            $table->dropForeign(['id_pesanan']);
        });

        Schema::table('pesanans', function (Blueprint $table) {
            $table->dropForeign(['id_user']);
        });

        Schema::table('keranjangs', function (Blueprint $table) {
            $table->dropForeign(['id_user']);
        });

        Schema::table('pembayarans', function (Blueprint $table) {
            $table->dropForeign(['id_pesanan']);
        });
    }
};
