<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\propostas;
use Yajra\Datatables\Datatables;
class PropostasDBController extends Controller
{
    

    public function cadastrar(Request $req)
    {
      
        
        $proposta = new Propostas;
        $proposta->Cliente=$req->clientes;
        $proposta->{'Endereço da obra'}=$req->endereco;
        $proposta->{'Valor Total'}=$req->valortotal;
        $proposta->{'Quantidade de parcelas'}=$req->parcelas;
        $proposta->{'Valor das parcelas'}=$req->valor;
        $proposta->{'Data de início do pagamento'}=$req->paginicio;
        $proposta->{'Dia das parcelas'}=$req->diaparcela;
        $proposta->Status='Ativo';
        $proposta->save();
        return redirect()->back()->with('success','Proposta salva!');
    }



public function editar(Request $req, $id){

   

    $proposta = propostas::find($id);
    $proposta->Cliente=$req->clientesedit;
    $proposta->{'Endereço da obra'}=$req->enderecoedit;
    $proposta->{'Valor Total'}=$req->valortotaledit;
    $proposta->{'Quantidade de parcelas'}=$req->parcelasedit;
    $proposta->{'Valor das parcelas'}=$req->valoredit;
    $proposta->{'Data de início do pagamento'}=$req->paginicioedit;
    $proposta->{'Dia das parcelas'}=$req->diaparcelaedit;
    $proposta->Status=$req->statusedit;
    $proposta->save();
    
     return redirect()->back()->with('atualizadosuccess','Proposta atualizada!');
    


}
public function deletar(Request $req, $id){

    $proposta = propostas::find($id);
    $proposta->Cliente=$req->clientesdel;
    $proposta->{'Endereço da obra'}=$req->enderecodel;
    $proposta->{'Valor Total'}=$req->valortotaldel;
    $proposta->{'Quantidade de parcelas'}=$req->parcelasdel;
    $proposta->{'Valor das parcelas'}=$req->valordel;
    $proposta->{'Data de início do pagamento'}=$req->paginiciodel;
    $proposta->{'Dia das parcelas'}=$req->diaparceladel;
    $proposta->Status=$req->statusdel;
    $proposta->delete();


    return redirect()->back()->with('deletesuccess','Proposta deletada !');
    
}

}
