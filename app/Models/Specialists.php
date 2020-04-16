<?php
/**
 *
 * Tabela de profissionais (médicos, terapeutas...)
 *
 * name varchar(255) NOT NULL
 * birthdate date() NOT NULL
 * cpf varchar(14) NOT NULL
 * crm varchar(14) NOT NULL
 * cnh varchar(11) NULL
 *
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Specialists extends Model
{
    protected $fillable = [
        'name',
        'birthdate',
        'cpf',
        'crm',
        'cnh'
    ];
}
