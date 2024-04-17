
// ----------------------------------------------------------------
// Guilherme Nascimento & Rafael Lacerda
// ----------------------------------------------------------------

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <style>
    
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #333;
            color: #fff;
            background-image: url('livrosfundo.jpg');
            background-size: cover;
            background-repeat: no-repeat;
        }

        .container {
            max-width: 800px;
            margin: 50px auto;
            background-color: rgba(20, 20, 20, 0.9);
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
        }

        h1 {
            margin-top: 0;
            color: #fff;
        }

        .link-listar {
            display: block;
            padding: 10px;
            border: 1px solid #FFFFFF;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            text-align: center;
            margin-top: 20px;
        }

        .link-listar:hover {
            background-color: #666666;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Biblioteca</h1>
        <p>Escolha uma opção:</p>
        <a href="Usuarios/listar.php" class="link-listar">Listar Usuário</a>
        <a href="Livros/listar.php" class="link-listar">Listar Livros</a>
        <a href="Autor/listar.php" class="link-listar">Listar Autores</a>
    </div>
</body>
</html>
