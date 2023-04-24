<?php
include_once dirname(__DIR__, 3) . '/banco.php';

?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/final_php/assets/global.css">
    <link rel="stylesheet" href="/final_php/assets/listarUser.css">
    <link rel="stylesheet" href="/final_php/assets/template.css">
    <title>Lista de Administradores </title>
</head>

<body>

    <?php include dirname(__DIR__, 3) . "/template/header.php"; ?>
    <?php include dirname(__DIR__, 3) . "/template/aside.php"; ?>
    <?php include dirname(__DIR__, 3) . "/template/footer.php"; ?>
    <main class="main">
        <h1 class="title"> Lista de Administradores cadastrados</h1>
        <div class="container">
            <table rules="all">

                <thead>
                    <tr>
                        <th> Código</th>
                        <th> Administrador</th>
                        <th> Senha</th>
                        <th> CPF</th>
                        <th> Email</th>
                        <th> Telefone</th>
                        <th> Nível</th>


                    </tr>
                </thead>

                <tbody>
                    <?php

                    $sql_consulta = mysqli_query($conn, "SELECT * FROM usuarios where nivel='1'");
                    $total = mysqli_num_rows($sql_consulta);
                    while ($linhas = mysqli_fetch_array($sql_consulta)) { ?>

                        <tr>
                            <td data-label="Código"> <?= $linhas[0] ?> </td>
                            <td data-label="Usuário"> <?= $linhas[1] ?> </td>
                            <td data-label="Senha"> <?= $linhas[2] ?></td>
                            <td data-label="CPF"> <?= $linhas[3] ?></td>
                            <td data-label="E-mail"> <?= $linhas[4] ?></td>
                            <td data-label="Telefone"> <?= $linhas[5] ?></td>
                            <td data-label="Nível"> <?= $linhas[6] ?></td>

                        </tr>

                    <?php } ?>

                    <tr class="total">
                        <td>Total de Registros: <?= $total ?></td>
                    </tr>

                </tbody>


            </table>

            <div class="opcoes" style="text-align: center; margin: 40px 50px">
                <a style="border: 1px solid black; border-radius: 10px; background-color: rgb(79,0,106); padding: 10px;" href="relat_user.php">Fazer o download em PDF</a>
            </div>
    </main>
    </div>


</body>

</html>