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
        <?php require('nav.php') ?>
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
                            <a href="editar_venda.php?saleId=<?= $sale['codigo'] ?>">
                                <i class="fa-solid fa-pen me-4 text-warning"></i>
                            </a>
                            <a href="deletar_venda.php?saleId=<?= $sale['codigo'] ?>">
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