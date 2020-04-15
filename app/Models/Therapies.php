<?php
/**
 *
 * Tabela para inserir a lista de terapias
 *
 * description varchar(255) NOT NULL
 *
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Therapies extends Model
{
    protected $fillable = [
        'description'
    ];
}
