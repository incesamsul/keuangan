<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Jurnal extends Model
{
    use HasFactory;

    protected $table = 'jurnal';
    protected $guarded = ['id_jurnal'];

    /**
     * Get the user that owns the Jurnal
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function akun(): BelongsTo
    {
        return $this->belongsTo(Akun::class, 'id_akun', 'id_akun');
    }
}
