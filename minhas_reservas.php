<?php

session_start();

if(!isset($_SESSION['logado']) || $_SESSION['logado'] != true){
    header("location: login.html");
    exit();
}

require_once 'conexao.php';

$id_cliente = $_GET['id_cliente'];

$sql = "SELECT reservas.id, quartos.numero, quartos.tipo, quartos.preco_diaria, reservas.data_entrada, reservas.data_saida, hoteis.nome 
FROM reservas 
JOIN quartos ON reservas.quarto_id = quartos.id 
JOIN hoteis ON quartos.hotel_id = hoteis.id 
WHERE reservas.cliente_id = $id_cliente";


$result = mysqli_query($conexao, $sql);

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Minhas Reservas</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <h1 class="titulo_principal" style="color: blue; border-image: linear-gradient(to right, blue, red, yellow) 1">
        Hotel<span style="color: red;">Sys</span><span style="color: yellow;">tem</span>
    </h1>
    <br>

    <h2 class="titulo_secundario">Minhas Reservas</h2>

    <table class="table" border="1" style="text-align: left;">
        <thead>
            <tr>
                <th>CÓDIGO DA RESERVA</th>
                <th>HOTEL</th>
                <th>NÚMERO DO QUARTO</th>
                <th>TIPO DE QUARTO</th>
                <th>PREÇO</th>
                <th>DATA DE ENTRADA</th>
                <th>DATA DE SAÍDA</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($linha = mysqli_fetch_assoc($result)) {

                echo "<tr>";
                echo "<td>" . $linha['id'] . "</td>";
                echo "<td>" . $linha['nome'] . "</td>";
                echo "<td>" . $linha['numero'] . "</td>";
                echo "<td>" . $linha['tipo'] . "</td>";
                echo "<td>" . $linha['preco_diaria'] . "</td>";
                echo "<td>" . $linha['data_entrada'] . "</td>";
                echo "<td>" . $linha['data_saida'] . "</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
    <br><br>
    <a href="listar_hoteis.php">LISTA DOS HOTÉIS</a>
</body>

</html>