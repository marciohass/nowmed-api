<?php
/**
 *
 * Tabela auxiliar para inserir várias especializações para um profissional
 *
 * specialist_id        bigInt(20) NOT NULL foreign_key Specialists
 * specialization_id    bigInt(20) NOT NULL foreign_key Specializations
 *
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SpecializationSpecialists extends Model
{
    protected $fillable = [
        'specialist_id',
        'specialization_id'
    ];
}
