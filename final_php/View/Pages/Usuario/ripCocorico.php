<?php
  include_once dirname(__DIR__, 3) . '/banco.php';

  $lista = "SELECT * FROM categorias";
  $categorias = $conn->query($lista);
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/final_php/assets/cadastro.css" />
    <link rel="stylesheet" href="/final_php/assets/global.css" />
    <title>ripcocorico</title>
</head>

<body>

    <div class="tudo">
    <div class="bloco1">
        <h1 class="title" style="color: white;">R.I.P. Cocoricó</h1>
    <div class="cocorico">
        <img src="/final_php/assets/images/LogoHeader.png">
    </div>    
            
</body>

</html>