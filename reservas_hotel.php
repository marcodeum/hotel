<?php

require_once 'conexao.php';

$hotel_id = $_GET['hotel_id'];

$sql = "SELECT reservas.id AS reservas_id, clientes.nome, quartos.id AS quartos_id, clientes.telefone, reservas.data_entrada, reservas.data_saida, quartos.tipo, quartos.preco_diaria, quartos.numero FROM reservas JOIN clientes ON reservas.cliente_id = clientes.id JOIN quartos ON reservas.quarto_id = quartos.id WHERE quartos.hotel_id = $hotel_id";

$result = mysqli_query($conexao, $sql);

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservas do Hotel</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <h1 class="titulo_principal" style="color: blue; border-image: linear-gradient(to right, blue, red, yellow) 1">
        Hotel<span style="color: red;">Sys</span><span style="color: yellow;">tem</span>
    </h1>
    <br>
    
    <h2 class="titulo_secundario">Reservas do Hotel</h2>
    
    <table class="table" border="1" style="text-align: left;">
        <thead>
            <tr>
                <th>CÓDIGO DA RESERVA</th>
                <th>CLIENTE</th>
                <th>TELEFONE</th>
                <th>NÚMERO DO QUARTO</th>
                <th>TIPO DE QUARTO</th>
                <th>PREÇO</th>
                <th>DATA DE ENTRADA</th>
                <th>DATA DE SAÍDA</th>
            </tr>
        </thead>
        <tbody>
            <?php while($linha = mysqli_fetch_assoc($result)){

            echo "<tr>";
                    echo "<td>" . $linha['reservas_id'] . "</td>"; 
                    echo "<td>" . $linha['nome'] . "</td>";
                    echo "<td>" . $linha['telefone'] . "</td>";
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
    <a href="cadastrar_quarto.html">CADASTRAR NOVO QUARTO</a> / <a href="logout_hotel.php">SAIR</a>
</body>
</html>