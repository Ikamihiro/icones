<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Icone extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'nacionalidade',
        'data_nascimento',
        'local_nascimento',
        'data_falecimento',
        'local_falecimento',
        'contribuicao',
        'foto_path',
    ];

    protected $casts = [
        'data_nascimento' => 'datetime',
        'data_falecimento' => 'datetime',
    ];
}
