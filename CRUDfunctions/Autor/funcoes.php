<?php
// Função para listar usuários
function listarAutor($conn) {
    $sql = "SELECT * FROM autor";
    $result = mysqli_query($conn, $sql);

    $autor = array();

    if ($result && mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $autor[] = $row;
        }
    }

    return $autor;
}

function inserirAutor($conn) {

    $nome = $_POST['nome'];
    $nacio = $_POST['nacionalidade'];

    $sql = "INSERT INTO `autor`(`nome`, `nacionalidade`) VALUES ('$nome','$nacio')";
    mysqli_query($conn, $sql);

}

function alterarAutor($conn){

    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $nacio = $_POST['nacionalidade'];

    $sql = "UPDATE `autor` SET nome = '$nome', nacionalidade = '$nacio' WHERE id = '$id'";
    mysqli_query($conn, $sql);

}

function excluirAutor($conn){

    $id = $_POST['id'];

    $sql = "DELETE FROM `autor` WHERE id = '$id'";
    mysqli_query($conn, $sql);

}

?>
