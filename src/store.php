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
    
    public function addClient(string $primeiroNome, string $segundoNome, string $dataNasci, string $cpf, string $rg, string $endereco, string $cep, string $cidade, string $fone)
    {
        $add = $this->mysql>prepare("INSERT INTO client (primeiroNome, segundoNome, dataNasci, cpf, rg, endereco, cep, cidade, fone)
        VALUES (?,?,?,?,?,?,?,?,?)");

        $add->bind_param('sssssssss', $primeiroNome, $segundoNome, $dataNasci, $cpf, $rg, $endereco, $cep, $cidade, $fone);
        
        $add->execute();
    }  
    
    function redirect(string $pagina): void
    {
        header("Location: $pagina");
        die();
    }

}
