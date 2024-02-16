<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transacao extends Model
{
    use HasFactory;

    protected $table = 'transacoes';
    protected $fillable = [
        'rifa_id',
        'quantidade_cotas',
        'nome_completo',
        'email',
        'telefone',
    ];

    // Relacionamento com a Rifa
    public function rifa()
    {
        return $this->belongsTo(Rifa::class);
    }

}
