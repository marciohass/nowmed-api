<?php
/**
 *
 * Tabela auxiliar para atrelar vários profissionais a um usuário
 * Por exemplo: Um Hospital que tem vários médicos
 *
 * user_id          bigInt(20) NOT NULL foreign_key
 * specialist_id    bigInt(20) NOT NULL foreign_key
 *
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserSpecialists extends Model
{
    protected $fillable = [
        'user_id',
        'specialist_id'
    ];
}
