<?php

// $host = "localhost";
// $user = "root";
// $pass = "";
// $db = "Loja";
// $port = 80;

$mysql = new mysqli('localhost','root','','Loja');

// $mysql = new mysqli($host, $user, $pass, $db, $port);

$mysql->set_charset("utf8");

$notConnected = !$mysql;

if ($notConnected) {
    echo "Erro: banco não conectado!";
}
