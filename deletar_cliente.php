<?php

require 'src/config.php';
include 'src/store.php';

$store = new Store($mysql);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $clientId = $_POST['codigo'];
    $sales = $store->getSaleByClient($clientId);
    if (count($sales) > 0) {
        $status = 'error';
        $message = 'Não é possível apagar um cliente vinculado a uma venda, por favor, apague a venda vinculada antes de apagar o cliente!';
        header("location:/index.php?status=$status&message=$message");
        die();
    }
    $store->deleteClient($clientId);
    $store->redirect('index.php');
} else {
    $clientId = $_GET['client_id'];
    $client = $store->getClientById($clientId);
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Deletar cliente</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <?php require('nav.php') ?>
    </div>
    <main class="container mt-5">

        <h1>Deletar cliente: <?= $client['primeiroNome'] . ' ' . $client['segundoNome'] ?></h1>
        <section class="mt-5">
            <h3>Você deseja realmente excluir este cliente?</h3>
            <form action="deletar_cliente.php" method="POST">
                <input type="hidden" name="codigo" value="<?= $clientId; ?>" />
                <input class="mt-5 btn btn-danger" type="submit" value="Excluir cliente">
            </form>
        </section>
    </main>
</body>

</html>