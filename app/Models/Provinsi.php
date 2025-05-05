<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravolt\Indonesia\Models\Kabupaten;

class Provinsi extends Model
{

    protected $table = 'indonesia_provinces';
    protected $fillable = ['name', 'code'];

    use HasFactory;


    public function kabupaten()
    {
        return $this->hasMany(Kabupaten::class);
    }
}
