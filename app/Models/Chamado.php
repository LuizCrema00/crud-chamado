<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Chamado extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo',
        'categoria_id',
        'situacao_id',
        'descricao',
        'prazo',
        'data_criacao',
        'data_prazo'
    ];
    

    public function categoria() {
        return $this->belongsTo(Categoria::class, 'categoria_id');
    }
    
    public function situacao() {
        return $this->belongsTo(Situacao::class, 'situacao_id');
    }
    

    
}

