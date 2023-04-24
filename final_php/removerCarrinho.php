<?php
  session_start();

  $idProduto = $_GET['id'];

  unset($_SESSION['itens'][$idProduto]);

  //echo "<META HTTP-EQUIV='REFRESH' CONTENT='0; URL=carrinho.php'/>";
  header('Location: ./carrinho.php');