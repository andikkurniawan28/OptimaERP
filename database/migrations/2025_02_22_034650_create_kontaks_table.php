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
        Schema::create('kontaks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('jenis_kontak_id')->constrained();
            $table->foreignId('organisasi_id')->constrained();
            $table->string('nama')->unique();
            $table->string('nomor_handphone')->unique();
            $table->string('email')->unique();
            $table->text('alamat');
            $table->foreignId('jenis_pihak_ketiga_id')->nullable()->constrained();
            $table->foreignId('jabatan_id')->nullable()->constrained();
            $table->foreignId('status_karyawan_id')->nullable()->constrained();
            $table->foreignId('agama_id')->nullable()->constrained();
            $table->foreignId('status_perkawinan_id')->nullable()->constrained();
            $table->foreignId('pendidikan_terakhir_id')->nullable()->constrained();
            $table->foreignId('sekolah_id')->nullable()->constrained();
            $table->foreignId('jurusan_id')->nullable()->constrained();
            $table->string('npwp')->nullable();
            $table->string('nik')->nullable();
            $table->string('nkk')->nullable();
            $table->string('bpjs_ketenagakerjaan')->nullable();
            $table->string('bpjs_kesehatan')->nullable();
            $table->string('tempat_lahir')->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kontaks');
    }
};
