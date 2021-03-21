<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

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

    public function getFotoUrl()
    {
        return Storage::url('fotos/' . $this->foto_path);
    }

    public function getPrimeiroNome()
    {
        return Str::of($this->nome)->split('/[\s]+/')->first();
    }
}
