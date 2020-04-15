<?php
/**
 *
 * Tabela dos Pedidos dos pacientes
 *
 * type             enum('EXAME', 'CONSULTA', 'TERAPIA') NOT NULL
 * date             date() NOT NULL
 * price            decimal(8,2) NOT NULL
 * id_patient       bigInt(20) NOT NULL foreign_key Patients
 * id_exam          bigInt(20) NOT NULL foreign_key Exams
 * id_specialist    bigInt(20) NOT NULL foreign_key Specialists
 * id_status        bigInt(20) NOT NULL foreign_key Status
 *
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PatientRequests extends Model
{
    protected $fillable = [
        'type',
        'date',
        'price',
        'id_patient',
        'id_exam',
        'id_especialist',
        'id_status'
    ];
}
