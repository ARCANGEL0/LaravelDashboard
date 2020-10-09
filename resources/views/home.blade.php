@extends('adminlte::page')

@section('content')

<div class="row">
  <div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-aqua">
      <div class="inner">
        <h3>24</h3>

        <p>Solicitações de negociação</p>
      </div>
      <div class="icon">
        <i class="fa fa-handshake"></i>
      </div>
    </div>
  </div>
  <!-- ./col -->
  <div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-green">
      <div class="inner">
       <h3>{{ $data->count() }}</h3>

        <p>Propostas realizadas</p>
      </div>
      <div class="icon">
        <i class="fa fa-chart-bar"></i>
      </div>
    </div>
  </div>
  <!-- ./col -->
  <div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-yellow">
      <div class="inner text-white">
        <h3> {{ $clientes->count() }}</h3>

        <p>Clientes registrados</p>
      </div>
      <div class="icon">
        <i class="fa fa-user"></i>
      </div>
    </div>
  </div>
  <!-- ./col -->
  <div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-red">
      <div class="inner">
        <h3>7</h3>

        <p>Contratos Pendentes </p>
      </div>
      <div class="icon">
        <i class="fa fa-briefcase"></i>
      </div>
    </div>
  </div>

  <!-- ./col -->
</div>
<div class="col-lg-10 mx-auto ">


  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  
    <div class="carousel-inner">
      <div class="carousel-item active">
       <br><br><br><br>
       <center> <h1>Este é um projeto simples utilizando <br> o Laravel para controle 
        e manipulação de <br> elementos em um banco de dados utilizando modelo CRUD</h1></center>
    
      </div>
      <div class="carousel-item">
       <br><br><br><br>
       <center> <h1>É uma simulação de um sistema de gerenciamento <br> 
        de uma empresa de contabilidade, onde é possivel controlar clientes e suas propostas</h1></center>
    
     </div>
      <div class="carousel-item">
       <br><br><br><br>
       <center> <h1> 
      Os clientes e as propostas são manipulados no banco de <br> dados da empresa 
      utilizando o Eloquent, e criando modelos para ambos, e respeitando o modelo CRUD de desenvolvimento.
        
      </h1></center>      </div>
      <div class="carousel-item">
        <br><br><br><br>
        <center> <h1>
          No modelo das propostas é usado uma chave <br> estrangeira, 
          para poder referenciar o cliente daquela proposta.
          Além disso, <br> os formulários contam com um cálculo automático 
          do valor total da proposta baseado no valor e a quantidade das parcelas
          desta proposta
        
        
        </h1></center>
     
      </div>
      <div class="carousel-item">
        <br><br><br><br>
        <center> <h1>
        Para utilizar este painel, você deve editar o arquivo <br> <a style="color: red">.env </a>na raiz do projeto e 
        colocar as suas informações <br> para conexão do banco de dados e configurações SMTP para
        e-mail.  
        
        
        </h1></center>
     
      </div> <div class="carousel-item">
        <br><br><br><br>
        <center> <h1>
        Após inserir os dados para conectar ao seu banco de dados, <br>
        execute o comando <a style="color:red;">php artisan migrate </a> para criação das tabelas e modelos, <br>
        e em seguida, <a style="color: red;">php artisan serve</a> para rodar o servidor local.  
        
        </h1></center>
     
      </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
      <span style="background-color: black;" class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span style="background-color: black;" class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
      <span style="background-color: black;" class="carousel-control-next-icon" aria-hidden="true"></span>
      <span style="background-color: black;" class="sr-only">Next</span>
    </a>
  </div>
</div>
@endsection