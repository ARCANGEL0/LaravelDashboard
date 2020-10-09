<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\clientes;
use Yajra\Datatables\Datatables;
class DBController extends Controller
{
  
  

    public function index(Request $req)
    {
      
        
        $client = new Clientes;
        $client->CNPJ=$req->cnpj;
        $client->{'Razão Social'}=$req->razaosocial;
        $client->{'Nome Fantasia'}=$req->nomefantasia;
        $client->Endereço=$req->endereco;
        $client->Email=$req->email;
        $client->Telefone=$req->telefone;
        $client->{'Nome do Responsável'}=$req->nomeresponsavel;
        $client->CPF=$req->cpf;
        $client->Celular=$req->celular;
        $client->save();
        return redirect()->back()->with('success','Cliente cadastrado!');
    }



public function editar(Request $req, $id){

   
    // $cnpj=$request->input('cnpj');
    // $razaosocial=$request->input('razaosocial');
    // $nomefantasia=$request->input('nomefantasia');
    // $endereco=$request->input('endereco');
    // $email=$request->input('email');
    // $telefone=$request->input('telefone');
    // $nomeresponsavel=$request->input('nomeresponsavel');
    // $cpf=$request->input('cpf');
    // $celular=$request->input('celular');
    // DB::table('clientes')->where('id',$id)->update(array(
    //     'CNPJ'=>$cnpj,
    //     'Razão Social'=>$razaosocial,
    //     'Nome Fantasia'=>$nomefantasia,
    //     'Endereço'=>$endereco,
    //     'Email'=>$email,
    //     'Telefone'=>$telefone,
    //     'Nome do Responsável'=>$nomeresponsavel,
    //     'CPF'=>$cpf,
    //     'Celular'=>$celular
     
    // ));
    $client = clientes::find($id);
    $client->CNPJ=$req->cnpjedit;
    $client->{'Razão Social'}=$req->razaosocialedit;
    $client->{'Nome Fantasia'}=$req->nomefantasiaedit;
    $client->Endereço=$req->enderecoedit;
    $client->Email=$req->emailedit;
    $client->Telefone=$req->telefoneedit;
    $client->{'Nome do Responsável'}=$req->nomeresponsaveledit;
    $client->CPF=$req->cpfedit;
    $client->Celular=$req->celularedit;
    $client->save();
    
     return redirect()->back()->with('atualizadosuccess','Cliente atualizado!');
    


}
public function deletar(Request $req, $id){

    $client = clientes::find($id);
    $client->CNPJ=$req->cnpjdelete;
    $client->{'Razão Social'}=$req->razaosocialdelete;
    $client->{'Nome Fantasia'}=$req->nomefantasiadelete;
    $client->Endereço=$req->enderecodelete;
    $client->Email=$req->emaildelete;
    $client->Telefone=$req->telefonedelete;
    $client->{'Nome do Responsável'}=$req->nomeresponsaveldelete;
    $client->CPF=$req->cpfdelete;
    $client->Celular=$req->celulardelete;
    $client->delete();


    return redirect()->back()->with('deletesuccess','Cliente deletado!!');
    
}
}
