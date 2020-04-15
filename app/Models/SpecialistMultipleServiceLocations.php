<?php
/**
 *
 * Tabela auxiliar para inserir vários locais de atendimento de um profissional
 * Por exemplo: Um médico atende em dois consultórios de endereços diferentes
 *
 * id_sslocation bigInt(20) NOT NULL foreign_key specialist_service_locations
 * id_specialist bigInt(20) NOT NULL foreign_key specialists
 *
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SpecialistMultipleServiceLocations extends Model
{
    protected $fillable = [
        'id_sslocation',
        'id_specialist'
    ];
}
