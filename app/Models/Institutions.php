<?php
/**
 *
 * Tabela de Organizações pode ser um Hospital, Laboratório, Clínica
 *
 * fancy_name           var_char(255) NOT NULL
 * company_name         var_char(255) NOT_NULL
 * cnpj                 var_char(18) NOT_NULL
 * id_user              bigInt(20) NOT NULL foreign_key com a tabela users
 * id_institution_type  bigInt(20) NOT NULL foreign_key com a tabela institution_types
 *
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Institutions extends Model
{
    protected $fillable = [
        'fancy_name',
        'company_name',
        'cnpj',
        'id_user',
        'id_institution_type'
    ];
}
