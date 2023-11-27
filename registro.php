<!DOCTYPE html>
<?php  
 require_once "./controller/loginController.php";
?>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Fazer login</title>
    <link rel="stylesheet" href="./css/registro.css" />
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
      <img
        class="chef"
        src="./img/registro/Pizza sharing-amico.svg"
        alt=""
        width="500px"
      />

      <div class="login-container">
        <h1>Registrar-se</h1>
        <form method="post" action="./controller/loginController.php">
          <input class="input" name="nome" type="text" placeholder="Nome" />
          <input class="input" name="telefone" type="text" placeholder="Telefone" />
          <input class="input" name="endereco" type="text" placeholder="Endereço" />
          <input class="input" name="email" type="text" placeholder="E-mail" />
          <input class="input" name="senha" type="password" placeholder="Senha" />
          <input class="input-btn" name="criarConta" type="submit" value="Criar conta" />
        </form>
      </div>
    </div>
  </body>
</html>
