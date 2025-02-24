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
        Schema::create('absensis', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal');
            $table->foreignId('kontak_id')->constrained();
            $table->foreignId('shift_id')->constrained();
            $table->time('masuk')->nullable();
            $table->float('masuk_lebih_awal')->nullable();
            $table->float('masuk_terlambat')->nullable();
            $table->float('istirahat_lebih_awal')->nullable();
            $table->float('istirahat_terlambat')->nullable();
            $table->time('keluar_istirahat')->nullable();
            $table->time('kembali_istirahat')->nullable();
            $table->time('pulang')->nullable();
            $table->float('pulang_lebih_awal')->nullable();
            $table->float('pulang_terlambat')->nullable();
            $table->foreignId('cuti_id')->nullable()->constrained();
            $table->double('gaji_pokok')->nullable();
            $table->double('gaji_faktor_shift')->nullable();
            $table->double('gaji_faktor_hari')->nullable();
            $table->double('gaji_netto')->nullable();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('absensis');
    }
};
