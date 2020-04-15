<?php
/**
 * Tabela de exames
 *
 * description  varchar(255) NOT NULL
 * exam_code    varchar(11) NOT NULL
 * price        decimal(8,2) NULL
 *
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Exams extends Model
{
    protected $fillable = [
        'description',
        'exam_code',
        'price'
    ];
}
