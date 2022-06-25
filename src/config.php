<?php

$host = "localhost";
$user = "root";
$pass = "";
$db = "Loja";
$port = 80;

$mysql = new mysqli("db", "root", "root", "Loja", 3306);

$mysql->set_charset("utf8");

$notConnected = !$mysql;

if ($notConnected) {
    echo "Erro: banco não conectado!";
}
