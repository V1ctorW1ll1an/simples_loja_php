<?php
class Store
{

    private $mysql;

    public function __construct(mysqli $mysql)
    {
        $this->mysql = $mysql;
    }

    public function getAllClients(): array
    {
        $getClients = 'SELECT * FROM client';

        $query = $this->mysql->query($getClients);

        $clients = $query->fetch_all(MYSQLI_ASSOC);
        return $clients;
    }

    public function getAllSales(): array
    {
        $getSales = 'SELECT * FROM vendas';

        $query = $this->mysql->query($getSales);

        $sales = $query->fetch_all(MYSQLI_ASSOC);

        return $sales;
    }

    public function addSale($codigoCliente, $valorParcial, $valorDesconto, $valorAcrescimo): array
    {
        try {
            $valorTotal = $valorParcial - $valorDesconto + $valorAcrescimo;
            if (!$codigoCliente || !$valorParcial || !$valorDesconto || !$valorAcrescimo) {
                return ["message" => "Preencha os campos corretamente", "status" => "error"];
            }
            $add = $this->mysql->prepare("INSERT INTO vendas (codigoCliente, valorParcial, valorDesconto, valorAcrescimo,valorTotal, data) VALUES (?,?,?,?,?, NOW())");

            $add->bind_param('idddd', $codigoCliente, $valorParcial, $valorDesconto, $valorAcrescimo, $valorTotal);
            $add->execute();

            return ["message" => "Venda cadastrada com sucesso!", "status" => "ok"];
        } catch (Exception $e) {
            echo 'Caught exception: ',  $e->getMessage(), "<br>";
        }
    }

    public function addClient(
        string $primeiroNome,
        string $segundoNome,
        string $dataNasci,
        string $cpf,
        string $rg,
        string $endereco,
        string $cep,
        string $cidade,
        string $fone
    ) {
        $addClient = $this->mysql->prepare("INSERT INTO 
        client (primeiroNome, segundoNome, dataNasci, cpf, rg, endereco, cep, cidade, fone)
        VALUES (?,?,?,?,?,?,?,?,?)");

        $addClient->bind_param('sssssssss', $primeiroNome, $segundoNome, $dataNasci, $cpf, $rg, $endereco, $cep, $cidade, $fone);

        $addClient->execute();
    }

    public function updateClient(
        string $primeiroNome,
        string $segundoNome,
        string $dataNasci,
        string $cpf,
        string $rg,
        string $endereco,
        string $cep,
        string $cidade,
        string $fone
    ) {
        $clientupdate =  $this->mysql->prepare("UPDATE client SET primeiroNome=?, segundoNome=?, dataNasci=?, cpf=?, rg=?, endereco=?, cep=?, cidade=?, fone=? WHERE codigo=? ");

        $clientupdate->bind_param('ssssssssss', $primeiroNome, $segundoNome, $dataNasci, $cpf, $rg, $endereco, $cep, $cidade, $fone, $codigo);

        $clientupdate->execute();
    }

    public function deleteClient(string $codigo): void
    {
        $del = $this->mysql->prepare("DELETE FROM 
                    client WHERE id=?");
        $del->bind_param('s', $id);
        $del->execute();
    }

    function redirect(string $pagina): void
    {
        header("Location: $pagina");
        die();
    }
}
