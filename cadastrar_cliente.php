<?php


  require 'src/config.php'
  include 'src/store.php'  
  

  if ($_SERVER['REQUEST_METHOD']==='POST') {
    $primeiroNome = $_POST['primeiroNome'];
    $segundoNome = $_POST['segundoNome'];
    $dataNasci = $_POST['dataNasci'];
    $cpf = $_POST['cpf'];
    $rg = $_POST['rg'];
    $endereco = $_POST['endereco'];
    $cep = $_POST['cep'];
    $cidade = $_POST['cidade'];
    $fone = $_POST['fone'];
    
    $store = new Store ($mysql);
    $store->addClient($primeiroNome,$segundoNome,$dataNasci,$cpf, $rg, $endereco, $cep, $cidade, $fone);

    redireciona('index.php');
} 
  
 


  ?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Cadastrar cliente</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>
<body>
  <div class="container">
    <nav class="navbar navbar-expand-lg">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">Loja</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="/index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/cadastrar_cliente.php">Clientes</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/cadastrar_venda.php">Vendas</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </div>
  <main class="container mt-5">

    <h1>cadastrar clientes</h1>

    <div class="col-md-6">
    <label for="validationCustom03" class="form-label">Primeiro Nome</label>
    <input type="text" class="form-control" id="validationCustom03" required>
    <div class="invalid-feedback">
      Por favor informe o primeiro nome
    </div>
  </div>

  <div class="col-md-6">
    <label for="validationCustom03" class="form-label">Segundo Nome</label>
    <input type="text" class="form-control" id="validationCustom03" required>
    <div class="invalid-feedback">
      Por favor informe o segundo nome
    </div>
  </div>
  <div class="col-md-6">
    <label for="validationCustom03" class="form-label">Data de Nascimento</label>
    <input type="text" class="form-control" id="validationCustom03" required>
    <div class="invalid-feedback">
      Por favor informe a data de nascimento 
    </div>
  </div>

  <div class="col-md-6">
    <label for="validationCustom03" class="form-label">Cpf</label>
    <input type="text" class="form-control" id="validationCustom03" required>
    <div class="invalid-feedback">
      Por favor informe o cpf
    </div>
  </div>

  <div class="col-md-6">
    <label for="validationCustom03" class="form-label">RG</label>
    <input type="text" class="form-control" id="validationCustom03" required>
    <div class="invalid-feedback">
      Por favor informe o RG 
    </div>
  </div>
  
  <div class="col-md-6">
    <label for="validationCustom03" class="form-label">Endereço</label>
    <input type="text" class="form-control" id="validationCustom03" required>
    <div class="invalid-feedback">
      Por favor informe o endereço
    </div>
  </div>
 
  <div class="col-md-6">
    <label for="validationCustom03" class="form-label">Cidade</label>
    <input type="text" class="form-control" id="validationCustom03" required>
    <div class="invalid-feedback">
      Por favor informe a cidade 
    </div>
  </div>
  <div class="col-md-3">
   
  <div class="col-md-3">
    <label for="validationCustom05" class="form-label">Cep</label>
    <input type="text" class="form-control" id="validationCustom05" required>
    <div class="invalid-feedback">
      Por favor informe o cep
    </div>
  </div>

  <br>
  <div class="col-12">
    <button class="btn btn-primary" type="submit">Enviar</button>
  </div>
</form>


  </main>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>
</html>
