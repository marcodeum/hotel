<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Salvar de Reserva</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    
</body>
</html>

<?php

require_once 'conexao.php';

$id_cliente = $_POST['id_cliente'];
$id_quarto = $_POST['id_quarto'];
$data_entrada = $_POST['data_entrada'];
$data_saida = $_POST['data_saida'];

$sql = "INSERT INTO reservas (cliente_id, quarto_id, data_entrada, data_saida)
VALUES ($id_cliente, $id_quarto, '$data_entrada', '$data_saida')";

$result = mysqli_query($conexao, $sql);

if(!$result){
    header("Location: ver_quartos.php");
    exit();
}elseif($result){
    echo "
    <div class='form'>
        <h2 class='titulo_secundario' style='text-align: center; margin-bottom: 25px;'>
            <span style='color: #0055ff;'>Reserva do</span>
            <span style='color: #ff2222;'>quarto realizado</span>
            <span style='color: #ffcc00;'>com sucesso!</span>
        </h2>
        
        <p style='color: #cbd5e1; font-size: 18px;'>
            <span class='label'>✔️ ID do Cliente:</span> $id_cliente<br><br>
            <span class='label'>✔️ ID do Quarto:</span> $id_quarto<br><br>
            <span class='label'>✔️ Data de Entrada:</span> $data_entrada<br><br>
            <span class='label'>✔️ Data de Saída:</span> $data_saida<br><br>
        </p>
    </div>";
}

?>