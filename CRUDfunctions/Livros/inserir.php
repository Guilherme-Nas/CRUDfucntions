<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Meu Redirecionamento</title>
    <meta http-equiv="refresh" content="5; URL='https://www.homehost.com.br/'"/>
</head>
</html>
<?php

    include "../conexao.php"; // Arquivo de conexão com o banco de dados
    include "funcoes.php"; // Arquivo com as funções

    inserirLivros($conn);
    header("Location: listar.php");

?>