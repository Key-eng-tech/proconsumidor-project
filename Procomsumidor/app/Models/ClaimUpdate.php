<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ClaimUpdate extends Model
{
    use HasFactory;

    protected $fillable = [
        'claim_id',
        'employee_profile_id',
        'description',
    ];

    public function claim()
    {
        return $this->belongsTo(Claim::class);
    }

    public function employeeProfile()
    {
        return $this->belongsTo(Profile::class, 'employee_profile_id');
    }
}
