<?php
  include_once dirname(__DIR__, 3) . '/banco.php';

  if (isset($_POST['input'])){
    $input = $_POST['input'];
    $query = "SELECT * FROM produtoteste WHERE nome_prod LIKE '{$input}%' OR modeloProduto LIKE '{$input}%'";

    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0){?>
      
      <table class='resultadoPesquisa'>
        <thead>
          <th scope="col">ID</th>
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
              $id_prod = $row['id_prod'];
              $produto = $row['nome_prod'];
              $modelo = $row['modeloProduto'];
              $quantidade = $row['quantDisp'];
              $categoria = $row['id_categoria'];
              $status = $row['id_disponibilidade'];

              if ($status == 1) {
            ?>

          <tr>
            <td data-label='ID'><?php echo $id_prod;?></td>
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
              <button class="btnRequi" onclick="dialogv2.showModal(); setID(<?php echo $id_prod;?>);">Detalhes</button>
            </td>
          </tr>
          
          <?php
            }
          ?>

      <dialog id="dialogv2">
        <div>
          <button class="btnClose"
            class="close-dialog-btn"
            onclick="this.closest('dialog').close('close')">
            X
          </button>
          <h1><?php echo $produto?></h1>
          </div>

        <form action="/final_php/carrinho.php" method="post">

          <div class="content">
          <div class="detailsProduct">
            <p class="products">Quantidade</p>


            <div class="counter">
              <span class="down" onClick="decreaseCount(event, this)">-</span>
              <input type="text" value="1" min="1" max="99" name="quantidadeProd"/>
              <span class="up" onClick="increaseCount(event, this)">+</span>
              <?php 
                echo "<input style='display: none;' id='id_prod' name='id_prod'</input>";
              ?>
            </div>

            </div>
          </div>
          
          <div class='adicionarCarrinhoDiv'>
            <button class="btnActions" id="myBtn" type="submit">
              Enviar ao Carrinho
            </button>
          </div>

        </form>        
        </dialog>

        <?php
            }
          }
          ?>

      </tbody>
      </table>

      <?php
    } else {
      echo "<span class='wrong'>Nenhuma correspondência encontrada.</span>";
    }
?>


<script>
  var idX;
  var id_prod = document.getElementById('id_prod');

  function setID(id) {
    idX = id; 
    console.log(id);
    getID();
  }

  function getID() {
    id_prod.setAttribute("value", idX);
  }

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

.adicionarCarrinhoDiv {
  text-align: center;
}

</style>