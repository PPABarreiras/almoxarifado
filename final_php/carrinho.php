<?php

  include_once './banco.php';
  
  session_start();

  if (!isset($_SESSION['itens']))
  {
    $_SESSION['itens'] = array();
  }

  if (isset($_POST['id_prod'])) {

    $idProduto = $_POST['id_prod'];
    $quantidadeProd = $_POST['quantidadeProd'];

    if (!isset($_SESSION['itens'][$idProduto])) {
      $_SESSION['itens'][$idProduto] = $quantidadeProd;
    } else {
      $_SESSION['itens'][$idProduto] += $quantidadeProd;
    }
    
  }
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="/final_php/assets/homeUser.css" />
    <link rel="stylesheet" href="/final_php/assets/resultados.css" />
    <link rel="stylesheet" href="/final_php/assets/login.css" />

    <link rel="stylesheet" href="/final_php/assets/global.css">
    <script src="/final_php/node_modules/jquery/dist/jquery.min.js"></script>
</head>

<body>

    <div class="content"> <?php

  // Exibe

  if(count($_SESSION['itens']) == 0) {
    echo "<p>Carrinho Vazio </p><br><a href='./View/Pages/Usuario/homeUser.php'>Adicionar Itens</a>";
  } else {?>
        <main class="main">

            <table class='resultadoPesquisa'>

                <thead>
                    <th scope="col">Produto</th>
                    <th scope="col">Modelo</th>
                    <th scope="col">Quantidade</th>
                    <th scope="col">Categoria</th>
                    <th scope="col">Ações</th>
                </thead>
                <tbody>

                    <?php
    foreach($_SESSION['itens'] as $idProduto => $quantidade) {
      $query = "SELECT * FROM produtoteste WHERE id_prod = '$idProduto'";
      $result = mysqli_query($conn, $query);
      
      if (mysqli_num_rows($result) > 0){?>

                    <?php
            while($row = mysqli_fetch_assoc($result)) {
              $produto = $row['nome_prod'];
              $modelo = $row['modeloProduto'];
              $categoria = $row['id_categoria'];
              
              ?>

                    <tr>
                        <td data-label="Produto"><?php echo $produto;?></td>
                        <td data-label="Modelo"><?php echo $modelo;?></td>
                        <td data-label="Quantidade"><?php echo $quantidade;?></td>
                        <td data-label="Categoria">
                            <?php 
                $consulta_categoria = mysqli_query($conn, "SELECT * FROM categorias WHERE id_categoria = '$categoria'");
                
                while ($categorias = mysqli_fetch_array($consulta_categoria)) {
                    echo $categorias['descricao'];
                  }
                  ?>
                        </td>
                        <td data-label="Ação">
                            <button class="btnActions" id="myBtn">
                                <?php echo"<a style='text-decoration: none; color: inherit;' href='removerCarrinho.php?id=" . $idProduto . "'>Remover</a>";?>
                            </button>
                        </td>
                    </tr>

                    <?php
            }
           }
          ?>
                    <?php
      }
      ?>

                </tbody>
            </table>

            <?php
    }
  ?>
        </main>
    </div>
</body>

</html>

<style>
p {
    color: white;
    font-size: 35px;
}
</style>