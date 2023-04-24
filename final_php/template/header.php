<?php
  session_start();
?>

<header>
  <a href="/home">
    <img src="/final_php/assets/images/logo.png" alt="" />
  </a>

  <div class="details">
    <img class="iconUser" src="/final_php/assets/images/iconUser.png" alt="">
    <p style='color: white;'>Olá, <?php echo $_SESSION['username']?></p>
    <p></p>

    <a href="/final_php/carrinho.php">
      <img class="iconCar" src="/final_php/assets/images/carrinho.png" alt="">
    </a>
  </div>

</header>