<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro do Quarto</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<h1 class="titulo_principal" style="color: blue; border-image: linear-gradient(to right, blue, red, yellow) 1">
        Hotel<span style="color: red;">Sys</span><span style="color: yellow;">tem</span>
    </h1>
    <br>
    
    <h2 class="titulo_secundario">Cadastro do Quarto</h2>
<?php

require_once 'conexao.php';

$idHotel = $_POST['idHotel'];
$numQuarto = $_POST['numQuarto'];
$tipoQuarto = $_POST['tipoQuarto'];
$preco = $_POST['preco'];

$sql = "INSERT INTO quartos (hotel_id, numero, tipo, preco_diaria) 
VALUES ($idHotel, $numQuarto, '$tipoQuarto', $preco)";

if(mysqli_query($conexao, $sql)){
    echo "
    <div class='form'>
        <h2 class='titulo_secundario' style='text-align: center; margin-bottom: 25px;'>
            <span style='color: #0055ff;'>Cadastro do</span>
            <span style='color: #ff2222;'>quarto realizado</span>
            <span style='color: #ffcc00;'>com sucesso!</span>
        </h2>
        
        <p style='color: #cbd5e1; font-size: 18px;'>
            <span class='label'>✔️ ID do Hotel:</span> $idHotel<br><br>
            <span class='label'>✔️ Número do Quarto:</span> $numQuarto<br><br>
            <span class='label'>✔️ Tipo de Quarto:</span> $tipoQuarto<br><br>
            <span class='label'>✔️ Preço da Diária:</span> R$ $preco<br><br>
        </p>
        </div>
        <br><br>
            <a href='cadastrar_quarto.html' style='display: block; margin-bottom: 15px;'>CADASTRAR OUTRO QUARTO</a>
            <a href='logout_hotel.php'>SAIR</a>";
}else{
    echo "
    <div class='form' style='text-align: center;'>
        <h2 class='titulo_secundario' style='color: #ff2222; text-decoration: none;'>Erro, tente novamente!</h2>
    </div>";
}

?>

</body>
</html>