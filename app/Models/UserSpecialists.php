<?php
/**
 *
 * Tabela auxiliar para atrelar vários profissionais a um usuário
 * Por exemplo: Um Hospital que tem vários médicos
 *
 * id_user          bigInt(20) NOT NULL foreign_key
 * id_specialist    bigInt(20) NOT NULL foreign_key
 *
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserSpecialists extends Model
{
    protected $fillable = [
        'id_user',
        'id_specialist'
    ];
}
