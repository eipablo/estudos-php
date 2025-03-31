<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notas dos Alunos</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body>

    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "pwii";

    $conexao = new mysqli($servername, $username, $password, $dbname);

    if ($conexao->connect_error) {
        die("Conexão falhou: " . $conexao->connect_error);
    }
    $sql = "SELECT *, (nota1 + nota2 + nota3 + nota4) / 4 AS media FROM alunoconcluinte ORDER BY media DESC";
    $resultado = $conexao->query($sql);
    ?>

    <div class="w3-padding w3-content w3-text-grey">
        <h1 class="w3-center w3-teal w3-round-large w3-margin-bottom">Notas dos Alunos Concluintes</h1>

        <table class="w3-table-all w3-hoverable w3-card-4">
            <tr class="w3-teal">
                <th>ID</th>
                <th>Nome</th>
                <th>Nota 1</th>
                <th>Nota 2</th>
                <th>Nota 3</th>
                <th>Nota 4</th>
                <th>Média</th>
                <th>Situação</th>
            </tr>

    <?php
        if ($resultado->num_rows > 0) {
            
            $alunos = $resultado->fetch_all(MYSQLI_ASSOC);

            foreach ($alunos as $linha) {
                $media = $linha['media'];

                if ($media >= 8) {
                    $cor = "w3-green";
                    $icone = "fa-check-circle";
                    $situacao = "Aprovado";
                } else if ($media >= 6) {
                    $cor = "w3-yellow";
                    $icone = "fa-exclamation-circle";
                    $situacao = "Recuperação";
                } else {
                    $cor = "w3-red";
                    $icone = "fa-times-circle";
                    $situacao = "Reprovado";
                }

                echo "<tr>";
                echo "<td>" . $linha['idalunoconcluinte'] . "</td>";
                echo "<td>" . $linha['nome'] . "</td>";
                echo "<td>" . $linha['nota1'] . "</td>";
                echo "<td>" . $linha['nota2'] . "</td>";
                echo "<td>" . $linha['nota3'] . "</td>";
                echo "<td>" . $linha['nota4'] . "</td>";
                echo "<td><strong>" . number_format($media, 2) . "</strong></td>";
                echo "<td class='$cor'><i class='fa $icone'></i> $situacao</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='8' class='w3-center'>Nenhum aluno encontrado</td></tr>";
        }
        $conexao->close();
    ?>
    
        </table>
    </div>
</body>

</html>