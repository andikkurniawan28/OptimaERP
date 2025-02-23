<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organisasi extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function jenis_pihak_ketiga(){
        return $this->belongsTo(JenisPihakKetiga::class);
    }

    public function jenis_organisasi(){
        return $this->belongsTo(JenisOrganisasi::class);
    }

    public function bidang_usaha(){
        return $this->belongsTo(BidangUsaha::class);
    }

    public function wilayah(){
        return $this->belongsTo(Wilayah::class);
    }
}
