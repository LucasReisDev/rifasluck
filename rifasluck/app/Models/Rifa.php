<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rifa extends Model
{
    protected $fillable = [
        'titulo',
        'descricao',
        'cotas_disponiveis',
        'image',
        // Adicione outros campos conforme necessário
    ];

    public function user(){
        return $this->belongsTo('App\Models\User');
    }
}
