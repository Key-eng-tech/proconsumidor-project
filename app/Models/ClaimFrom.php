<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ClaimFrom extends Model
{
    use HasFactory;

    protected $table = 'claims_from';

    protected $fillable = [
        'claim_id',
        'creator_profile_id',
        'role',
    ];

    public function claim()
    {
        return $this->belongsTo(Claim::class);
    }

    public function creatorProfile()
    {
        return $this->belongsTo(Profile::class, 'creator_profile_id');
    }
}
