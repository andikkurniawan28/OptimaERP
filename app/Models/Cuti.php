<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cuti extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function kontak(){
        return $this->belongsTo(Kontak::class);
    }
}
