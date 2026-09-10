<?php

include 'conexao.php';

$email = $_POST['email'];
$senha = $_POST['senha'];

$sql = "SELECT * FROM clientes WHERE senha = '$senha' AND email = '$email'";

$resultado = mysqli_query(
    $conexao,
    $sql
);

if(mysqli_num_rows($resultado) > 0){
    header("Location: minhas_reservas.php");
    exit();
}else{
    header("Location: login.html");
    exit();
}

?>