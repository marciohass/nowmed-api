<?php
/**
 *
 * Tabela de Pacientes
 *
 * name         varchar(255) NOT NULL
 * gender       enum('M', 'F') NOT NULL
 * birthdate    date() NOT NULL
 * cpf          varchar(14) NULL
 * id_user      bigInt(20) NOT NULL foreign_key com a tabela users
 *
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Patients extends Model
{
    protected $fillable = [
        'name',
        'gender',
        'birthdate',
        'cpf',
        'user_id'
    ];
}
