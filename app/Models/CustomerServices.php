<?php
/**
 * Tabela dos atendimentos que o especialista executou
 *
 * type             enum()['EXAME', 'CONSULTA', 'TERAPIA'] NOT NULL
 * date             date() NOT NULL
 * id_status        bigInt(20) NOT NULL forign_key com a tabela Status
 * price            decimal(8,2) NOT NULL
 * id_patient       bigInt(20) NOT NULL foreign_key com a tabela Patients
 * id_specialist    bigInt(20) NOT NULL foreign_key com a tabela Specialists
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CustomerServices extends Model
{
    protected $fillable = [
        'type',
        'date',
        'id_status',
        'price',
        'id_patient',
        'id_specialist'
    ];
}
