<?php

require 'src/config.php';
include 'src/store.php';
$store =  new Store($mysql);
$clients = $store->getAllClients();
$response = [];

function formatCurrency($currency): float
{
    return (float)str_replace(",", ".", str_replace("R$ ", "", $currency));
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $saleId = $_POST['codigo'];
    $valor_parcial = formatCurrency($_POST['valor_parcial']);
    $valor_desconto = formatCurrency($_POST['valor_desconto']);
    $valor_acrescimo = formatCurrency($_POST['valor_acrescimo']);
    $cliente_id = $_POST['cliente'];

    $response = $store->updateSale($saleId, $cliente_id, $valor_parcial, $valor_desconto, $valor_acrescimo);

    if ($response["status"] === "ok") {
        $status = $response['status'];
        $message = $response['message'];
        header("location: /vendas.php?status=$status&message=$message");
        die();
    }
} else {
    $saleId = $_GET['saleId'];
    $sales = $store->getSaleById($saleId);
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Atualizar vendas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <?php require('nav.php') ?>

    </div>
    <main class="container mt-5">
        <section class="title">
            <h1 class="mb-5">Atualizar vendas</h1>
            <?php if (count($response) > 0) : ?>
                <div class="alert alert-<?php
                                        if ($response["status"] === "error")
                                            echo "danger";
                                        ?>" role="alert">
                    <?= $response["message"] ?>
                </div>
            <?php endif ?>
            <form method="POST">
                <input type="hidden" name="codigo" value="<?= $saleId ?>">
                <div class="mb-3">
                    <label for="valor_parcial" class="form-label">Valor parcial</label>
                    <input value="R$ <?= $sales['valorParcial'] ?>" id="valor_parcial" value="<?= $_POST["valor_parcial"] ?>" name="valor_parcial" class="form-control" type="text" placeholder="Insira o valor em R$">
                </div>
                <div class="mb-3">
                    <label for="valor_desconto" class="form-label">Valor desconto</label>
                    <input value="R$ <?= $sales['valorDesconto'] ?>" id="valor_desconto" value="<?= $_POST["valor_desconto"] ?>" name="valor_desconto" class="form-control" type="text" placeholder="Insira o valor em R$">
                </div>
                <div class="mb-3">
                    <label for="valor_acrescimo" class="form-label">Valor de acrescimo</label>
                    <input value="R$ <?= $sales['valorAcrescimo'] ?>" id="valor_acrescimo" value="<?= $_POST["valor_acrescimo"] ?>" name="valor_acrescimo" class="form-control" type="text" placeholder="Insira o valor em R$">
                </div>
                <div class="mb-3">
                    <label for="cliente" class="form-label">Selecione um cliente</label>
                    <select id="cliente" name="cliente" class="form-select">
                        <?php foreach ($clients as $client) : ?>
                            <option <?php if ($_POST["cliente"] === $client["codigo"]) echo "selected" ?> value="<?= $client["codigo"] ?>"><?= $client["primeiroNome"] ?> <?= $client["segundoNome"] ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
                <fieldset disabled>
                    <div class="mb-3">
                        <label for="valor_total" class="form-label">Valor total</label>
                        <input id="valor_total" class="form-control" type="text" value="R$ <?= $sales['valorTotal'] ?>" placeholder="R$">
                    </div>
                </fieldset>
                <button type="submit" class="btn btn-primary">Enviar</button>
            </form>

        </section>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/imask"></script>
    <script src="/src/js/store.js"></script>
</body>

</html>