<?php
/**
 *
 * Tabela auxiliar para atrelar várias especialidades de um terapeuta
 *
 * specialist_id    bigInt(20) NOT NULL foreign_key Specialists
 * therapy_id       bigInt(20) NOT NULL foreign_key Specialists
 *
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SpecialistTherapies extends Model
{
    protected $fillable = [
        'specialist_id',
        'therapy_id'
    ];
}
