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
 * email varchar(255) NOT NULL
 * telephone1 varchar(11) NOT NULL
 * telephone2 varchar(11) NULL
 * id_specialization bigInt(20) NOT NULL foreign_key Specializations
 * id_therapy bigInt(20) NOT NULL foreign_key Therapies
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
        'cnh',
        'email',
        'telephone1',
        'telephone2',
        'id_specialization',
        'id_therapy'
    ];
}
