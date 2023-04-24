<?php
  include_once dirname(__DIR__, 3) . '/banco.php';

  if (isset($_POST['input'])){
    $input = $_POST['input'];
    $query = "SELECT * FROM produtoteste WHERE nome_prod LIKE '{$input}%' OR modeloProduto LIKE '{$input}%'";

    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0){?>
      
      <table class='resultadoPesquisa'>
        <thead>
          <th scope="col">Produto</th>
          <th scope="col">Modelo</th>
          <th scope="col">Quantidade</th>
          <th scope="col">Categoria</th>
          <th scope="col">Status</th>
          <th scope="col">Ação</th>
        </thead>

        <tbody>
          <?php
            while($row = mysqli_fetch_assoc($result)) {
              $produto = $row['nome_prod'];
              $modelo = $row['modeloProduto'];
              $quantidade = $row['quantDisp'];
              $categoria = $row['id_categoria'];
              $status = $row['id_disponibilidade'];
              ?>

          <tr>
            <td data-label="Produto"><?php echo $produto;?></td>
            <td data-label="Modelo"><?php echo $modelo;?></td>
            <td data-label="Quantidade"><?php echo $quantidade;?></td>
            <td data-label="Categoria">                        
              <?php 
                $consulta_categoria = mysqli_query($conn, "SELECT * FROM categorias WHERE id_categoria = '$categoria'");

                while ($categorias = mysqli_fetch_array($consulta_categoria)) {
                    echo $categorias['descricao'];
                }
              ?>
            </td>
            <td data-label="Status">
              <?php
                switch($status) {
                  case 1:
                      echo "<div class='radius statusGreen'></div>";
                      break;
                  case 2:
                      echo "<div class='radius statusRed'></div>";
                      break;
                  case 3:
                      echo "<div class='radius statusYellow'></div>";
                      break;
                  default:
                      echo "<div class='radius statusGray'></div>";
                }
              ?>
            </td>
            <td data-label="Ação">
              <button class="btnRequi" onclick="dialogv2.showModal()">Detalhes</button>
            </td>
          </tr>

            <?php
          }
            
          ?>

          <?php
            }
          ?>
        </tbody>
      </table>

      <dialog id="dialogv2">
        <div>
          <button class="btnClose"
            class="close-dialog-btn"
            onclick="this.closest('dialog').close('close')">
            X
          </button>
          <h1><?php echo $produto?></h1>
          </div>

        <div class="content">
          <div class="detailsProduct">
            <p className="products"><?php echo $produto?> </p>

            <div class="counter">
              <span class="down" onClick="decreaseCount(event, this)">-</span>
              <input type="text" value="1" />
              <span class="up" onClick="increaseCount(event, this)">+</span>
            </div>

            <div class="custom-checkbox">
              <input type="radio" id="radio_1" name="avaliacao"
                id="avaliacao_checkbox" value="10">
              <label for="radio_1"></label>
            </div>
          </div>
          
          <div >
            <!-- <button class="btn">Voltar</button> -->
            <button class="btn">Requisitar</button>

          </div>
        </dialog>

      <?php
    } else {
      echo "<span class='wrong'>Nenhuma correspondência encontrada.</span>";
    }
?>

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
color: #fff;}
  dialog {
    font-size: 1rem;
    margin: auto;
    box-shadow: 0 20px 25px -5px rgb(0 0 0 / 10%), 0 10px 10px -5px rgb(0 0 0 / 4%);
    width: 30rem;
    background: #f4f4f4;
    border-radius: 3px;
    position: relative;
    /* width: 300px; */
    /* max-width: 100%; */
    border: none;
    padding: 0;
    height: 20rem;
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


.btnClose{
  background-color: rgb(79, 0, 106);
    color: #fff;
    padding: 0.4rem;
    cursor: pointer;
}
</style>