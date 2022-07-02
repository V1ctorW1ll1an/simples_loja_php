<?php

require 'src/config.php';
include 'src/store.php';
$store =  new Store($mysql);

$clients = $store->getAllClients();

$status  = isset($_GET['status']) ? $_GET['status'] : null;
$message  = isset($_GET['message']) ? $_GET['message'] : null;
?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Loja</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <style>
    a {
      text-decoration: none;
    }
  </style>
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
              <a class="nav-link active" aria-current="page" href="index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="cadastrar_cliente.php">Clientes</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="cadastrar_venda.php">Vendas</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </div>
  <main class="container mt-5">
    <h1 class="mb-5">Clientes</h1>

    <?php if ($status) : ?>
      <div class="alert alert-<?php
                              if ($status === "ok")
                                echo "success";
                              ?>" role="alert">
        <?= $message ?>
      </div>
    <?php endif ?>

    <table class="table">
      <thead>
        <tr>
          <th scope="col">código</th>
          <th scope="col">Primeiro nome</th>
          <th scope="col">Segundo nome</th>
          <th scope="col">Data de Nascimento</th>
          <th scope="col">Cpf</th>
          <th scope="col">Rg</th>
          <th scope="col">Endereco</th>
          <th scope="col">Cep</th>
          <th scope="col">Cidade</th>
          <th scope="col">Fone</th>
          <th scope="col">Gerenciar</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($clients as $client) : ?>

          
          <tr>
            <th scope="row"> <?= $client["codigo"] ?> </th>
            <td> <?= $client["primeiroNome"] ?> </td>
            <td> <?= $client["segundoNome"] ?> </td>
            <td> <?= $client["dataNasci"] ?> </td>
            <td> <?= $client["cpf"] ?> </td>
            <td> <?= $client["rg"] ?> </td>
            <td> <?= $client["endereco"] ?> </td>
            <td> <?= $client["cep"] ?> </td>
            <td> <?= $client["cidade"] ?> </td>
            <td> <?= $client["fone"] ?> </td>
            <td>
              <a href="atualizar_cliente.php?client_id=<?= $client['codigo'] ?>">
                <i class="fa-solid fa-pen me-4 text-warning"></i>
              </a>
              <a href="deletar_cliente.php?client_id=<?= $client['codigo'] ?>">
                <i class="fa-solid fa-trash text-danger"></i>
              </a>
            </td>
          </tr>
        <?php endforeach ?>
      </tbody>
    </table>
  </main>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>

</html>


