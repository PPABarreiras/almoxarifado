<?php include dirname(__DIR__, 3) . "/template/header.php"; ?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/final_php/assets/listas.css">
    <link rel="stylesheet" href="/final_php/assets/global.css">
    <link rel="stylesheet" href="/final_php/assets/template.css">
    <title>Listagens</title>
</head>

<body>
    <?php include dirname(__DIR__, 3) . "/template/aside.php"; ?>
    <?php include dirname(__DIR__, 3) . "/template/footer.php"; ?>

    <main class="main">
        <h1 class="title">Acesso a todas as listas do Sistema</h1>
        <ul>
            <li><a class="item_page" href="listarUser.php">Usuários</a></li>
            <li><a class="item_page" href="listarAdmins.php">Administradores</a></li>
            <li><a class="item_page" href="listarDepars.php">Departamentos</a></li>
        </ul>

    </main>
</body>

</html>