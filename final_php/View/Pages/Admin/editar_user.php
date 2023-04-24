<?php

include_once dirname(__DIR__, 3) . './banco.php';
//include_once '../banco.php';

$id_user = $_GET['codigo'];

$sql_consulta = mysqli_query($conn, "SELECT * FROM usuarios WHERE id_user = '$id_user'");

$dados = mysqli_fetch_array($sql_consulta);

$lista = "SELECT * FROM area_depar";
$depars = $conn->query($lista);
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="stylesheet" href="/final_php/assets/cadastro.css" />
    <link rel="stylesheet" href="/final_php/assets/global.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Edição</title>
</head>

<body>
    <div class="tudo">
        <div class="bloco1">
            <h1 class="title" style="color: white;">Editar usuários</h1>
            <form method="POST" action="atualizar.php" class="form">

                <input type="hidden" name="codigo" value='<?= $dados[0] ?>'>
                <div class="box">
                    <input type="text" name="nome" required value='<?= $dados[1] ?>' />
                    <span>Nome completo</span>
                    <i></i>
                </div>

                <div class="box">
                    <input type="text" name=" cpf" required value='<?= $dados[3] ?>' />
                    <span>CPF</span>
                    <i></i>
                </div>

                <div class="box">
                    <input type="text" name="tel" required value='<?= $dados[5] ?>' />
                    <span>Telefone</span>
                    <i></i>
                </div>

                <div class="box">
                    <input type="text" name="email" required value='<?= $dados[4] ?>' />
                    <span>E-mail</span>
                    <i></i>
                </div>

                <div class="box">
                    <input type="password" name="senha" required value='<?= $dados[2] ?>' />
                    <span>Senha</span>
                    <i></i>
                </div>

                <br>
                <select name="nivel" id="nivel">
                    <option value='1'> Administrador</option>
                    <option value="0"> Servidor</option>
                </select>

                <select name="depar" id="depar">
                    <?php
         if ($depars->num_rows > 0) {
          while ($depar = $depars->fetch_assoc()) {
          echo "<option name='" . $depar['depar'] . "' id='" . $depar['depar'] . "' value='" . $depar['id_area'] . "'>" . $depar['depar'] . "</option>";
          }
        }
          ?>
                </select>
                <br><br>
                <input type="submit" value="Atualizar">
            </form>

        </div>
    </div>
</body>

</html>