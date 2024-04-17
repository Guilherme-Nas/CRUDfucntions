<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Livros</title>
</head>
<style>
    body {
    background-color: #282828;
    color: #FFFFFF;
    font-family: Arial, sans-serif;
}

table {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 20px;
}

th, td {
    border: 1px solid #444444;
    padding: 10px;
    text-align: left;
}

th {
    background-color: #444444;
    color: #FFFFFF;
}

tr:nth-child(even) {
    background-color: #3c3c3c;
}

tr:hover {
    background-color: #666666;
}

form {
    display: flex;
    flex-direction: column;
    margin-bottom: 20px;
}

label {
    margin-bottom: 5px;
}

input[type="text"], input[type="email"], input[type="password"], input[type="number"] {
    margin-bottom: 10px;
    padding: 5px;
}

input[type="submit"] {
    background-color: #444444;
    color: #FFFFFF;
    padding: 5px 10px;
    cursor: pointer;
}

input[type="submit"]:hover {
    background-color: #666666;
}

a {
    color: #FFFFFF;
    display: inline-block;
    padding: 10px 20px;
    margin: 5px;
    border: 1px solid #FFFFFF;
    border-radius: 5px;
    text-decoration: none;
    transition: background-color 0.3s ease;
}

a:hover {
    color: #BBBBBB;
    background-color: #666666;
}

</style>
<?php

// alterar a pagina inicial para ter uma tela inicio para selecionar visualização, listar, incluir, alterar, excluir utilizando bootstrap 

include "../conexao.php"; // Arquivo de conexão com o banco de dados
include "funcoes.php"; // Arquivo com as funções

// Conecta ao banco de dados

$livros = listarLivros($conn);
?>
<table>
    <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Ano de Publicação</th>
        <th>ID do Autor</th>
        <th>Ações</th>
    </tr>
    <?php foreach ($livros as $livro) : ?>
        <tr>
            <td><?= $livro['id'] ?></td>
            <td><?= $livro['titulo'] ?></td>
            <td><?= $livro['ano_publicacao'] ?></td>
            <td><?= $livro['autor_id'] ?></td>
            <td>
                <form id="botaoExcluir<?= $livro['id'] ?>" action="deletear.php" method="post">
                    <input type="hidden" name="id" value="<?= $livro['id'] ?>">
                    <a href="javascript:confirmDelete(<?= $livro['id'] ?>);">Excluir</a>
                </form>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

<script>
    function confirmDelete(id) {
        if (confirm("Tem certeza de que deseja excluir o livro com ID " + id + "?")) {
            document.getElementById('botaoExcluir' + id).submit();
        }
    }
</script>


<?PHP

mysqli_close($conn);

?>

<br>

<h4>Adicionar</h4>
<form action="inserir.php" method="post">
    <label for="titulo">Título:</label>
    <input type="text" name="titulo" id="#">
    <label for="ano_publicacao">Ano Publicação:</label>
    <input type="text" name="autor_id" id="#">
    <label for="autor_id">Autor ID:</label>
    <input type="number" name="autor_id" id="#">
    <input type="submit" value="Enviar">
</form>
<br>
<h4>Atualizar</h4>
<form action="alterar.php" method="post">
    <label for="id">ID:</label>
    <input type="number" name="id" id="#">
    <label for="titulo">Novo título:</label>
    <input type="text" name="titulo" id="#">
    <label for="ano_publicacao">Novo ano Publicação:</label>
    <input type="number" name="ano_publicacao" id="#">
    <label for="autor_id">Novo ID do autor:</label>
    <input type="number" name="autor_id" id="#">
    <input type="submit" value="Enviar">
</form>

<br>
<a href="../index.php">Voltar</a>

</html>
