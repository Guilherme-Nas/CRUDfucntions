<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuarios</title>
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

// Lista os usuários
$usuarios = listarUsuarios($conn);
?>

<table>
    <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Email</th>
        <th>Ações</th>
    </tr>
    <?php foreach ($usuarios as $usuario) : ?>
        <tr>
            <td><?= $usuario['id'] ?></td>
            <td><?= $usuario['nome'] ?></td>
            <td><?= $usuario['email'] ?></td>
            <td>
                <form id="botaoExcluir<?= $usuario['id'] ?>" action="deletear.php" method="post">
                    <input type="hidden" name="id" value="<?= $usuario['id'] ?>">
                    <a href="javascript:confirmDelete(<?= $usuario['id'] ?>);">Excluir</a>
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

// Fecha a conexão
mysqli_close($conn);

?>
<h4>Adicionar</h4>
<form action="inserir.php" method="post">
    <label for="nome">Nome:</label>
    <input type="text" name="nome" id="#">
    <label for="email">Email:</label>
    <input type="email" name="email" id="#">
    <label for="senha">Senha:</label>
    <input type="password" name="senha" id="#">
    <input type="submit" value="Enviar">
</form>
<br>
<h4>Atualizar</h4>
<form action="alterar.php" method="post">
    <label for="id">ID:</label>
    <input type="number" name="id" id="#">
    <label for="nome">Novo nome:</label>
    <input type="text" name="nome" id="#">
    <label for="email">Novo email:</label>
    <input type="email" name="email" id="#">
    <label for="senha">Nova senha:</label>
    <input type="password" name="senha" id="#">
    <input type="submit" value="Enviar">
</form>

<br>
<a href="../index.php">Voltar</a>

</html>
