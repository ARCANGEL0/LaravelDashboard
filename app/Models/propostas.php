<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class propostas extends Model
{
    protected $fillable = ['Cliente','Endereço da obra','Valor total','Quantidade de Parcelas','Valor das parcelas','Data de início do pagamento','Dia das parcelas','Status'];
    
}
