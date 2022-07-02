<?php


require 'src/config.php';
include 'src/store.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $primeiroNome = $_POST['primeiroNome'];
  $segundoNome = $_POST['segundoNome'];
  $dataNasci = $_POST['dataNasc'];
  $cpf = $_POST['cpf'];
  $rg = $_POST['rg'];
  $endereco = $_POST['endereco'];
  $cep = $_POST['cep'];
  $cidade = $_POST['cidade'];
  $fone = $_POST['telefone'];

  $store = new Store($mysql);
  $store->addClient($primeiroNome, $segundoNome, $dataNasci, $cpf, $rg, $endereco, $cep, $cidade, $fone);

  $store->redirect('index.php');
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
    <?php require('nav.php') ?>
  </div>
  <main class="container mt-5">

    <h1>Cadastrar clientes</h1>
    <form method="POST" action="cadastrar_cliente.php">

      <div class="col-md-6">
        <label for="primeiroNome" class="form-label">Primeiro Nome</label>
        <input type="text" class="form-control" id="primeiroNome" name="primeiroNome" required>
        <div class="invalid-feedback">
          Por favor informe o primeiro nome
        </div>
      </div>

      <div class="col-md-6">
        <label for="segundoNome" class="form-label">Segundo Nome</label>
        <input type="text" class="form-control" id="segundoNome" name="segundoNome" required>
        <div class="invalid-feedback">
          Por favor informe o segundo nome
        </div>
      </div>
      <div class="col-md-6">
        <label for="dataNasci" class="form-label">Data de Nascimento</label>
        <input type="text" class="form-control" id="dataNasci" name="dataNasc" required>
        <div class="invalid-feedback">
          Por favor informe a data de nascimento
        </div>
      </div>

      <div class="col-md-6">
        <label for="cpf" class="form-label">Cpf</label>
        <input type="text" class="form-control" id="cpf" name="cpf" required>
        <div class="invalid-feedback">
          Por favor informe o cpf
        </div>
      </div>

      <div class="col-md-6">
        <label for="rg" class="form-label">RG</label>
        <input type="text" class="form-control" id="rg" name="rg" required>
        <div class="invalid-feedback">
          Por favor informe o RG
        </div>
      </div>

      <div class="col-md-6">
        <label for="endereco" class="form-label">Endereço</label>
        <input type="text" class="form-control" id="endereco" name="endereco" required>
        <div class="invalid-feedback">
          Por favor informe o endereço
        </div>
      </div>

      <div class="col-md-6">
        <label for="cidade" class="form-label">Cidade</label>
        <input type="text" class="form-control" id="cidade" name="cidade" required>
        <div class="invalid-feedback">
          Por favor informe a cidade
        </div>
      </div>

      <div class="col-md-6">
        <label for="cep" class="form-label">Cep</label>
        <input type="text" class="form-control" id="cep" name="cep" required>
        <div class="invalid-feedback">
          Por favor informe o cep
        </div>
      </div>

      <div class="col-md-6">
        <label for="telefone" class="form-label">telefone</label>
        <input type="text" class="form-control" id="telefone" name="telefone" required>
        <div class="invalid-feedback">
          Por favor informe o telefone
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