<?php
/**
 * Tabela Contacts - Tabela de contato dos usuários
 *
 * id           bigInt(20) auto_increment NOT NULL primary_key
 * email        varchar(255) NOT NULL
 * telephone1   varchar(14) NOT NULL gravar no formato - (11)99999-9999
 * telephone2   varchar(14) NULL gravar no formato - (11)9999-9999
 * user_id      bigInt(20) NOT NULL foreign_key com a tabela Users
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contacts extends Model
{
    protected $fillable = [
        'email',
        'telephone1',
        'telephone2',
        'user_id'
    ];

}
