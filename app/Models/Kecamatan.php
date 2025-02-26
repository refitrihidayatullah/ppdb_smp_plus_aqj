<?php

namespace App\Models;

use App\Models\Desa;
use App\Models\Kabupaten;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use Laravolt\Indonesia\Models\Kabupaten;

class Kecamatan extends Model
{
    use HasFactory;
    protected $table = 'indonesia_districts';
    protected $fillable = ['name', 'city_code'];


    public function kabupaten()
    {
        return $this->belongsTo(Kabupaten::class);
    }

    public function desa()
    {
        return $this->hasMany(Desa::class);
    }
}
