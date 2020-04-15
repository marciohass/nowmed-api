<?php
/**
 *
 * Tabela de especializações
 *
 * description  varchar(255) NOT NULL
 * price        decimal(8,2) NOT NULL
 * order        varchar(4) NULL
 * cbo          varchar(6) NULL
 * cbo_desc     varchar(255) NULL
 *
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Specializations extends Model
{
    protected $fillable = [
        'description',
        'price',
        'order',
        'cbo',
        'cbo_desc'
    ];
}
