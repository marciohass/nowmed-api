<?php
/**
 *
 * Tabela de terminologias - tabela de TUSS
 *
 * tuss_code            varchar(11) NOT NULL
 * tuss                 varchar(255) NOT NULL
 * id_specialization    bigInt(20) NOT NULL foreign_key specializations
 *
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Terminologies extends Model
{
    protected $fillable = [
        'tuss_code',
        'tuss',
        'id_specialization'
    ];
}
