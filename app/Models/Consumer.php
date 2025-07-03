<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Consumer extends Model
{
    use HasFactory;

    protected $fillable = [
        'province_id',
        'sector_id',
        'first_name',
        'last_name',
        'id_number',
        'email',
        'phone_number',
    ];

    // Relación con la provincia
    public function province()
    {
        return $this->belongsTo(Province::class);
    }

    // Relación con el sector
    public function sector()
    {
        return $this->belongsTo(Sector::class);
    }
}
