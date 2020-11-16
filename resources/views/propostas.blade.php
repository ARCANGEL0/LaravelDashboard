@extends('adminlte::page')

@section('content')

<style>
    a{
        color: #fff;
    }

td .btn {
    font-size: 12px;
    margin-bottom: 10px;
    height: 25px;
    width: 84%;
}
    .selected {
        background: rgba(63, 191, 191, 0.2);
    }


#modalform label,#editarform label{
 margin-right: 12px;
 font-size: 20px;
 font-weight: 600;
}
#modalform select,#editarform select{
    border-radius: 0.4rem;
    background-color: #fff;
    border: 0.2px solid #cccccc;
    width: 100%;
    height: 2.1rem;
    margin-bottom: 1.2rem;

}
#modalform input,#editarform input {
    border-radius: 0.4rem;
    border: 0.2px solid #cccccc;
    width:100%;
    height: 2.1rem;
    margin-bottom: 1.2rem;

}
.input-group .form-control {
  border-radius: 0 !important;
}
.valinput {
  height: 15px;
}

.input-group-prepend{
  height: 33.5px;
}
.wrapper, body, html{
width: 1500px;
}
input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}
</style>

<h1 class="h3 mb-0 text-gray-800">Propostas</h1> &nbsp;&nbsp;&nbsp; <br>
<button type="button" class="btn btn-success"
data-toggle="modal" data-target="#myModal1"> <i class="fa fa-plus"></i> &nbsp; Criar</button>
<select class="btn btn-info" name="namefiltro" id="namefiltro"
onchange="document.location.href = '/propostas?cliente=' + this.value"
data-column="1">

  <option selected value=""> Todos os clientes</option>

  @foreach ($data as $proposta)
  <option value="{{ $proposta->Cliente }}">{{ $proposta->Cliente }}</option>
@endforeach
</select>
<select name="statusfiltro" id="statusfiltro" data-column="8" class="btn text-white btn-info">
  <option value="">Status</option>
  <option value="Ativo">Ativo</option>
  <option value="Inativo">Inativo</option>
</select>
<br><br>

<div id="myModal1" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">


        <div class="modal-content">
          <div class="modal-header">

            <h4 class="modal-title">Cadastar cliente</h4>
          </div>
          <div class="modal-body cadastroform">
          <form action="{{url('/propostas/cadastrar') }}"  id="modalform">
            {{csrf_field()}}

    <label for="cliente">Cliente</label>
    <select name="clientes" id="clientes">
    <option selected disabled hidden value="">&nbsp;&nbsp;&nbsp;&nbsp;Escolha um cliente</option>
   @foreach ($clientes as $clientevalue)
       <option value="{{ $clientevalue->{'Nome Fantasia'} }}">{{ $clientevalue->{'Nome Fantasia'} }}</option>
   @endforeach


</select>
    <br>


    <label for="endereco">Endereço da obra</label>
    <input onblur="Calcular()" type="text" id="endereco" name="endereco">
    <br>
    <label for="valortotal">Valor Total</label>

    <div class="input-group valinput mb-3 ">
    <div class="input-group-prepend">
      <span class="input-group-text" id="basic-addon3">R$</span>
    </div>

    <input class="form-control" id="valortotal" name="valortotal" type="number" step="0.01" placeholder="0,00">
    </div>

    <br>
    <div class="pricegroup">
    <label for="parcelas">Quantidade de parcelas</label>
<select onblur="Calcular()" name="parcelas" id="parcelas">
    <option selected hidden value="">Selecione uma opção</option>
    <option value="2">2x</option>
    <option value="4">4x</option>
    <option value="6">6x</option>
    <option value="8">8x</option>
<option value="12">12x</option>
<option value="24">24x</option>
<option value="36">36x</option>
<option value="48">48x</option>
<option value="60">60x</option>
<option value="72">72x</option>

</select>  </div>  <br>

    <label for="valor">Valor das parcelas</label>
    <div class="input-group valinput mb-3">
      <div class="input-group-prepend">
        <span class="input-group-text" id="basic-addon3">R$</span>
      </div>
    <input class="form-control" onblur="Calcular()" type="number" step="0.01" id="valor" name="valor" placeholder="0,00">

  </div>
    <br>
    <label for="paginicio">Data de início do pagamento</label>
    <input onblur="Calcular()" min="2018-10-10" type="date" id="paginicio" name="paginicio">
    <br>
    <label for="diaparcela">Dia de pagamento das parcelas</label>
    <input onblur="Calcular()"  type="number" name="diaparcela" min="1" max="30">

    <br>

    <br>




          </div>
          <div class="modal-footer">
          <button type="submit" name="cadastrar" class="btn btn-success cadastrar">Cadastrar</button>

            <button type="button" class="btn btn-dark" data-dismiss="modal">Fechar</button>
            </form>
          </div>
        </div>

      </div>
    </div>
    @if (session()->has('success'))
    <script>alert('Proposta cadastrada!')</script>
@endif
@if (session()->has('atualizadosuccess'))
<script>alert('Proposta atualizada!')</script>
@endif
@if (session()->has('deletesuccess'))
<script>alert('Proposta deletada!')</script>

@endif

@csrf

<br>
    <table class="table table-bordered display" id="tabela" width="100%" cellspacing="0">
      <form action="" id="myform">
    <thead>
     <tr>
       <th>ID</th>
<th>Cliente</th>
    <th>Endereço da obra</th>
    <th>Valor Total (R$)</th>
    <th>Qnt das parcelas</th>
<th>Valor Parcelas (R$)</th>
 <th>Início de pagamento</th>
    <th>Dia da mensalidade</th>
                           <th>Status</th>

<th>Criado em</th>
<th>Última atualização</th>
           <th>Ações</th>
</tr>
    </thead>

  <tbody>


        @foreach ($data as $item)
        <tr>
          <td>{{ $item->id}}</td>
            <td>{{$item->Cliente}}</td>
            <td>{{$item->{'Endereço da obra'} }}</td>
            <td>{{$item->{'Valor Total'} }}</td>
            <td>{{$item->{'Quantidade de parcelas'} }}</td>
            <td>{{$item->{'Valor das parcelas'} }}</td>
            <td>{{$item->{'Data de início do pagamento'} }}</td>
            <td>{{$item->{'Dia das parcelas'} }}</td>
            <td>{{$item->Status }}</td>
            <td>{{ $item->created_at }}</td>
            <td>{{ $item->updated_at }}</td>
          <td><a class="btn btn-outline-warning editbtn " href="#">Editar</a>

            <a class="btn btn-outline-danger deletebtn" href="#">Excluir</a>
          </td>

        </tr>
            @endforeach




  </tbody>
  </table>
  </form>
{{-- APAGAR --}}
<div id="deletar" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">


      <div class="modal-content">
        <div class="modal-header">

          <h4 class="modal-title">Deletar cliente</h4>
        </div>
        <div class="modal-body cadastroform">

        <form class="deleteform" action="/delete" method="POST" id="deleteform" >
          {{ csrf_field() }}

          {{ method_field('POST') }}


       <input type="hidden" value="" id="iddel" name="iddel">
       <select hidden name="clientesdel" id="clientesdel">
       <option selected disabled hidden value="">&nbsp;&nbsp;&nbsp;&nbsp;Escolha um cliente</option>
      @foreach ($clientes as $clientevalue)
          <option value="{{ $clientevalue->{'Nome Fantasia'} }}">{{ $clientevalue->{'Nome Fantasia'} }}</option>
      @endforeach


   </select>


       <input  type="hidden" id="enderecodel" name="enderecodel">


         <input onblur="CalcularEdit()" class="form-control" id="valortotaldel" name="valortotaldel" type="hidden" step="0.01" placeholder="R$ 0,00">


   <select hidden name="parcelasdel" id="parcelasdel">
       <option selected hidden value="">Selecione uma opção</option>
       <option value="2">2x</option>
       <option value="4">4x</option>
       <option value="6">6x</option>
       <option value="8">8x</option>
   <option value="12">12x</option>
   <option value="24">24x</option>
   <option value="36">36x</option>
   <option value="48">48x</option>
   <option value="60">60x</option>
   <option value="72">72x</option>

   </select>

<input class="form-control" onblur="CalcularEdit()" type="hidden" step="0.01" id="valordel" name="valordel" placeholder="R$ 0,00">


       <input onblur="CalcularEdit()" type="hidden" id="paginiciodel" name="paginiciodel">
       <input onblur="CalcularEdit()" type="hidden" id="diaparceladel" name="diaparceladel" max="30">



       <select hidden name="statusdel" id="statusdel">
       <option value="Ativo">Ativo</option>
       <option value="Inativo">Inativo</option></select>


  <h5>Você tem certeza que deseja deletar esta proposta?</h5>

        </div>
        <div class="modal-footer">
        <button type="submit" class="btn btn-danger apagar">Deletar</button>

          <button type="button" class="btn btn-dark" data-dismiss="modal">Fechar</button>
          </form>
        </div>
      </div>

    </div>
  </div>
{{-- fimAPAGAR --}}
  <div id="editar" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">


        <div class="modal-content">
          <div class="modal-header">

            <h4 class="modal-title">Editar proposta</h4>
          </div>
          <div class="modal-body cadastroform">

          <form class="editform" action="/propostas/editar" method="POST" id="editarform" >
            {{ csrf_field() }}

            <label for="clientes">Cliente</label>
            <select name="clientesedit" id="clientesedit">
            <option selected disabled hidden value="">&nbsp;&nbsp;&nbsp;&nbsp;Escolha um cliente</option>
           @foreach ($clientes as $clientevalue)
               <option value="{{ $clientevalue->{'Nome Fantasia'} }}">{{ $clientevalue->{'Nome Fantasia'} }}</option>
           @endforeach


        </select>
            <br>


            <label for="enderecoedit">Endereço da obra</label>
            <input  type="text" id="enderecoedit" name="enderecoedit">
            <br>


            <label for="valortotaledit">Valor Total</label>
            <div class="input-group mb-3 ">
              <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon3">R$</span>
              </div>

              <input onblur="CalcularEdit()" class="form-control" id="valortotaledit" name="valortotaledit" type="number" step="0.01" placeholder="R$ 0,00">
              </div>


            <br>
            <label for="parcelasedit">Quantidade de parcelas</label>
        <select name="parcelasedit" id="parcelasedit">
            <option selected hidden value="">Selecione uma opção</option>
            <option value="2">2x</option>
            <option value="4">4x</option>
            <option value="6">6x</option>
            <option value="8">8x</option>
        <option value="12">12x</option>
        <option value="24">24x</option>
        <option value="36">36x</option>
        <option value="48">48x</option>
        <option value="60">60x</option>
        <option value="72">72x</option>

        </select>    <br>
            <label for="valoredit">Valor das parcelas</label>
             <div class="input-group mb-3">
      <div class="input-group-prepend">
        <span class="input-group-text" id="basic-addon3">R$</span>
      </div>
    <input class="form-control" onblur="CalcularEdit()" type="number" step="0.01" id="valoredit" name="valoredit" placeholder="R$ 0,00">

  </div> <br>
            <label for="paginicioedit">Data de início do pagamento</label>
            <input onblur="CalcularEdit()" type="date" id="paginicioedit" name="paginicioedit">
            <br>
            <label for="diaparcelaedit">Dia de pagamento das parcelas</label>
            <input onblur="CalcularEdit()" type="number" id="diaparcelaedit" name="diaparcelaedit" max="30">


            <br>

            <label for="status">Status</label>
            <select name="statusedit" id="statusedit">
            <option value="Ativo">Ativo</option>
            <option value="Inativo">Inativo</option></select>

          </div>
          <div class="modal-footer">
          <button type="submit" class="btn btn-success atualizar">Atualizar</button>

            <button type="button" class="btn btn-dark" data-dismiss="modal">Fechar</button>
            </form>
          </div>
        </div>

      </div>
    </div>

@endsection

@section('js')

<script type="text/javascript">


$(document).ready(function (){

  var hoje = new Date();
var dd = String(hoje.getDate()).padStart(2, '0');
var mm = String(hoje.getMonth() + 1).padStart(2, '0'); //January is 0!
var yyyy = hoje.getFullYear();
var data= yyyy + '-' + mm + '-' + dd;
$('#paginicio').attr('min', data);


Calcular =  function() {
  document.getElementById('valortotal').value = 0.00;
  var valor = document.getElementById('valor').value;
  var parcela = document.getElementById('parcelas').value;

  document.getElementById('valortotal').value = valor*parcela;
}

CalcularEdit = function() {
  var valor = document.getElementById('valoredit').value;
  var parcela= document.getElementById('parcelasedit').value;

  document.getElementById('valortotaledit').value = valor*parcela;

}



 var table = $('#tabela').DataTable({

    "language": {
    "sEmptyTable": "Nenhum registro encontrado",
    "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
    "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
    "sInfoFiltered": "(Filtrados de _MAX_ registros)",
    "sInfoPostFix": "",
    "sInfoThousands": ".",
    "sLengthMenu": "_MENU_ resultados por página",
    "sLoadingRecords": "Carregando...",
    "sProcessing": "Processando...",
    "sZeroRecords": "Nenhum registro encontrado",
    "sSearch": "Pesquisar",
    "oPaginate": {
        "sNext": "Próximo",
        "sPrevious": "Anterior",
        "sFirst": "Primeiro",
        "sLast": "Último"
    },
    "oAria": {



        "sSortAscending": ": Ordenar colunas de forma ascendente",
        "sSortDescending": ": Ordenar colunas de forma descendente"
    } },


 });

 var parametroUrl = function parametroUrl(sParam) {
        var sPageURL = decodeURIComponent(window.location.search.substring(1)),
            sURLVar = sPageURL.split('&'),
            sParametNome,
            i;

        for (i = 0; i < sURLVar.length; i++) {
            sParametNome = sURLVar[i].split('=');

            if (sParametNome[0] === sParam) {
                return sParametNome[1] === undefined ? true : sParametNome[1];
            }
        }
    };

 var parametro = parametroUrl("cliente");
        table.search(parametro).draw();




$('#namefiltro').val(parametro);


 $('#statusfiltro').change(function(){
   table.column($( this).data('column') )
   .search( $(this).val() )
   .draw();
 });


table.on('click','.deletebtn', function(){
$('#deletar').modal('show');
$tr=$(this).closest('tr');

  var data = table.row($tr).data();
  data.pop();
  console.log(data);
  $('#iddel').val(data[0])
  $('#cnpj').val(data[1]);
  $('#razaosocial').val(data[2]);
  $('#nomefantasia').val(data[3]);
  $('#endereco').val(data[4]);
  $('#email').val(data[5]);
  $('#telefone').val(data[6]);
  $('#nomeresponsavel').val(data[7]);
  $('#cpf').val(data[8]);
  $('#celular').val(data[9]);

$('#deleteform').attr('action','propostas/deletar/'+data[0]);

});




// edit


 table.on('click','.editbtn',function(){


  $tr=$(this).closest('tr');

  var data = table.row($tr).data();
  data.pop();

  console.log(data);
  $('#clientesedit').val(data[1])
  $('#enderecoedit').val(data[2]);
  $('#valortotaledit').val(data[3]);
  $('#parcelasedit').val(data[4]);
  $('#valoredit').val(data[5]);
  $('#paginicioedit').val(data[6]);
  $('#diaparcelaedit').val(data[7]);
  $('#statusedit').val(data[8]);




$('#editarform').attr('action','propostas/editar/'+data[0]);
$('#editar').modal('show');


});


 });

</script>

@endsection
