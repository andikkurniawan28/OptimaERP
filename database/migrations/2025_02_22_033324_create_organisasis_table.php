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
        Schema::create('organisasis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('jenis_organisasi_id')->constrained();
            $table->foreignId('bidang_usaha_id')->constrained();
            $table->foreignId('wilayah_id')->constrained();
            $table->string('kode')->unique();
            $table->string('nama')->unique();
            $table->string('nomor_handphone')->unique();
            $table->string('email')->unique();
            $table->text('alamat');
            $table->string('npwp')->nullable();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('organisasis');
    }
};
