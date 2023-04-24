<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/final_php/assets/global.css" />
    <link rel="stylesheet" href="/final_php/assets/notafiscal.css" />

    <link rel="stylesheet" href="/final_php/assets/template.css">

    <?php include dirname(__DIR__, 3) . "/template/header.php"; ?>
    <?php include dirname(__DIR__, 3) . "/template/footer.php"; ?>
    <?php include dirname(__DIR__, 3) . "/template/aside.php"; ?>
    <title>Upload de Arquivos </title>
</head>

<body>

    <main class="main"> <?php
if (isset($_POST['upload'])){
   $arquivo = $_FILES['file'];
    $arquivoNovo = explode('.',$arquivo['name']);

    if($arquivoNovo[sizeof($arquivoNovo)-1] != 'pdf'){
            die("você não pode fzer upload deste tipo de arquivo");
    }else{
        echo 'Upload foi feito com sucesso';
        move_uploaded_file($arquivo['tmp_name'],'arquivos/'.$arquivo['name']);
    }
}
?>


        <form method="POST" enctype="multipart/form-data" action="/final_php/View/Pages/Admin/arquivos">
            <p><label for=""> Selecione o arquivo</label>
                <input name="file" type="file">
            </p>
            <input class="btnUpload" type="submit" name="upload" value=" Enviar arquivo">
        
            <div>
            <a href="/final_php/View/Pages/Admin/arquivos">
                <button class="btn">Arquivos</button>
            </a>
        </div>
        </form>

      
    </main>


</body>

</html>

<style>
form {
    display: flex;
    flex-direction: column;
    align-items: center;
    position: absolute;
    left: 35%;
    top: 45%;
}

.btnUpload {
    background-color: rgb(79, 0, 106);
    color: #fff;
    padding: 0.6rem;
    border-radius: 0.3rem;
    transition: 0.4s;
}

.btnUpload:hover {
    background-color: #060552;

}
</style>