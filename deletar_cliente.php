<?php
    ini_set('display_errors',1);
    error_reporting(E_ALL);


    require 'src/config.php';
    include 'src/store.php';
    
    

    if ($_SERVER['REQUEST_METHOD']==='POST') {
        $clientId = $_POST['client_id'];
        $store = new Store($mysql);
        $store->deleteClient($clientId);        
        $store->redirect('index.php');

    }  
    else 
    {
        $clientId = $_GET['client_id'];
        
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

        <h1>Deletar cliente</h1>
        <section class="container mt-5">
        <h1>Você deseja realmente excluir o cliente?</h1>
        <form action="deletar_cliente.php" method="POST">
            <input type="hidden" name="codigo" value="<?= $clientId; ?>" />
            <input class="mt-5 button is-danger" type="submit" value="Excluir cliente">
        </form>
    </section>

    </main>
    
</body>

</html>