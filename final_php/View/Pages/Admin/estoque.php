<?php
    include_once dirname(__DIR__, 3) . '/banco.php';
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/final_php/assets/template.css">
    <link rel="stylesheet" href="/final_php/assets/global.css">
    <link rel="stylesheet" href="/final_php/assets/estoque.css">
    <title>Estoque</title>
</head>

<body>
    <?php include dirname(__DIR__, 3) . "/template/header.php"; ?>
    <?php include dirname(__DIR__, 3) . "/template/aside.php"; ?>
    <?php include dirname(__DIR__, 3) . "/template/footer.php"; ?>

    <main class="main">
        <div class="container">
            <table>
                <div class="title-box">
                    <h1 class="title"> Estoque</h1>
                    <span class='search'>
                        <a href="./pesquisaItem.php">
                            <img src="/final_php/assets/images/iconSearch.png" class="searchIcon">
                        </a>
                    </span>
                </div>

                <thead>
                    <tr>
                        <th scope="col">Produto</th>
                        <th scope="col">Modelo</th>
                        <th scope="col">Marca</th>
                        <th scope="col">Quantidade</th>
                        <th scope="col">Status</th>
                        <th scope="col">Categoria</th>
                        <th colspan="2"> Opções</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    $sql_consulta = mysqli_query($conn, "SELECT * FROM produtoteste");
                    $total = mysqli_num_rows($sql_consulta);
                    while ($linhas = mysqli_fetch_array($sql_consulta)) { ?>

                    <tr class="tr">
                        <td data-label="Produto"><?= $linhas[0] ?></td>
                        <td data-label="Modelo"><?= $linhas[7] ?></td>
                        <td data-label="Categoria">
                            <?php 
                                $consulta_marca = mysqli_query($conn, "SELECT * FROM marca WHERE id_marca = '$linhas[6]'");

                                while ($categoria = mysqli_fetch_array($consulta_marca)) {
                                    echo $categoria['descricao'];
                            }
                            ?>
                        </td>
                        <td data-label="Quantidade"><?= $linhas[1] ?></td>
                        <td data-label="Status" class="status">
                            <?php                         
                            switch($linhas[3]) {
                                case 1:
                                    echo "<div class='radius statusGreen'></div>";
                                    break;
                                case 2:
                                    echo "<div class='radius statusRed'></div>";
                                    break;
                                case 3:
                                    echo "<div class='radius statusYellow'></div>";
                                    break;
                                case 4:
                                    echo "<div class='radius statusGray'></div>";
                                    break;
                                default:
                                    echo "<div class='radius statusGray'></div>";
                            }
                        ?>
                        </td>
                        <td data-label="Categoria">
                            <?php 
                            $consulta_categoria = mysqli_query($conn, "SELECT * FROM categorias WHERE id_categoria = '$linhas[2]'");

                            while ($categoria = mysqli_fetch_array($consulta_categoria)) {
                                echo $categoria['descricao'];
                            }
                        ?>
                        </td>
                        <td data-label="Ação">
                            <!-- <img class="iconEdit" src="/final_php/assets/images/iconEdit.png" alt="icone de edit" id="myBtn"> -->

                            <form method="POST" action="atualizarEstoque.php?id_prod=<?php echo $linhas[9] ?>">
                                <button type="submit">
                                    <img src="/final_php/assets/images/iconDelete.png" alt="icone excluir"
                                    onclick="return confirm('Deseja remover esse produto do estoque?')">
                                </button>
                                </form>
                        </td>

                        <td>
                            <a href="./estoqueAtualizar.php?id_prod=<?= $linhas['id_prod'] ?>">
                                <img src="/final_php/assets/images/iconEdit.png">
                            </a>
                        </td>
                    </tr>

                    <?php } ?>
                </tbody>

                <dialog id="dialogv2">
                    <header>
                        <button class="btn" class="close-dialog-btn" onclick="this.closest('dialog').close('close')">
                            X
                        </button>
                        <!-- <h1>Nome do produto</h1> onclick="addProd.showModal()" -->
                    </header>

                    <div class="content">
                        <div class="detailsProduct">
                            <p className="products">produto </p>

                            <div class="counter">
                                <span class="down" onClick="decreaseCount(event, this)">-</span>
                                <input type="text" value="1" />
                                <span class="up" onClick="increaseCount(event, this)">+</span>
                            </div>

                            <div class="custom-checkbox">
                                <input type="radio" id="radio_1" name="avaliacao" id="avaliacao_checkbox" value="10">
                                <label for="radio_1"></label>
                            </div>
                        </div>
                        <div style="
            display: flex;
            justify-content: center;
            ">
                            <button class="btn">Remover</button>

                        </div>
                </dialog>

                <dialog id="addProd">
                    <header>
                        <button class="btn" class="close-dialog-btn" onclick="this.closest('dialog').close('close')">
                            X
                        </button>
                        <h1>Nome do produto</h1>
                    </header>

                    <div class="content">

                        <div class="detailsProduct">
                            <p className="products">produto </p>

                            <div class="counter">
                                <span class="down" onClick="decreaseCount(event, this)">-</span>
                                <input type="text" value="1" />
                                <span class="up" onClick="increaseCount(event, this)">+</span>
                            </div>

                            <div class="custom-checkbox">
                                <input type="radio" id="radio_1" name="avaliacao" id="avaliacao_checkbox" value="10">
                                <label for="radio_1"></label>
                            </div>
                        </div>
                        <div style=" display: flex; justify-content: center; ">
                            <button class="btn">Adicionar</button>
                        </div>

                    </div>
                </dialog>
            </table>

            <div id="addProdEstoque" class="modal">
                <div class="modal-content">
                    <span class="close">&times;</span>
                    <h1>aaaaaa</h1>
                    <div class="content">
                        <div class="detailsProduct">
                            <p className="products">Caneta Bic (Caixa)</p>

                            <div class="custom-checkbox">
                                <input type="radio" id="radio_1" name="avaliacao" id="avaliacao_checkbox" value="10">
                                <label for="radio_1"></label>
                            </div>
                        </div>
                    </div>

                    <div class="btnModal">
                        <button class="btn">Adicionar</button>
                    </div>
                </div>
            </div>

            <script>
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
    </main>
</body>

</html>

<style>
.btnRequi {
    background: #fff;
    color: rgb(79, 0, 106);
    padding: 0.4rem;
    border: 0.2rem solid rgb(79, 0, 106);
    border-radius: 0.5rem;
    transition: 0.5s;
}

.btnRequi:hover {
    background-color: rgb(79, 0, 106);
    color: #fff;
}

dialog {
    font-size: 1rem;
    margin: auto;
    box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1),
        0 10px 10px -5px rgba(0, 0, 0, 0.04);
    width: 100%;
    background: #f4f4f4;
    border-radius: 3px;
    position: relative;
    width: 300px;
    max-width: 100%;
    border: none;
    padding: 0;
}

dialog header {
    background: #cccccc;
    padding: 0.5em;
    text-align: right;
    border-radius: 3px 0 0 3px;
}

dialog p {
    padding: 1em;
}

.close-dialog-btn {
    border-radius: 100%;
    border: none;
    padding: 0.5em;
    width: 30px;
    height: 30px;
}

dialog::backdrop {
    backdrop-filter: blur(15px);
}

.counter {
    width: 100px;
    margin: auto;
    display: flex;
    align-items: center;
    justify-content: center;
}

.counter input {
    width: 25px;
    border: 0;
    line-height: 15px;
    font-size: 15px;
    text-align: center;
    background: #060552;
    color: #fff;
    appearance: none;
    outline: 0;
}

.counter span {
    display: block;
    font-size: 25px;
    padding: 0 10px;
    cursor: pointer;
    color: #060552;
    user-select: none;
}
</style>