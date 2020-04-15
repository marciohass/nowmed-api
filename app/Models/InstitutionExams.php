<?php
/**
 *
 * Tabela Auxiliar para atrelar vários exames a uma Organização
 *
 * id_institution   bigInt(20) NOT NULL foreign_key com a tabela institutions
 * id_exam          bigInt(20) NOT NULL foreign_key com a tabela exams
 *
 */
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InstitutionExams extends Model
{
    protected $fillable = [
        'id_institution',
        'id_exam'
    ];
}
