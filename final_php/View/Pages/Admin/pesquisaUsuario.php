<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/final_php/assets/listas.css">
    <link rel="stylesheet" href="/final_php/assets/global.css">
    <link rel="stylesheet" href="/final_php/assets/template.css">
    <script src="/final_php/node_modules/jquery/dist/jquery.min.js"></script>
    <title>Listagens</title>
</head>

<body>
    <?php include dirname(__DIR__, 3) . "/template/header.php"; ?>
    <?php include dirname(__DIR__, 3) . "/template/footer.php"; ?>
    <?php include dirname(__DIR__, 3) . "/template/aside.php"; ?>

    <main class="main">

    <div class="containerInput">
    <span id="msg"></span>
        <div class="searchbox">
        <input id="live_search" type="text" class="searchinput" placeholder="Buscar produto desejado..."/>
        <span id="listar-usuarios"></span>
        
        <!-- 
        <button class="searchbutton" type="submit">
            <img class="iconSearch" src="/final_php/assets/images/iconSearch.png" alt="">
        </button> -->
    </div>
    </div>

    <div id="searchResult">
    <p>Busque algo...</p>
    </div>
    </main>

    <script type="text/javascript">
    $(document).ready(function(){
    $('#live_search').keyup(function(){
        var input = $(this).val();

        if(input != ""){
        $.ajax({
            url: "pesquisarUsuario.php",
            method: "POST", 
            data:{input: input},

            success:function(data){
            $("#searchResult").html(data);
            }
        }); 
        } else {
            $("#searchResult").html("<p>Busque algo...</p>");
        }
    })
    })
    </script>
</body>

</html>