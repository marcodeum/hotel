<?php

require_once 'conexao.php';

$email = $_POST['email'];
$senha = $_POST['senha'];

$sql = "SELECT * FROM hoteis WHERE senha = '$senha' AND email = '$email'";

$resultado = mysqli_query(
    $conexao,
    $sql
);

if (mysqli_num_rows($resultado) > 0) {
    header("Location: cadastrar_quarto.html");
    exit();
} else {
    header("Location: login_hotel.html");
    exit();
}

?>