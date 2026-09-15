<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Hotel</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<?php

require 'conexao.php';

$nome = $_POST['nome'];
$cidade = $_POST['cidade'];
$estrela = $_POST['estrela'];

$sql = "INSERT INTO hoteis (nome, cidade, estrelas)
VALUES('$nome', '$cidade', $estrela);";

if(mysqli_query($conexao,$sql)){
    echo "
    <div class='form'>
        <h2 class='titulo_secundario' style='text-align: center; margin-bottom: 25px;'>
            <span style='color: #0055ff;'>Cadastro do</span>
            <span style='color: #ff2222;'>hotel realizado</span>
            <span style='color: #ffcc00;'>com sucesso!</span>
        </h2>
        
        <p style='color: #cbd5e1; font-size: 18px;'>
            <span class='label'>✔️ Nome:</span> $nome<br><br>
            <span class='label'>✔️ Cidade:</span> $cidade<br><br>
            <span class='label'>✔️ Estrelas:</span> $estrela
        </p>
    </div>";
}else{
    echo "
    <div class='form' style='text-align: center;'>
        <h2 class='titulo_secundario' style='color: #ff2222; text-decoration: none;'>Error 404</h2>
    </div>";
}

?>

</body>
</html>