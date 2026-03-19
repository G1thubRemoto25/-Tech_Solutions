<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contract extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'contracts';

    protected $fillable = [
        'collaborator_id',
        'contract_type',
        'start_date',
        'end_date',
        'position',
        'salary',
        'status'
    ];

    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
        'salary' => 'decimal:2'
    ];

    public function collaborator()
    {
        return $this->belongsTo(Collaborator::class);
    }
        public function extensions()
    {
        return $this->hasMany(ContractExtension::class);
    }

    /**
     * Verificar si el contrato está activo
     */
    public function isActive()
    {
        return $this->status === 'Activo';
    }

    /**
     * Verificar si el contrato puede tener prórrogas
     */
    public function canBeExtended()
    {
        return $this->isActive() && in_array($this->contract_type, ['Fijo', 'Prestación de Servicios']);
    }
}