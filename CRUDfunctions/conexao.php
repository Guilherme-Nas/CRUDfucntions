<?php

// Configurações de conexão com o banco de dados
$servername = "localhost";
$username = "root";
$password = "";
$database = "biblioteca";

// Conexão com o banco de dados
$conn = mysqli_connect($servername, $username, $password, $database);

// Verifica se a conexão foi bem sucedida
if (!$conn) {
    die("Erro de conexão: " . mysqli_connect_error());
}

?>
