<?php
/**
 *
 * Tabela auxiliar para atrelar vários colaboradores a uma Organização
 *
 * id_specialist    bigInt(20) NOT NULL foreign_key com a tabela specialists
 * id_institution   gibInt(20) NOT NULL foreign_key com a tabela institution
 *
 */

 namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InstitutionSpecialists extends Model
{
    protected $fillable = [
        'id_specialist',
        'id_institution'
    ];
}
