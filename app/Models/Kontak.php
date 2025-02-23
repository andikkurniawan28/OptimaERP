<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kontak extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function organisasi(){
        return $this->belongsTo(Organisasi::class);
    }

    public function jabatan(){
        return $this->belongsTo(Jabatan::class);
    }

    public function status_karyawan(){
        return $this->belongsTo(StatusKaryawan::class);
    }

    public function status_perkawinan(){
        return $this->belongsTo(StatusPerkawinan::class);
    }

    public function agama(){
        return $this->belongsTo(Agama::class);
    }

    public function pendidikan_terakhir(){
        return $this->belongsTo(PendidikanTerakhir::class);
    }

    public function jurusan(){
        return $this->belongsTo(Jurusan::class);
    }

    public function sekolah(){
        return $this->belongsTo(Sekolah::class);
    }
}
