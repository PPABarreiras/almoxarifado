<?php

include_once __DIR__ . '/banco.php';

if (isset($_POST['username']) && isset($_POST['password'])){
 
  $usuario =$_POST['username'];
  $senha =$_POST['password'];

//VERIFICAÇÃO DE EXISTÊNCIA DO USUÁRIO
  $sql_log=mysqli_query($conn,"SELECT * FROM usuarios WHERE cpf = '$usuario' AND senha = '$senha'");
  $num = mysqli_num_rows($sql_log);

  if ($num == 1){
   while($percorrer = mysqli_fetch_array($sql_log)){
     $nivel = $percorrer['nivel'];
     $nome = $percorrer['nome_user'];

     session_start(); //inicia sessão

      $_SESSION['username'] = $nome;

     if($nivel == 1){
        $_SESSION['adm'] = $nome;
        header('location: View/Pages/Admin/homeAdmin.php');
     } else {
        $_SESSION['normal'] = $nome;
        if ($nome == "cocorico") {
          header('location: View/Pages/Usuario/ripCocorico.php');
        } else {
        header('location: View/Pages/Usuario/homeUser.php');
        }
      }

   }

  }else{
    echo 'Dados inválidos! CPF ou senha incorretos';
  }

}

//$sql_log=mysqli_query($conn, "SELECT * FROM usuarios WHERE cpf = '$usuario' and senha = '$senha'");

/*$sql = "SELECT * FROM usuarios WHERE cpf = '$usuario' and senha = '$senha'";

$result = $conn->query($sql);
 
if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
      $nivel= $row["nivel"];
      if($nivel === 'Admin') {
        header('location:homeAdmin.php');

      }else if ($nivel === 'Servidor'){
        header('location:homeUser.php');

      }//acrescentar perfil de usuário qualquer
  }
}*/

/*if (mysqli_num_rows($sql_log)!=0){
 
    var_dump($sql_log);

    //header('location:homeAdmin.php');
 
}else{
    echo "<script>
    
    alert ('Usuário não está registrado!');
    window.location.href='index.html';
            </script>";
}
*/
