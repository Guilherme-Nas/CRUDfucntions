<?php
// Função para listar usuários
function listarLivros($conn) {
    $sql = "SELECT * FROM livros";
    $result = mysqli_query($conn, $sql);

    $livros = array();

    if ($result && mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $livros[] = $row;
        }
    }

    return $livros;
}

function inserirLivros($conn) {

    $titulo = $_POST['titulo'];
    $ano = $_POST['ano_publicacao'];
    $autor = $_POST['autor_id'];

    $sql = "INSERT INTO `livros`(`titulo`, `ano_publicacao`, `autor_id`) VALUES ('$titulo','$ano', '$autor')";
    mysqli_query($conn, $sql);

}

function alterarLivros($conn){

    $id = $_POST['id'];
    $titulo = $_POST['titulo'];
    $ano = $_POST['ano_publicacao'];
    $autor = $_POST['autor_id'];

    $sql = "UPDATE `livros` SET titulo = '$titulo', ano_publicacao = '$ano', autor_id = '$autor' WHERE id = '$id'";
    mysqli_query($conn, $sql);

}

function excluirLivros($conn){

    $id = $_POST['id'];

    $sql = "DELETE FROM `livros` WHERE id = '$id'";
    mysqli_query($conn, $sql);

}



?>
