<?php

include "../conexao.php"; // Arquivo de conexão com o banco de dados
include "funcoes.php"; // Arquivo com as funções

excluirLivros($conn);
header("Location: listar.php");

?>