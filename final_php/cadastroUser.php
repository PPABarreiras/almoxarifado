<?php

//include_once dirname(__DIR__, 3) . '/banco.php';
include_once 'banco.php';

$nome = $_POST['nome'];
$cpf = $_POST['cpf'];
$telefone = $_POST['tel'];
$email = $_POST['email'];
$senha = $_POST['senha'];
$departamento = $_POST['depar'];

$sql_cadastro=mysqli_query( $conn, "INSERT INTO usuarios (nome_user, email_user, cpf, telefone, senha, id_area) values ('$nome','$email','$cpf','$telefone','$senha', '$departamento')" );

if ($sql_cadastro==true){

    echo "<script>    
            alert ('Usuário cadastrado com sucesso!');
            window.location.href='index.html';
          </script>";

} else { 
    echo "<script>    
            alert ('Falha ao cadastrar!');
            window.location.href='cadUserhtml.php';
        
          </script>";
}
?>