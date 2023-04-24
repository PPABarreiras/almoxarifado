<?php
include_once dirname(__DIR__, 3) . '/banco.php';

$id_user = $_GET['codigo'];

$excluir=mysqli_query($conn, "DELETE FROM usuarios WHERE id_user ='$id_user' ");

if ($excluir==true) {
    echo "
        <script>
            alert ('Usuário excluído com sucesso!');
            window.location.href='listarUser.php';
        </script>";

} else{
    echo "
        <script>    
            alert ('Falha ao excluir usuário!');
            window.location.href='listarUser.php';
        </script>";
}
?>  