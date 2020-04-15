<?php
/**
 *
 * Tabela para inserir os vouchers do paciente
 * O voucher é um crédito que o paciente tem, que ele pode usar quando quiser
 *
 * code                 varchar(11) NOT NULL
 * price                decimal(8,2) NOT NULL
 * registration_date    date() NOT NULL
 * date_use             date() NULL
 * id_patient           bigInt(20) NOT NULL foreign_key patients
 * id_status            bigInt(20) NOT NULL foreign_key status
 *
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vouchers extends Model
{
    protected $fillable = [
        'code',
        'price',
        'registration_date',
        'date_use',
        'id_patient',
        'id_status'
    ];
}
