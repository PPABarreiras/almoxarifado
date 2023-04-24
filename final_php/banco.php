<?php
$host="localhost";
$usuario="root";
$senha="";
$bd="almox";
  $conn = mysqli_connect($host, $usuario,$senha,$bd);

  if(!$conn){
    die("Conexão com Banco de dados falhou");
  }
?>