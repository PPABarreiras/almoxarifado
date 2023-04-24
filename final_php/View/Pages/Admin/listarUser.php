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

  <title>Lista de Usuários</title>
</head>

<body>
  <?php include dirname(__DIR__, 3) . "/template/header.php"; ?>
  <?php include dirname(__DIR__, 3) . "/template/footer.php"; ?>
  <?php include dirname(__DIR__, 3) . "/template/aside.php"; ?>

  <main class="main">
    <div class="container">
      <div class="title-box">
        <h1 class="title"> Lista de Usuários cadastrados</h1> 
        <span class='search'>
          <a href="pesquisaUsuario.php">
            <img src="/final_php/assets/images/iconSearch.png" class="searchIcon">
          </a>
        </span>
      </div>

      <table rules="all">

        <thead>
          <tr>
            <th> Código</th>
            <th> Usuário</th>
            <th> Senha</th>
            <th> CPF</th>
            <th> Email</th>
            <th> Telefone</th>
            <th> Nível</th>
            <th> Departamento</th>
            <th colspan="2"> Opções</th>

          </tr>
        </thead>

        <tbody>
          <?php

          $sql_consulta = mysqli_query($conn, "SELECT * FROM usuarios");
          $total = mysqli_num_rows($sql_consulta);
          while ($linhas = mysqli_fetch_array($sql_consulta)) { ?>

            <tr class='row'>
              <td data-label="Código"> <?= $linhas[0] ?> </td>
              <td data-label="Usuário"> <?= $linhas[1] ?> </td>
              <td data-label="Senha"> <?= $linhas[2] ?></td>
              <td data-label="CPF"> <?= $linhas[3] ?></td>
              <td data-label="E-mail"> <?= $linhas[4] ?></td>
              <td data-label="Telefone"> <?= $linhas[5] ?></td>
              <td data-label="Nível"> 
                <?php 
                  if($linhas[6] == 1) {
                    echo "Admin";
                  } else {
                    echo "Usuário";
                  }
                ?>
              </td>
              <td data-label="Departamento">
                <?php 
                  $consulta_categoria = mysqli_query($conn, "SELECT * FROM area_depar WHERE id_area = '$linhas[7]'");

                  while ($categorias = mysqli_fetch_array($consulta_categoria)) {
                      echo $categorias['depar'];
                  }
                ?>    
              </td>

              <td data-label="Ação">
                <a href="excluir_user.php?codigo=<?= $linhas[0] ?>">
                  <img src="/final_php/assets/images/iconDelete.png" alt="icone Excluir" name="excluirBtn" value="Excluir" onclick="return confirm('Deseja deletar este usuário?')">
                  <!-- <input type="submit" style="background: inherit; font-family: inherit; font-size: inherit; color: white; cursor: pointer;" name="excluirBtn" value="Excluir" onclick="return confirm('Deseja deletar este usuário?')"> -->
                </a>
              </td>
              <td data-label="Ação">
                <a href="./editar_user.php?codigo=<?= $linhas[0] ?>">
                <img src="/final_php/assets/images/iconEdit.png" alt="icone Editar">
                </a>
              </td>

            </tr>

          <?php } ?>

          <tr class="total">
            <td>Total de Registros: <?= $total ?></td>
          </tr>

        </tbody>

      </table>
    </div>
    <div class="opcoes" style="text-align: center; margin: 40px auto; border: none;">
      <a style="border: 1px solid black; border-radius: 10px; background-color: rgb(79,0,106); padding: 10px;" href="relat_user.php">Fazer o download em PDF</a>
    </div>

  </main>
</body>

</html>