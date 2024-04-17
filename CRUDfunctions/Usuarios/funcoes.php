<?php
// Função para listar usuários
function listarUsuarios($conn) {
    $sql = "SELECT * FROM usuario";
    $result = mysqli_query($conn, $sql);

    $usuarios = array();

    if ($result && mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $usuarios[] = $row;
        }
    }

    return $usuarios;
}

function inserirUsuarios($conn) {

    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $sql = "INSERT INTO `usuario`(`nome`, `email`, `senha`) VALUES ('$nome','$email', '$senha')";
    mysqli_query($conn, $sql);

}

function alterarUsuarios($conn){

    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $sql = "UPDATE `usuario` SET nome = '$nome', email = '$email', senha = '$senha' WHERE id = '$id'";
    mysqli_query($conn, $sql);

}

function excluirUsuarios($conn){

    $id = $_POST['id'];

    $sql = "DELETE FROM `usuario` WHERE id = '$id'";
    mysqli_query($conn, $sql);

}



?>
