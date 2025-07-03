<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Sector extends Model
{
    use HasFactory;

    protected $fillable = ['municipio_id', 'name'];

    public function municipio()
    {
        return $this->belongsTo(Municipio::class);
    }
}
