<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'office_id',
        'department_id',
        'municipio_id',
        'first_name',
        'last_name',
        'id_number',
        'email',
        'phone_number',
        'employee_position',
        'supervisor_profile_id',
    ];

    // Relación con usuario
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relación con oficina
    public function office()
    {
        return $this->belongsTo(Office::class);
    }

    // Relación con departamento
    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    // Relación con municipio
    public function municipio()
    {
        return $this->belongsTo(Municipio::class);
    }

    // 👤 Supervisor (autorreferencia)
    public function supervisor()
    {
        return $this->belongsTo(Profile::class, 'supervisor_profile_id');
    }

    // 👥 Subordinados (autorreferencia inversa)
    public function subordinates()
    {
        return $this->hasMany(Profile::class, 'supervisor_profile_id');
    }
}
