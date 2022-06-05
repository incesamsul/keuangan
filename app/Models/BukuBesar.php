<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BukuBesar extends Model
{
    use HasFactory;

    protected $table = 'bukubesar';
    protected $guarded = ['id_bukubesar'];

    /**
     * Get the user that owns the BukuBesar
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function jurnal(): BelongsTo
    {
        return $this->belongsTo(Jurnal::class, 'id_jurnal', 'other_key');
    }
}
