<?php

require 'src/config.php';
include 'src/store.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $saleId = $_POST['codigo'];
    $store = new Store($mysql);
    $store->deleteSale($saleId);
    $store->redirect('vendas.php');
} else {
    $saleId = $_GET['saleId'];
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Deletar venda</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <?php require('nav.php') ?>
    </div>
    <main class="container mt-5">

        <h1>Deletar Venda</h1>
        <section class="mt-5">
            <h3>Você deseja realmente excluir a venda?</h3>
            <form action="deletar_venda.php" method="POST">
                <input type="hidden" name="codigo" value="<?= $saleId; ?>" />
                <input class="mt-5 btn btn-danger" type="submit" value="Excluir venda">
            </form>
        </section>

    </main>

</body>

</html>