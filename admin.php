<!DOCTYPE html>
<html lang="en">
  <?php 
  require_once "./controller/adminAuthenticator.php";
  require_once "./controller/usuarioController.php";
  ?>
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="./css/admin.css" />
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

        <div class="nav-button-container">
          <div class="login">
            <img src="./img/index/nav/Union.svg" alt="" />
            <h3>Admin</h3>

            <?php echo '<a class="logout" href="./controller/logoutController.php">Sair</a>';?>
          </div>
        </div>
      </div>
    </header>

    <div class="container">
      <div class="bloco">
        <h1>Vendas e lucros</h1>
        <div class="item">
          <div class="text">
            <h1>Schweppes Tônica Lata</h1>
            <p>R$ 5,50</p>
          </div>

          <div class="text">
            <p>Quantidade: 8</p>
            <p>Total: 39,90</p>
          </div>
        </div>

        <div class="item">
          <div class="text">
            <h1>Água Mineral com Gás 500ml</h1>
            <p>R$ 4,50</p>
          </div>

          <div class="text">
            <p>Quantidade: 8</p>
            <p>Total: 39,90</p>
          </div>
        </div>

        <div class="item">
          <div class="text">
            <h1>Pizza grande (Calabresa)</h1>
            <p>R$ 90,50</p>
          </div>

          <div class="text">
            <p>Quantidade: 8</p>
            <p>Total: 500,90</p>
          </div>
        </div>
      </div>
    </div>

    <div class="container">
      <div class="bloco">
        <h1>Usuarios cadastrados</h1>
        <?php 
$resultlist = loadAdmin(); 

?>

<?php foreach ($resultlist as $result) { ?>
    <div class="user">
        <div class="name">
            <img src="./img/index/nav/Union.svg" alt="" />
            <form action="./controller/usuarioController.php" method="post">
            <h4><?php echo $result['email']; ?></h4>
        </div>

        <div class="secondary">
            <h4>User</h4>
            <a href="./controller/usuarioController.php?perfil=<?php echo $result['email']; ?>">Deletar perfil</a>
            </form>
        </div>
    </div>
<?php } ?>

      </div>
    </div>
  </body>
</html>
