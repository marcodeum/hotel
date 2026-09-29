<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro do Cliente</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <h1 class="titulo_principal" style="color: blue; border-image: linear-gradient(to right, blue, red, yellow) 1">
        Hotel<span style="color: red;">Sys</span><span style="color: yellow;">tem</span>
    </h1>
    <br>

    <h2 class="titulo_secundario">Cadastro do Cliente</h2>
    <?php

    require_once 'conexao.php';

    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['tel'];
    $senha = $_POST['senha'];

    $sql = "INSERT INTO clientes (nome, email, telefone, senha)
VALUES ('$nome', '$email', '$telefone', '$senha')";

    if (mysqli_query($conexao, $sql)) {
        echo "
    <div class='form'>
        <h2 class='titulo_secundario' style='text-align: center; margin-bottom: 25px;'>
            <span style='color: blue;'>Cadastro do</span>
            <span style='color: red;'>cliente realizado</span>
            <span style='color: yellow;'>com sucesso!</span>
        </h2>
        
        <p style='color: #cbd5e1; font-size: 18px;'>
            <span class='label'>✔️ Nome:</span> $nome<br><br>
            <span class='label'>✔️ Email:</span> $email<br><br>
            <span class='label'>✔️ Telefone:</span> $telefone
        </p>
    </div>";
    } else {
        echo "
    <div class='form' style='text-align: center;'>
        <h2 class='titulo_secundario' style='color: #ff2222; text-decoration: none;'>Error 404</h2>
    </div>";
    }

    ?>

</body>

</html>