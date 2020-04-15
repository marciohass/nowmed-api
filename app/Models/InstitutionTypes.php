<?php
/**
 *
 * Tabela de tipos de Organizações (Hospital, Clinica, Laboratório)
 *
 * description  varchar(255) NOT NULL
 *
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InstitutionTypes extends Model
{
    protected $fillable = [
        'description'
    ];
}
