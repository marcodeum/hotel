<?php

require_once 'conexao.php';

$sql = "SELECT * FROM hoteis";

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
    <title>Lista dos Hoteis</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <h1 class="titulo_principal" style="color: blue; border-image: linear-gradient(to right, blue, red, yellow) 1">
        Hotel<span style="color: red;">Sys</span><span style="color: yellow;">tem</span>
    </h1>
    <br>
    
    <h2 class="titulo_secundario">Lista dos Hoteis</h2>
    
    <table class="table" border="1" style="text-align: left;">
        <thead>
            <tr>
                <th>ID DO HOTEL</th>
                <th>CIDADE</th>
                <th>NOME DO HOTEL</th>
                <th>ESTRELAS</th>
                <th>QUARTOS</th>
            </tr>
        </thead>
        <tbody>
            <?php while($linha = mysqli_fetch_assoc($result)){

            echo "<tr>";
                    echo "<td>" . $linha['id'] . "</td>"; 
                    echo "<td>" . $linha['cidade'] . "</td>";
                    echo "<td>" . $linha['nome'] . "</td>";
                    echo "<td>" . $linha['estrelas'] . "</td>";
                    echo "<td><a href='ver_quartos.php?hotel_id=".$linha['id']."'>VER QUARTOS DISPONÍVEIS</a></td>" ;
                    echo "</tr>";
                    }
                ?>
        </tbody>
    </table>
</body>
</html>