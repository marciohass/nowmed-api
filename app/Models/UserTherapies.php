<?php
/**
 *
 * Tabela auxiliar para atrelar várias Terapias a um profissional
 * Por exemplo: Um Terapeuta tem várias especialidades
 *
 * user_id      bigInt(20) NOT NULL foreign_key
 * therapy_id   bigInt(20) NOT NULL foreign_key
 *
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserTherapies extends Model
{
    protected $fillable = [
        'user_id',
        'therapy_id',
    ];
}
