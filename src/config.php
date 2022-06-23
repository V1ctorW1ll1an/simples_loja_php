<?php

$mysql = new mysqli("localhost", "root", "", "Loja");

$mysql->set_charset("utf8");

$notConnected = !$mysql;

if ($notConnected) {
    echo "Erro: banco não conectado!";
}
