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
}
