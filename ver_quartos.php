<?php

require_once 'conexao.php';

$hotel_id = $_GET['hotel_id'];

$sql = "SELECT * FROM quartos WHERE hotel_id = $hotel_id";

$result = mysqli_query($conexao, $sql);

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quartos disponíveis</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <h1 class="titulo_principal" style="color: blue; border-image: linear-gradient(to right, blue, red, yellow) 1">
        Hotel<span style="color: red;">Sys</span><span style="color: yellow;">tem</span>
    </h1>
    <br>

    <h2 class="titulo_secundario">Lista dos Quartos</h2>

    <table class="table" border=1 style="text-align: left">
        <thead>
            <tr>
                <th>ID do Quarto</th>
                <th>Número do Quarto</th>
                <th>Tipo do Quarto</th>
                <th>Preço da Diária</th>
                <th>Disponível</th>
            </tr>
        </thead>
        <tbody>
            <?php

            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['numero'] . "</td>";
                echo "<td>" . $row['tipo'] . "</td>";
                echo "<td>" . $row['preco_diaria'] . "</td>";
                echo "<td>" . $row['disponivel'] . "</td>";
                echo "</tr>";
            }

            ?>
        </tbody>
    </table>
    <br><br>

    <h2 class="titulo_secundario">Formulário de Reserva</h2>

    <form class="form" action="salvar_reserva.php" method="post">
        <label class="label" for="id_cliente">ID do Cliente</label><br>
        <input class="input" type="number" name="id_cliente" id="id_cliente" placeholder="Ex: 9742, 87632" required><br>
        <label class="label" for="id_quarto">ID do Quarto</label><br>
        <input class="input" type="number" name="id_quarto" id="id_quarto" placeholder="Ex: 293, 8371" required><br>
        <label class="label" for="data_entrada">Data de Entrada / Check-in</label><br>
        <input class="input" type="date" name="data_entrada" id="data_entrada" placeholder="Ex: 22-09-2026" required><br>
        <label class="label" for="data_saida">Data de Saída / Check-out</label><br>
        <input class="input" type="date" name="data_saida" id="data_saida" placeholder="Ex: 30-12-2026" required><br><br>
        <button class="btn-enviar" type="submit">RESERVAR</button>
    </form>
</body>

</html>