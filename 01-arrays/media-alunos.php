<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Prática array multidimensional</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    </head>
    <body>
        <div class="w3-container">
        <div>
            <h2 class="w3-blue w3-border w3-center">Prática Arrays</h2>
        </div>
            <table class="w3-table w3-bordered ">
                <thead class="w3-blue">
                    <tr>
                        <th>Nome</th>
                        <th>Nota 1</th>
                        <th>Nota 2</t>
                        <th>Média</th>
                        <th>Situação</th>
                </tr>
                </thead>
                <tbody>
                    <?php
                        $alunos = [
                            ["Ana", 7, 8],
                            ["Bruno", 5, 6],
                            ["Clara", 9, 10],
                            ["Diego", 6, 7],
                            ["Elena", 8, 9],
                        ];

                        foreach ($alunos as $alunos) {
                            $media = ($alunos[1] + $alunos[2]) /2 ;
                            if ($media >= 7) {
                                $situacao = 'Aprovado';
                            } else if ($media < 7 && $media >= 5) {
                                $situacao = 'Em recuperação';
                            } else {
                                $situacao = 'Reprovado';
                            }

                            echo'<tr>';
                            echo '<td>'.$alunos[0].'</td>';
                            echo '<td>'.$alunos[1].'</td>';
                            echo '<td>'.$alunos[2].'</td>';
                            echo '<td>'.$media.'</td>';
                            echo '<td>'.$situacao.'</td>';
                            echo'</tr>';
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </body>
</html>