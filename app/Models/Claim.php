<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Claim extends Model
{
    use HasFactory;

    protected $fillable = [
        'employee_profile_id',
        'entry_way_id',
        'motive_id',
        'product_type_id',
        'claim_status_id',
        'creator_profile_id',
        'consumer_id',
        'provider_id',
        'contract_number',
        'phone_number',
        'claim_id_external',
        'description',
    ];

    // Relación con el perfil del empleado que maneja el reclamo
    public function employeeProfile()
    {
        return $this->belongsTo(Profile::class, 'employee_profile_id');
    }

    // Relación con la vía de entrada
    public function entryWay()
    {
        return $this->belongsTo(EntryWay::class);
    }

    // Relación con el motivo del reclamo
    public function motive()
    {
        return $this->belongsTo(Motive::class);
    }

    // Relación con el tipo de producto
    public function productType()
    {
        return $this->belongsTo(ProductType::class);
    }

    // Relación con el estado del reclamo
    public function claimStatus()
    {
        return $this->belongsTo(ClaimStatus::class);
    }

    // Relación con el perfil del creador del reclamo
    public function creatorProfile()
    {
        return $this->belongsTo(Profile::class, 'creator_profile_id');
    }

    // Relación con el consumidor afectado
    public function consumer()
    {
        return $this->belongsTo(Consumer::class);
    }

    // Relación con el proveedor involucrado
    public function provider()
    {
        return $this->belongsTo(Provider::class);
    }
}
