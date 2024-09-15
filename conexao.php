<?php

$host = "localhost";
$db = "carboalimentos";
$user = "root";
$pass = "";

$mysqli = new mysqli($host, $user, $pass, $db);

if ($mysqli->connect_error) {
    die("Conexão falhou");
}