
    <?php

    include "../conexao.php"; // Arquivo de conexão com o banco de dados
    include "funcoes.php"; // Arquivo com as funções

    alterarAutor($conn);
    header("Location: listar.php");

    ?>