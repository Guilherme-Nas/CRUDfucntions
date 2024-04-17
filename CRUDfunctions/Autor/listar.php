<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Autores</title>
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

$autores = listarAutor($conn);
?>
<table>
    <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Nacionalidade</th>
        <th>Ações</th>
    </tr>
    <?php foreach ($autores as $autor) : ?>
        <tr>
            <td><?= $autor['id'] ?></td>
            <td><?= $autor['nome'] ?></td>
            <td><?= $autor['nacionalidade'] ?></td>
            <td>
            <?php
                $autor_id = $autor['id'];
                $livros_associados = mysqli_query($conn, "SELECT * FROM livros WHERE autor_id = $autor_id");

                if (mysqli_num_rows($livros_associados) > 0) {
                    echo '<span style="color: red;">Não é possível excluir. Primeiro Exclua os livros deste autor!</span>';
                } else {
                    echo '<form id="botaoExcluir' . $autor['id'] . '" action="deletear.php" method="post">';
                    echo '<input type="hidden" name="id" value="' . $autor['id'] . '">';
                    echo '<a href="javascript:confirmDelete(' . $autor['id'] . ');">Excluir</a>';
                    echo '</form>';
                }
                ?>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

<script>
    function confirmDelete(id) {
        if (confirm("Tem certeza de que deseja excluir o autor com ID " + id + "?\n***Lembre-se, para excluir um autor é necessário excluir todos os livros do mesmo autor***")) {
            document.getElementById('botaoExcluir' + id).submit();
        }
    }
</script>

<h6>***Lembre-se, para excluir um autor é necessário excluir todos os livros do mesmo, e então, a opção de Excluir ficara adisponivel.***</h6>

<?PHP

mysqli_close($conn);

?>

<br>
<h4>Adicionar</h4>
<form action="inserir.php" method="post">
    <label for="nome">Nome:</label>
    <input type="text" name="nome" id="#">
    <label for="nacionalidade">Nacionalidade:</label>
    <input type="text" name="nacionalidade" id="#">
    <input type="submit" value="Enviar">
</form>
<br>
<h4>Atualizar</h4>
<form action="alterar.php" method="post">
    <label for="id">ID:</label>
    <input type="number" name="id" id="#">
    <label for="nome">Novo nome:</label>
    <input type="text" name="nome" id="#">
    <label for="nacionalidade">Nova nacionalidade:</label>
    <input type="text" name="nacionalidade" id="#">
    <input type="submit" value="Enviar">
</form>

<br>
<a href="../index.php">Voltar</a>

</html>
