<?php

session_start();

require_once 'conexao.php';

$email = $_POST['email'];
$senha = $_POST['senha'];

$sql = "SELECT * FROM clientes WHERE email = '$email'";

$resultado = mysqli_query(
    $conexao,
    $sql
);

if (mysqli_num_rows($resultado) > 0) {
    if ($linha = mysqli_fetch_assoc($resultado)) {
        if (password_verify($senha, $linha['senha'])) {
            $_SESSION['cliente_id'] = $linha['id'];
            $_SESSION['logado'] = true;
            header("Location: minhas_reservas.php?id_cliente=" . $linha['id']);
            exit();
        }
    }
} else {
    header("Location: login.html");
    exit();
}
