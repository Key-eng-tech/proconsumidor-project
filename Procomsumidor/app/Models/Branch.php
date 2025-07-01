<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Branch extends Model
{
    use HasFactory;

    protected $fillable = [
        'provider_id',
        'contact_name',
        'contact_phone_number',
        'contact_position',
        'email',
    ];

    public function provider()
    {
        return $this->belongsTo(Provider::class);
    }
}
