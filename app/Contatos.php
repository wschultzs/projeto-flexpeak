<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contatos extends Model
{
    protected $fillable = [
        'primeiro_nome', 'sobrenome', 'foto', 'telefone', 'email', 'descricao'
    ];
}