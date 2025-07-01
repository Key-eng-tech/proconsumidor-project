<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Provider extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'id_number',
        'email',
        'phone_number',
        'address',
        'business_sector',
        'website',
        'contact_name',
        'contact_email',
        'contact_phone_number',
        'contact_position',
    ];

    public function branches()
    {
        return $this->hasMany(Branch::class);
    }
}
