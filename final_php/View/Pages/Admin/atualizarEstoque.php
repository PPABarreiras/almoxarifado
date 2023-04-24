<?php

include_once dirname(__DIR__, 3) . '/banco.php';

if(isset($_POST['atualizar'])){

  $id_prod = $_POST['idproduto'];
  $nome_prod = $_POST['nomeproduto'];
  $quant = $_POST['quantidade'];
  
  $atualizar= mysqli_query( $conn, "UPDATE produtoteste p SET nome_prod = '${nome_prod}', quantDisp = '${quant}'  WHERE id_prod ='${id_prod}'" );

  if ($atualizar==true){

    echo "<script>     
            alert ('Dados atualizados com sucesso!');
            window.location.href='/final_php/View/Pages/Admin/estoque.php';
          </script>";

}else{
    echo "<script>        
            alert ('Falha em editar registro!');
            window.location.href=/final_php/View/Pages/Admin/estoque.php';
          </script>";
}
}else {

  $id_prod = $_GET['id_prod'];
  
$excluir=mysqli_query($conn, "DELETE FROM produtoteste WHERE id_prod ='$id_prod'");

    if ($excluir==true) {
      echo "
          <script>
              alert ('Produto removido com sucesso!');
              window.location.href='/final_php/View/Pages/Admin/estoque.php';
          </script>";
  
  } else{
      echo "
          <script>    
              alert ('Falha ao remover produto!');
              window.location.href='/final_php/View/Pages/Admin/estoque.php';
          </script>";
  }
}
?>