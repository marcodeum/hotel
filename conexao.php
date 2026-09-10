<?php

$host = "localhost";
$usuario = "root";
$senha = "";
$banco = "hotel_db";

$conexao = mysqli_connect($host, $usuario, $senha, $banco);

if($conexao){
    echo "<p>Conectado ao banco de dados</p><br><br>";
}else{
    echo "Não conectado ao banco de dados<br><br><br>";
}
?>