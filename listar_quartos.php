<?php

require_once 'conexao.php';

$sql = "SELECT * FROM quartos";

$result = mysqli_query(
    $conexao,
    $sql
);

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista dos Quartos</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <h1 class="titulo_principal" style="color: blue; border-image: linear-gradient(to right, blue, red, yellow) 1">
        Hotel<span style="color: red;">Sys</span><span style="color: yellow;">tem</span>
    </h1>
    <br>
    
    <h2 class="titulo_secundario">Lista dos Quartos</h2>
    
    <table class="table" border="1" style="text-align: left;">
        <thead>
            <tr>
                <th>ID DO QUARTO</th>
                <th>ID DO HOTEL</th>
                <th>NÚMERO DO QUARTO</th>
                <th>TIPO DE QUARTO</th>
                <th>PREÇO DA DIÁRIA</th>
                <th>DISPONÍVEL</th>
            </tr>
        </thead>
        <tbody>
            <?php while($linha = mysqli_fetch_assoc($result)){

            echo "<tr>";
                    echo "<td>" . $linha['id'] . "</td>"; 
                    echo "<td>" . $linha['hotel_id'] . "</td>";
                    echo "<td>" . $linha['numero'] . "</td>";
                    echo "<td>" . $linha['tipo'] . "</td>";
                    echo "<td>R$" . $linha['preco_diaria'] . "</td>";
                    echo "<td>" . $linha['disponivel'] . "</td>";
            }
                ?>
        </tbody>
    </table>
    <br><br>
        <a href="cadastrar_quarto.html">CADASTRAR NOVO QUARTO</a> / <a href="logout_hotel.php">SAIR</a>
</body>
</html>