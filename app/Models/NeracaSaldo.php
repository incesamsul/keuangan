<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NeracaSaldo extends Model
{
    use HasFactory;

    protected $table = 'neracasaldo';
    protected $guarded = ['id_neracasaldo']; 
}
