<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    use HasFactory;

    protected $table = 'pelanggan';
    protected $guarded = ['id_pelanggan'];

    public function jurnal()
    {
        return $this->hasOne(Jurnal::class, 'id_pelanggan', 'id_pelanggan');
    }

}
