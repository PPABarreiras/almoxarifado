<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/final_php/assets/cadastro.css" />
    <link rel="stylesheet" href="/final_php/assets/global.css" />
    <title>CadProd</title>
</head>

<body>

    <div class="tudo">
        <div class="bloco1">
            <h1>Cadastro de Produtos</h1>

            <form method="POST" action="cadMarcaCategoria.php" class="form">
                <div class="box">
                    <input type="text" name="marcaproduto" required />
                    <span>Nome da Marca</span>
                    <i></i>
                </div>
                <div class="box">
                    <input type="text" name="categoriaproduto" required />
                    <span>Nome da categoria</span>
                    <i></i>
                </div>
                <input type="submit" name="enviar" class="btn"><br>
            </form>
        </div>
    </div>

</body>

</html>