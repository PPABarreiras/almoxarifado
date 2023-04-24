<?php
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="/final_php/assets/homeAdmin.css" />
    <link rel="stylesheet" href="/final_php/assets/global.css" />
    <link rel="stylesheet" href="/final_php/assets/template.css">
    <title>Cadastro</title>
</head>

<body>

    <?php include dirname(__DIR__, 3) . "/template/header.php"; ?>
    <?php include dirname(__DIR__, 3) . "/template/aside.php"; ?>
    <main class="main">

    <div class="actions">

        <a href="/final_php/View/Pages/Admin/cadastroProd.php">
            <button class="btn">Cadastrar novos produtos</button>
        </a>
       
        <a href="/final_php/View/Pages/Admin/cadastroMarcaCategoria.php">
            <button class="btn">Cadastrar marca ou categoria</button>
        </a>

        <a href="/final_php/View/Pages/Admin/cadastroAdm.html">
            <button class="btn">Cadastrar outros Administradores</button>
        </a>
    </div>
    </main>
</body>

</html>