<!DOCTYPE html>
<html lang="en">
  
<?php
require_once "./controller/loginController.php";
?>

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Delicia Suprema</title>
  <link rel="stylesheet" href="./css/style.css" />
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

  <div class="section-container">
    <div class="section-text-container">
      <h1>Saboreie a melhor pizza da cidade em <span>Casa</span></h1>
      <p>
        Uma fatia de felicidade: leve a melhor pizza da cidade para sua casa e
        desfrute!
      </p>

      <a href="cardapio.php" class="pedido-button">Fazer pedido</a>
    </div>

    

    <div class="section-image-container">
      <img src="./img/index/section/Pizza maker-bro (1).svg" width="100%" alt="" />
    </div>
  </div>


  <div class="services-container">
    <div class="descricao">
      <h1>Culinária e serviços</h1>
      <p>Explorando os sabores do mundo e oferecendo serviços de alta qualidade: a experiência completa em culinária e serviços!</p>
      <a href="#">
        <a href="cardapio.php" class="button-cardapio">
          <h3>Cardápio</h3>
        </a>
      </a>
    </div>

    <div class="services-image">
      <img src="./img/index/section/Take Away-amico.svg" width="100%" alt="">
    </div>

  </div>

  <footer class="footer-container">
    <div class="info-logo-container">
      <img class="logo" src="./img/index/nav/Bella Napoli.svg" alt="" />
      <p>
        Na Pizzaria Bella Napoli, valorizamos a qualidade dos ingredientes.
        Nossas massas são feitas diariamente com uma mistura especial de
        farinha, fermento e amor. Nossos molhos são preparados com tomates
        frescos colhidos em nosso jardim imaginário. Os queijos são
        selecionados a dedo para garantir que cada mordida seja um deleite de
        queijo derretido.
      </p>
    </div>

    <div class="information">
      <div class="endereco">
        <div class="tittle">
          <h3>ENDEREÇO</h3>
          <div class="png-base">
            <img src="./img/index/footer/local.svg" alt="" width="16px" />
          </div>
        </div>
        <p>
          Rua da Pizza, 123<br />Bairro dos Sabores, Cidade da Gula<br />CEP:
          12345-678<br />Brasil
        </p>
      </div>

      <div class="contato">
        <div class="tittle">
          <h3>CONTATO</h3>
          <div class="png-base">
            <img src="./img/index/footer/phone.svg" alt="" width="16px" />
          </div>
        </div>
        <p>(11) 5555-5555</p>
      </div>

      <div class="horario">
        <div class="tittle">
          <h3>HORÁRIO</h3>
          <div class="png-base">
            <img src="./img/index/footer/clock.svg" alt="" width="16px" />
          </div>
        </div>
        <p>
          Segunda à sábado <br />
          11:00h - 23h
        </p>
      </div>
    </div>
  </footer>
</body>

</html>