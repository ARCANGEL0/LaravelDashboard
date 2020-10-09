<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class clientes extends Model
{
    protected $fillable = ['cnpj','razaosocial','nomefantasia','endereco','email','telefone','nomeresponsavel','cpf','celular'];
    

}
