<!DOCTYPE html>
<html lang="en">
<?php 
  require_once "./controller/loginController.php";
  ?>
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Delicia Suprema</title>
  <link rel="stylesheet" href="./css/cardapio.css" />
</head>

<body>

  <header class="nav-container">
    <div class="container-itens">
      <div class="nav-item-container">
        <div class="svg-icon">
        <a href="index.php">
            <img src="./img/index/nav/Bella Napoli.svg" width="200px" alt="" />
          </a>
        </div>
          <a href="index.php">Home</a>
          <a href="cardapio.php">Cardápio</a>
          <a href="index.php">Contato</a>
          <a href="index.php">Sobre</a>
      </div>

      <?php

      if (isset($_SESSION['email'])|| isset($_SESSION['admin'])) {

        $nome = loadNome();
        $linkRedirecionamento = isset($_SESSION['admin']) ? 'admin.php' : 'cliente.php';
        
        echo '<div class="nav-button-container">
                <a href="' . $linkRedirecionamento . '" class="login">
                  <img src="./img/index/nav/Union.svg" alt="" />
                  <h3>' . $nome . '</h3>
                </a>';

    echo '<a class="logout" href="./controller/logoutController.php">Sair</a>';
    
      } else {
        echo '<div class="nav-button-container">
        <a href="login.php" class="login">
          <img src="./img/index/nav/Union.svg" alt="" />
          <h3>Entrar</h3>
        </a>

        <a href="registro.php" class="registro">
          <h3>Registrar-se</h3>
        </a>';
      }

      ?>

    </div>
    </div>
  </header>

  <h1 class="cardapio-tittle" style="text-align: center;">Cardápio</h1>

  <div class="container">

    <div class="pizza-container">
      <h1 class="titulo">Pizzas</h1>
      <div class="pizza-item-container">
        <div class="bloco">
          <div class="informacoes">
            <h3>Pepperoni</h3>
            <div class="image-container">
              <img src="./img/cardapio/pizza/Pepperoni.png" width="200px" alt="">
            </div>
           <div class="price">
            <h4>A partir de R$ 37,00</h4>
            <a href="pedido.php?pizza=pepperoni"><img src="./img/cardapio/mais.svg" alt=""></a>
           </div> 
          </div>
        </div>

        <div class="bloco">
          <div class="informacoes">
            <h3>Margherita</h3>
            <div class="image-container">
              <img src="./img/cardapio/pizza/Margherita.png" width="180px" alt="">
            </div>
           <div class="price">
            <h4>A partir de R$ 37,00</h4>
            <a href="pedido.php?pizza=margherita"><img src="./img/cardapio/mais.svg" alt=""></a>
           </div> 
          </div>
        </div>

        <div class="bloco">
          <div class="informacoes">
            <h3>Quatro queijos</h3>
            <div class="image-container">
              <img src="./img/cardapio/pizza/quatro queijos.png" width="180px" alt="">
            </div>
           <div class="price">
            <h4>A partir de R$ 37,00</h4>
            <a href="pedido.php?pizza=quatro queijos"><img src="./img/cardapio/mais.svg" alt=""></a>
           </div> 
          </div>
        </div>

          <div class="bloco">
          <div class="informacoes">
            <h3>Frango com catupiry</h3>
            <div class="image-container">
              <img src="./img/cardapio/pizza/frango com catupiry.png" width="180px" alt="">
            </div>
           <div class="price">
            <h4>A partir de R$ 37,00</h4>
            <a href="pedido.php?pizza=frango com catupiry"><img src="./img/cardapio/mais.svg" alt=""></a>
           </div> 
          </div>
        </div>


        <div class="bloco">
          <div class="informacoes">
            <h3>Calabresa</h3>
            <div class="image-container">
              <img src="./img/cardapio/pizza/calabresa.png" width="200px" alt="">
            </div>
           <div class="price">
            <h4>A partir de R$ 37,00</h4>
            <a href="pedido.php?pizza=calabresa"><img src="./img/cardapio/mais.svg" alt=""></a>
           </div> 
          </div>
        </div>

      </div>

      <div class="drinks-container">
      <h1 class="titulo">Bebidas</h1>
      <div class="drinks-item-container">
        <div class="bloco">
          <div class="informacoes">
            <h3>Sprite Lata</h3>
            <h4>500ml</h4>
            <div class="image-container">
              <img src="./img/cardapio/refrigerantes/sprite 1.png" width="110px" alt="">
            </div>
           <div class="price">
            <h4>A partir de R$ 5,00</h4>
            <a href="./controller/pedidoController.php?b=Sprite Lata"><img src="./img/cardapio/mais.svg" alt=""></a>
           </div> 
          </div>
        </div>

        <div class="bloco">
          <div class="informacoes">
            <h3>Schweppes Lata</h3>
            <h4>500ml</h4>
            <div class="image-container">
              <img src="./img/cardapio/refrigerantes/sh 1.png"  width="110px" alt="">
            </div>
           <div class="price">
            <h4>A partir de R$ 5,00</h4>
            <a href="./controller/pedidoController.php?b=Schweppes Lata"><img src="./img/cardapio/mais.svg" alt=""></a>
           </div> 
          </div>
        </div>

        <div class="bloco">
          <div class="informacoes">
            <h3>Coca-Cola Lata</h3>
            <h4>500ml</h4>
            <div class="image-container">
              <img src="./img/cardapio/refrigerantes/coca 1.png" alt="" width="110px">
            </div>
           <div class="price">
            <h4>A partir de R$ 5,00</h4>
            <a href="./controller/pedidoController.php?b=Coca-Cola Lata"><img src="./img/cardapio/mais.svg" alt="" ></a>
           </div> 
          </div>
        </div>

          <div class="bloco">
          <div class="informacoes">
            <h3>Fanta Uva Lata</h3>
            <h4>500ml</h4>
            <div class="image-container">
            <img class="pizza-image" src="./img/cardapio/refrigerantes/fanta 1.png" alt="" width="110px">
            </div>
           <div class="price">
            <h4>A partir de R$ 5,00</h4>
            <a href="./controller/pedidoController.php?b=Fanta Uva Lata"><img src="./img/cardapio/mais.svg" alt=""></a>
           </div> 
          </div>
        </div>


        <div class="bloco">
          <div class="informacoes">
          <h3>Coca-Cola Zero Lata</h3>
            <h4>500ml</h4>
            <div class="image-container">
              <img src="./img/cardapio/refrigerantes/zero 1.png" width="110px" alt="">
            </div>
           <div class="price">
            <h4>A partir de R$ 5,00</h4>
            <a href="./controller/pedidoController.php?b=Coca-Cola Zero Lata"><img src="./img/cardapio/mais.svg" alt=""></a>
           </div> 
          </div>
        </div>

      </div>
      </div>

    </div>
    <?php
      if(isset($_REQUEST['cod'])){
        echo'<script>alert("Adicionado ao carrinho com sucesso!");</script>';
      }
    ?>
    


</body>

</html>