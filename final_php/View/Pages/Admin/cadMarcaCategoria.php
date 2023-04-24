<?php
    session_start();

    include_once dirname(__DIR__, 3) . '/banco.php';

    //declaração das variaveis;
    $marcaProduto = $_POST['marcaproduto'];
    $categoriaProduto = $_POST['categoriaproduto'];


    //povoamento da tabela;
    if ($marcaProduto != '') {
        $sql_cadastro = mysqli_query($conn, "INSERT INTO marca (descricao) VALUES ('$marcaProduto')");
    }
    if ($categoriaProduto != '') {
        $sql_cadastro = mysqli_query($conn, "INSERT INTO categorias (descricao) VALUES ('$categoriaProduto')");
    }

    //checagem do cadastro;
    if ($sql_cadastro==true){

        echo "<script>        
                alert ('Marca/Categoria cadastrado com sucesso!');
                window.location.href='./homeAdmin.php';
            </script>";
    
    } else{
        echo "<script>                    
                    alert ('Falha ao cadastrar Marca/Categoria!');
                    window.location.href='cadastroMarcaCategoria.php';
                </script>";
    }
