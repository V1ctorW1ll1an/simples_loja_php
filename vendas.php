<?php
require 'src/config.php';
include 'src/store.php';
$store =  new Store($mysql);

$sales = $store->getAllSales();
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Vendas</title>
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
                            <a class="nav-link active" aria-current="page" href="/index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/cadastrar_cliente.php">Clientes</a>
                        </li>
                        <li class="nav-item">
                            <div class="dropdown">
                                <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                    Vendas
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                    <li><a class="dropdown-item" href="/cadastrar_venda.php">cadastro</a></li>
                                    <li><a class="dropdown-item" href="/vendas.php">todas as vendas</a></li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

    </div>
    <main class="container">
        <h1 class="mb-5">Vendas</h1>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">código</th>
                    <th scope="col">Valor parcial</th>
                    <th scope="col">Valor desconto</th>
                    <th scope="col">Valor acrescimo</th>
                    <th scope="col">Valor total</th>
                    <th scope="col">Data</th>
                    <th>Gerenciar</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($sales as $sale) : ?>
                    <tr>
                        <th scope="row"> <?= $sale["codigo"] ?> </th>
                        <td> <?= $sale["valorParcial"] ?> </td>
                        <td> <?= $sale["valorDesconto"] ?> </td>
                        <td> <?= $sale["valorAcrescimo"] ?> </td>
                        <td> <?= $sale["valorTotal"] ?> </td>
                        <td> <?= $sale["data"] ?> </td>
                        <td>
                            <a href="">
                                <i class="fa-solid fa-pen me-4 text-warning"></i>
                            </a>
                            <a href="">
                                <i class="fa-solid fa-trash text-danger"></i>
                            </a>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/imask"></script>
    <script src="/src/js/store.js"></script>
</body>

</html>