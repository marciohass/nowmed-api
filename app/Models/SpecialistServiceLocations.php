<?php
/**
 *
 * Tabela para inserir o endereço de atendimento dos profissinais
 *
 * name                 varchar(255) NOT NULL
 * zip_code             varchar(9) NOT NULL
 * street               varchar(255) NOT NULL
 * number               varchar(6) NOT NULL
 * address_complement   varchar(50) NULL
 * district             varchar(100) NOT NULL
 * city                 varchar(100) NOT NULL
 * state                varchar(2) NOT NULL
 *
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SpecialistServiceLocations extends Model
{
    protected $fillable = [
        'name',
        'zip_code',
        'street',
        'number',
        'address_complement',
        'district',
        'city',
        'state'
    ];
}
