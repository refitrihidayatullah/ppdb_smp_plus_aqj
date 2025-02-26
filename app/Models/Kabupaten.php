<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Kecamatan;
use App\Models\Provinsi;

class Kabupaten extends Model
{

    protected $table = "indonesia_cities";
    protected $fillable = ['name', 'code', 'province_code'];

    use HasFactory;


    public function provinsi()
    {
        return $this->belongsTo(Provinsi::class);
    }

    public function kecamatan()
    {
        return $this->hasMany(Kecamatan::class);
    }
}
