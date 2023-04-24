<?php
    session_start();

    include_once dirname(__DIR__, 3) . '/banco.php';

    //declaração das variaveis;
    $nomeProduto = $_POST['nomeproduto'];
    $categoriaProduto = $_POST['categoria'];
    $quantidadeProduto = $_POST['quantidade'];
    $precoProduto = $_POST['precoproduto'];
    $modeloProduto = $_POST['modeloproduto'];

    if ($quantidadeProduto > 0) {
        $disponibilidadeProduto = 1;
    } else if ($quantidadeProduto === null) {
        $disponibilidadeProduto = 4;
    } else {
        $disponibilidadeProduto = 2;
    }

    //povoamento da tabela;
    $sql_cadastro = mysqli_query($conn, "INSERT INTO produtoteste (nome_prod, id_categoria, quantDisp, id_disponibilidade, modeloProduto, precoProduto) VALUES ('$nomeProduto', '$categoriaProduto', '$quantidadeProduto', '$disponibilidadeProduto', '$modeloProduto', '$precoProduto')");

    //checagem do cadastro;
    if ($sql_cadastro==true){

        echo "<script>        
                alert ('Produto cadastrado com sucesso!');
                window.location.href='./homeAdmin.php';
            </script>";
    
    } else{
        echo "<script>                    
                    alert ('Falha ao cadastrar Produto!');
                    window.location.href='cadastroProd.php';
                </script>";
    }
