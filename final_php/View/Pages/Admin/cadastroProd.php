<?php
  include_once dirname(__DIR__, 3) . '/banco.php';

  $lista = "SELECT * FROM categorias";
  $categorias = $conn->query($lista);

  $lista_marca = "SELECT * FROM marca";
  $marcas = $conn->query($lista_marca);

?>

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
        <h1 class="title" style="color: white;">Cadastro de Produto</h1>

            <form method="POST" action="cadastroProduto.php" class="form">

          <div class="box">
            <input type="text" name="nomeproduto" required />
            <span>Nome do Produto</span>
            <i></i>
          </div>

          <div class="box">
            <input type="text" name="modeloproduto" required />
            <span>Modelo do Produto</span>
            <i></i>
          </div>

          <div class="box">
            <input type="text" name="precoproduto" required />
            <span>Preço do Produto</span>
            <i></i>
          </div>
          
          <div class="box">
            <input type="number" name="quantidade" id="quantidade" required>
            <span>Quantidade</span>
            <i></i>
          </div>

          <div class="box">
            <select name="categoria" id="categoria">
            <?php
            if ($categorias->num_rows > 0) {
              while ($item = $categorias->fetch_assoc()) {
              echo "<option name='" . $item['categoria'] . "' id='" . $item['descricao'] . "' value='" . $item['id_categoria'] . "'>" . $item['descricao'] . "</option>";
              }
            }
            ?>
            </select>
          </div>

          <div class="box">
            <select name="marca" id="marca">
            <?php
            if ($marcas->num_rows > 0) {
              while ($item = $marcas->fetch_assoc()) {
              echo "<option name='" . $item['descricao'] . "' id='" . $item['descricao'] . "' value='" . $item['id_marca'] . "'>" . $item['descricao'] . "</option>";
              }
            }
            ?>
            </select>
          </div>

          <!-- <div class="box">
            <div class="statusBox">
              <input type="radio" id="disponivel" name="status" value="1">
              <label for="disponivel">Disponível</label>
              <input type="radio" id="indisponivel" name="status" value="2">
              <label for="indisponivel">Indisponível</label>
              <input type="radio" id="em_espera" name="status" value="3">
              <label for="em_espera">Em Espera</label>
            </div>
          </div> -->
                <input type="submit" name="enviar" class="btn"><br>
            </form>
        </div>
    </div>

</body>

</html>