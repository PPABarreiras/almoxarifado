<?php
include_once dirname(__DIR__, 3) . '/banco.php';

    $nome = $_POST['nome'];
    $cpf = $_POST['cpf'];
    $telefone = $_POST['tel'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $nivel = 1;
    $area = 2;

$sql_cadastro=mysqli_query( $conn, "INSERT INTO usuarios (nome_user, email_user, cpf, telefone, nivel, senha, id_area) values ('$nome','$email','$cpf','$telefone','1','$senha', '$area')" );

if ($sql_cadastro==true){

    echo "<script>
    
alert ('Usuário cadastrado com sucesso!');
window.location.href='homeAdmin.php';
        </script>";

}else{
    echo "<script>
    
    alert ('Falha ao cadastrar Admnistrador!');
    window.location.href='cadastroAdm.html';
            </script>";
}
?>