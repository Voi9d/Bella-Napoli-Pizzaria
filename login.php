<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Fazer login</title>
  <link rel="stylesheet" href="./css/login.css" />
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

    </div>
    </div>
  </header>


  <div class="item-container">

    <img class="chef" src="./img/login/Pizza maker-pana.svg" alt="" width="500px" />

    <div class="login-container">
      <h1>Fazer login</h1>
      <form method="post" action="./controller/loginController.php">
        <input class="input" name="email" type="text" placeholder="E-mail">
        <input class="input" name="senha" type="password" placeholder="Senha">
        <input class="input-btn" name="login" type="submit" value="Entrar">
      </form>

      <?php

      if (isset($_GET['cod'])) {
        $cod = $_GET['cod'];
        if ($cod = '171') {
          echo '<p style="color: red;">Login invalido</p>';
        }
      }

      ?>

      <p>Novo por aqui? <a href="registro.php">Crie uma conta</a></p>

    </div>


  </div>

</body>

</html>