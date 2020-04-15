<?php
/**
 *
 * Tabela para auxiliar para inserir várias especializações para um profissional
 *
 * id_specialist        bigInt(20) NOT NULL foreign_key Specialists
 * id_specialization    bigInt(20) NOT NULL foreign_key Specializations
 *
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SpecializationSpecialists extends Model
{
    protected $fillable = [
        'id_specialist',
        'id_specialization'
    ];
}
