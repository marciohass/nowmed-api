<?php
/**
 *
 * Tabela da agenda dos pacientes
 *
 * type             enum('EXAME', 'CONSULTA', 'TERAPIA') NOT NULL
 * date_hour        dateTime() NOT NULL
 * id_status        bigInt(20) NOT NULL foreign_key Status
 * id_specialist    bigInt(20) NOT NULL foreign_key Specialist
 * id_patient       bigInt(20) NOT NULL foreign_key Patient
 *
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PatientSchedules extends Model
{
    protected $fillable = [
        'type',
        'date_hour',
        'id_status',
        'id_specialist',
        'id_patient'
    ];
}
