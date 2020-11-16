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
#modalform input,#editarform input {
    border-radius: 0.4rem;
    border: 0.2px solid #cccccc;
    width: 100%;
    height: 2.1rem;
    margin-bottom: 1.2rem;

}
html{
width: 150vw;;
}
.showbtn{

margin-right: 20px;
}
</style>
<script>
  function formatar(mascara, documento){
    var i = documento.value.length;
    var saida = mascara.substring(0,1);
    var texto = mascara.substring(i)

    if (texto.substring(0,1) != saida){
              documento.value += texto.substring(0,1);
    }

  }
  </script>
<h1 class="h3 mb-0 text-gray-800">Clientes</h1> &nbsp;&nbsp;&nbsp; <br>
<button type="button" class="btn btn-success"
data-toggle="modal" data-target="#myModal1"> <i class="fa fa-plus"></i> &nbsp; Criar</button>


<br><br>

<div id="myModal1" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">


        <div class="modal-content">
          <div class="modal-header">

            <h4 class="modal-title">Cadastar cliente</h4>
          </div>
          <div class="modal-body cadastroform">
          <form action="{{url('/clientes/cadastrar') }}" id="modalform">
            {{csrf_field()}}

    <label for="cnpj">CNPJ</label>
    <input  maxlength="18" OnKeyPress="formatar('##.###.##/####-##', this)"type="text" id="cnpj" name="cnpj" >
    <br>
    <label for="razaosocial">Razão Social</label>
    <input  type="text" name="razaosocial">
    <br>
    <label for="nomefantasia">Nome Fantasia</label>
    <input  type="text" name="nomefantasia">
    <br>
    <label for="endereco">Endereço</label>
    <input  type="text" name="endereco">
    <br>
    <label for="email">Email</label>
    <input  type="email" name="email">
    <br>
    <label for="telefone">Telefone</label>
    <input  maxlength="12" OnKeyPress="formatar('## ####-####', this)"type="text" name="telefone">
    <br>
    <label for="nomeresponsavel">Nome do Responsável</label>
    <input  type="text" name="nomeresponsavel">
    <br>
    <label for="cpf">CPF</label>
    <input maxlength="14" OnKeyPress="formatar('###.###.###-##', this)" type="text" id="cpf" name="cpf">
    <br>
    <label for="celular">Celular</label>
    <input maxlength="13" OnKeyPress="formatar('## ####-#####', this)" type="text" name="celular">
    <br>




          </div>
          <div class="modal-footer">
          <button type="submit" name="cadastrar" class="btn btn-success">Cadastrar</button>

            <button type="button" class="btn btn-dark" data-dismiss="modal">Fechar</button>
            </form>
          </div>
        </div>

      </div>
    </div>
    @if (session()->has('success'))
    <script>alert('Usuário cadastrado!')</script>
@endif
@if (session()->has('atualizadosuccess'))
<script>alert('Usuário atualizado!')</script>
@endif
@if (session()->has('deletesuccess'))
<script>alert('Usuário deletado!')</script>

@endif

@csrf
    <table class="table table-bordered display" id="tabela" width="100%" cellspacing="0">
      <form action="" id="myform">
    <thead>
     <tr>
       <th>ID</th>
<th>CPNJ</th>
    <th>Razão Social</th>
    <th>Nome Fantasia</th>
    <th>Endereço</th>
<th>Email</th>    <th>Telefone</th>
    <th>Nome do Responsável</th>
                           <th>CPF</th>

<th>Celular</th>
<th>Criado em</th>
<th>Última atualização</th>
           <th>Ações</th>
</tr>
    </thead>

  <tbody>


        @foreach ($data as $item)
        <tr>
          <td>{{ $item->id}}</td>
            <td>{{$item->CNPJ}}</td>
            <td>{{$item->{'Razão Social'} }}</td>
            <td>{{$item->{'Nome Fantasia'} }}</td>
            <td>{{$item->Endereço}}</td>
            <td>{{$item->Email}}</td>
            <td>{{$item->Telefone}}</td>
            <td>{{$item->{'Nome do Responsável'} }}</td>
            <td>{{$item->CPF}}</td>
            <td>{{$item->Celular}}</td>
            <td>{{ $item->created_at }}</td>
            <td>{{ $item->updated_at }}</td>
          <td><a class="btn btn-outline-warning editbtn " href="#">Editar</a>
            <a class="btn btn-outline-info showbtn" href="#">Propostas</a>
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

        <form class="deleteform" action="/clientes/deletar" method="POST" id="deleteform" >
          {{ csrf_field() }}

          {{ method_field('POST') }}


       <input type="hidden" value="" id="iddel" name="iddel">
       <input id="cnpjdelete" value="" type="hidden" name="cnpjdelete">

       <input id="razaosocialdelete" type="hidden" name="razaosocialdelete">

       <input id="nomefantasiadelete" type="hidden" name="nomefantasiadelete">

       <input id="enderecodelete" type="hidden" name="enderecodelete">

       <input id="emaildelete" type="hidden" name="emaildelete">

       <input id="telefonedelete" type="hidden" name="telefonedelete">

       <input id="nomeresponsaveldelete" type="hidden" name="nomeresponsaveldelete">

       <input id="cpfdelete" type="hidden" name="cpfdelete">

       <input id="celulardelete" type="hidden" name="celulardelete">

  <h5>Você tem certeza que deseja deletar este cliente?</h5>

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

            <h4 class="modal-title">Editar cliente</h4>
          </div>
          <div class="modal-body cadastroform">

          <form class="editform" action="/clientes/editar" method="POST" id="editarform" >
            {{ csrf_field() }}



         <input type="hidden" value="" id="id" name="id">

    <label for="cnpj">CNPJ</label>
    <input  maxlength="18" OnKeyPress="formatar('##.###.##/####-##', this)"type="text" id="cnpjedit" name="cnpjedit" >
    <br>
    <label for="razaosocial">Razão Social</label>
    <input id="razaosocialedit" type="text" name="razaosocialedit">
    <br>
    <label for="nomefantasiaedit">Nome Fantasia</label>
    <input id="nomefantasiaedit" type="text" name="nomefantasiaedit">
    <br>
    <label for="enderecoedit">Endereço</label>
    <input id="enderecoedit" type="text" name="enderecoedit">
    <br>
    <label for="email">Email</label>
    <input id="emailedit" type="email" name="emailedit">
    <br>
    <label for="telefone">Telefone</label>
    <input  maxlength="12" OnKeyPress="formatar('## ####-####', this)"type="text" id="telefoneedit" name="telefoneedit" >
    <br>
    <label for="nomeresponsavel">Nome do Responsável</label>
    <input type="text" id="nomeresponsaveledit" name="nomeresponsaveledit">
    <br>
    <label for="cpfedit">CPF</label>
    <input maxlength="14" OnKeyPress="formatar('###.###.###-##', this)" type="text" id="cpfedit" name="cpfedit">
    <br>
    <label for="celular">Celular</label>
    <input maxlength="13" OnKeyPress="formatar('## ####-#####', this)" type="text" id="celularedit" name="celularedit">
    <br>




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

$(document).ready(function() {

  var searchHash = location.hash.substr(1),
        searchString = searchHash.substr(searchHash.indexOf('search='))
		                  .split('&')[0]
		                  .split('=')[1];

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

$('#deleteform').attr('action','clientes/deletar/'+data[0]);

});

table.on('click', '.showbtn', function(){
  $tr=$(this).closest('tr');

  var cliente = table.row($tr).data()[3];

 window.location.href = '/propostas?cliente=' + cliente;


})
 table.on('click','.editbtn',function(){


  $tr=$(this).closest('tr');

  var data = table.row($tr).data();
  data.pop();

  console.log(data);
  $('#id').val(data[0])
  $('#cnpjedit').val(data[1]);
  $('#razaosocialedit').val(data[2]);
  $('#nomefantasiaedit').val(data[3]);
  $('#enderecoedit').val(data[4]);
  $('#emailedit').val(data[5]);
  $('#telefoneedit').val(data[6]);
  $('#nomeresponsaveledit').val(data[7]);
  $('#cpfedit').val(data[8]);
  $('#celularedit').val(data[9]);


$('#editarform').attr('action','clientes/editar/'+data[0]);
$('#editar').modal('show');
});


});

</script>

@endsection
