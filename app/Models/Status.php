<?php
/**
 *
 * Tabela para inserir os Status (Pago, Atendido, Agendado, Aguardando, etc...)
 *
 * description  varchar(50) NOT NULL
 *
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    protected $fillable = [
        'description'
    ];
}
