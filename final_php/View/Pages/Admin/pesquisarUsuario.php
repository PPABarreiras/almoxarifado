<?php
  include_once dirname(__DIR__, 3) . '/banco.php';

  if (isset($_POST['input'])){
    $input = $_POST['input'];
    $query = "SELECT * FROM usuarios WHERE nome_user LIKE '{$input}%' OR cpf LIKE '{$input}%' OR email_user LIKE '{$input}%' OR telefone LIKE '{$input}%'";

    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0){?>
      
    <table class="resultadoPesquisa">

    <thead>
        <th scope="col"> Código</th>
        <th scope="col"> Usuário</th>
        <th scope="col"> Senha</th>
        <th scope="col"> CPF</th>
        <th scope="col"> Email</th>
        <th scope="col"> Telefone</th>
        <th scope="col"> Nível</th>
        <th scope="col"> Departamento</th>
        <th colspan="2"> Opções</th>
    </thead>

    <tbody>
      <?php
        while($row = mysqli_fetch_assoc($result)) {
            $id = $row['id_user'];
            $nome = $row['nome_user'];
            $senha = $row['senha'];
            $cpf = $row['cpf'];
            $email = $row['email_user'];
            $telefone = $row['telefone'];
            $nivel = $row['nivel'];
            $departamento = $row['id_area'];
          ?>

      <tr>
        <td data-label="Código"><?php echo $id;?></td>
        <td data-label="Nome"><?php echo $nome;?></td>
        <td data-label="Senha"><?php echo $senha;?></td>
        <td data-label="CPF"><?php echo $cpf;?></td>
        <td data-label="Email"><?php echo $email;?></td>
        <td data-label="Telefone"><?php echo $telefone;?></td>        
        <td data-label="Nível"><?php echo $nivel;?></td>        
        <td data-label="Departamento">                        
          <?php 
                    $consulta_categoria = mysqli_query($conn, "SELECT * FROM area_depar WHERE id_area = '$departamento'");

                    while ($categorias = mysqli_fetch_array($consulta_categoria)) {
                        echo $categorias['depar'];
                    }
          ?>    
        </td>
      </tr>

        <?php
      }
        
      ?>

      <?php
        }
      ?>
    </tbody>
  </table>

    <?php
  } else {
    echo "<span class='wrong'>Nenhuma correspondência encontrada.</span>";
  }
?>