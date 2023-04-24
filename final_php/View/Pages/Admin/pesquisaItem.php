<?php
  session_start();
  session_abort();

  if (isset($_SESSION['normal'])) {
    echo '';
  } else {
    header('location:index.html');
  }
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="/final_php/assets/homeUser.css" />
    <link rel="stylesheet" href="/final_php/assets/resultados.css" />
    <!-- <link rel="stylesheet" href="/final_php/assets/template.css"> -->
    <link rel="stylesheet" href="/final_php/assets/template.css">
    <script src="/final_php/node_modules/jquery/dist/jquery.min.js"></script>
</head>

<body>

    <?php include dirname(__DIR__, 3) . "/template/header.php"; ?>
    <?php include dirname(__DIR__, 3) . "/template/aside.php"; ?>
    <?php include dirname(__DIR__, 3) . "/template/footer.php"; ?>

    <main class="main">

        <div class="containerInput">
            <div class="searchbox">
                <input id="live_search" type="text" class="searchinput" placeholder="Buscar produto desejado..." />

                <!-- 
          <button class="searchbutton" type="submit">
            <img class="iconSearch" src="/final_php/assets/images/iconSearch.png" alt="">
          </button> -->
            </div>

        </div>
        <div id="searchResult">
            <!-- <p>Busque algo...</p> -->
        </div>


    </main>

    <script type="text/javascript">
    $(document).ready(function() {
        $('#live_search').keyup(function() {
            var input = $(this).val();

            if (input != "") {
                $.ajax({
                    url: "pesquisarItem.php",
                    method: "POST",
                    data: {
                        input: input
                    },

                    success: function(data) {
                        $("#searchResult").html(data);
                    }
                });
            } else {
                $("#searchResult").html("<p></p>");
            }
        })
    })
    </script>
</body>

</html>

<style>
#searchResult {
    display: flex;
    justify-content: center;
    margin-top: 15rem;
}
</style>