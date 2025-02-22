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
        Schema::create('setups', function (Blueprint $table) {
            $table->id();
            $table->foreignId('jenis_organisasi_id')->constrained();
            $table->foreignId('bidang_usaha_id')->constrained();
            $table->foreignId('wilayah_id')->constrained();
            $table->string('nama_organisasi');
            $table->text('alamat_organisasi');
            $table->string('logo_organisasi')->nullable();
            $table->string('nomor_handphone_organisasi');
            $table->string('email_organisasi');
            $table->string('web_organisasi')->nullable();
            $table->string('linkedin_organisasi')->nullable();
            $table->string('facebook_organisasi')->nullable();
            $table->string('instagram_organisasi')->nullable();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('setups');
    }
};
