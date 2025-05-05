<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Kecamatan;

class Desa extends Model
{
    use HasFactory;
    protected $table = 'indonesia_villages';
    protected $fillable = ['name', 'code', 'district_code'];


    public function kecamatan()
    {
        return $this->belongsTo(Kecamatan::class);
    }
}
