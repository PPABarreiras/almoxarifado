<?php
include_once dirname(__DIR__, 3) . '/banco.php';

$id_prod = $_GET['id_prod'];
$sql_consulta = mysqli_query($conn, "SELECT * FROM produtoteste WHERE id_prod = ${id_prod}");

$dados = mysqli_fetch_array($sql_consulta);

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/final_php/assets/cadastro.css" />
    <link rel="stylesheet" href="/final_php/assets/global.css" />
    <title>Atualizar dados</title>
</head>

<body>
    <div class="tudo">
        <div class="bloco1">
            <h1 class="title" style="color: white;">Editar produtos</h1>

            <form method="POST" action="./atualizarEstoque.php" class="form">
                <div class="box">
                    <input type="number" name="idproduto" readonly value='<?= $dados[9] ?>' />
                    <span>ID do Produto</span>
                    <i></i>
                </div>

                <div class="box">
                    <input type="text" name="nomeproduto" required value='<?= $dados[0] ?>' />
                    <span>Nome do Produto</span>
                    <i></i>
                </div>

                <div class="box">
                    <input type="number" name="quantidade" id="quantidade" required value='<?= $dados[1] ?>'>
                    <span>Quantidade</span>
                    <i></i>
                </div>

                <input type="submit" name="atualizar"  value="Atualizar"  class="btn">
                <br>
            </form>
        </div>
    </div>
</body>

</html>