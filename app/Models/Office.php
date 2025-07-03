<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Office extends Model
{
    use HasFactory;

    protected $fillable = [
        'province_id',
        'address',
        'email',
        'phone_number',
    ];

    public function province()
    {
        return $this->belongsTo(Province::class);
    }
}
