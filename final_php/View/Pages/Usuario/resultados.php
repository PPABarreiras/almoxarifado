<?php

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/final_php/assets/resultados.css">
    <title>Resultados</title>
</head>

<body>
    <main class="main">
        <div class="container">

            <!-- <div class="list" id="list"></div>
        <br>
        <div class="pagenumbers"  id="pagination"></div> -->

            <table id="resultados">
                <caption>
                    Resultados
                </caption>
                <thead>
                    <tr>
                        <th scope="col">Produto</th>
                        <th scope="col">Quantidade</th>
                        <th scope="col">Status</th>
                        <th scope="col">Ação</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="tr">
                        <td data-label="Produto">xx</td>
                        <td data-label="Quantidade">xx</td>
                        <td data-label="Status" class="status">
                            <div class="radius" id="statusRed"></div>
                        </td>
                        <td data-label="Ação">
                            <button class="btnActions" id="myBtn">Detalhes</button>
                        </td>
                    </tr>
                    <tr class="tr">
                        <td data-label="Produto">xx</td>
                        <td data-label="Quantidade">xx</td>
                        <td data-label="Status" class="status">
                            <div class="radius" id="statusYellow"></div>
                        </td>
                        <td data-label="Ação">
                            <button class="btnActions" id="myBtn">Detalhes</button>
                        </td>
                    </tr>
                    <tr class="tr">
                        <td data-label="Produto">xx</td>
                        <td data-label="Quantidade">xx</td>
                        <td data-label="Status" class="status">
                            <div class="radius" id="statusGreen"></div>
                        </td>
                        <td data-label="Ação">
                            <button class="btnActions" id="myBtn">Adicionar ao Carrinho</button>
                        </td>
                    </tr>
                </tbody>
                <!-- <div class="pagenumbers"  id="pagination"> -->
                <!-- class="list" id="list" -->

            </table>

            <div id="myModal" class="modal">
                <div class="modal-content">
                    <span class="close">&times;</span>
                    <h1>Retornar aqui o nome do produto</h1>
                    <div class="content">

                        <div class="detailsProduct">
                            <p className="products">Caneta Bic (Caixa)
                            <div class="counter">
                                <span class="down" onClick='decreaseCount(event, this)'>-</span>
                                <input type="text" value="1">
                                <span class="up" onClick='increaseCount(event, this)'>+</span>
                            </div>
                            </p>

                            <div class="custom-checkbox">
                                <input type="radio" id="radio_1" name="avaliacao" id="avaliacao_checkbox" value="10">
                                <label for="radio_1"></label>
                            </div>
                        </div>

                        <div class="detailsProduct">
                            <p className="products">Caneta Bic (caixa)
                            <div class="counter">
                                <span class="down" onClick='decreaseCount(event, this)'>-</span>
                                <input type="text" value="1">
                                <span class="up" onClick='increaseCount(event, this)'>+</span>
                            </div>
                            </p>

                            <div class="custom-checkbox">
                                <input type="radio" id="radio_2" name="avaliacao" id="avaliacao_checkbox" value="10">
                                <label for="radio_2"></label>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
        </div>
    </main>
    <script>
        // Get the modal
        var modal = document.getElementById("myModal");

        // Get the button that opens the modal
        var btn = document.getElementById("myBtn");

        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];

        // When the user clicks the button, open the modal
        btn.onclick = function() {
            modal.style.display = "block";
        };

        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
            modal.style.display = "none";
        };

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        };


        function increaseCount(a, b) {
            var input = b.previousElementSibling;
            var value = parseInt(input.value, 10);
            value = isNaN(value) ? 0 : value;
            value++;
            input.value = value;
        }

        function decreaseCount(a, b) {
            var input = b.nextElementSibling;
            var value = parseInt(input.value, 10);
            if (value > 1) {
                value = isNaN(value) ? 0 : value;
                value--;
                input.value = value;
            }
        }
    </script>
</body>

</html>