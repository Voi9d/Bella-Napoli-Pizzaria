<?php
require_once "./controller/loginAuthenticator.php";
require_once "./controller/loginController.php";
require_once "./controller/pedidoController.php";

verificaPizza();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/pedido.css">
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

            if (isset($_SESSION['email']) || isset($_SESSION['admin'])) {

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

    <div class="container">
        <div class="pizza">
            <?php 
            $nome = loadPizza();
            $_SESSION['pizza'] = $nome;
            ?>
            <h1><?php echo "$nome" ?></h1>
            <div class="image-container">
                <img src="./img/cardapio/pizza/<?php echo "$nome" ?>.png" alt="">
            </div>

            <h3>A autêntica Pizza <?php echo "$nome" ?> traz o sabor italiano clássico em cada pedaço. Com massa fina, molho de tomate fresco, queijo mozzarella e manjericão, esta pizza é a simplicidade em sua forma mais deliciosa. Experimente a tradição em cada mordida!</h3>

        </div>

        <div class="pizza-options">
            <p>Selecionar tamanho</p>

            <form action="./controller/pedidoController.php" method="post">
                <select name="tamanho" class="input">
                    <option value="Pequena">Pequena</option>
                    <option value="Média">Média</option>
                    <option value="Grande">Grande</option>
                </select>

                <p>Observações</p>

                <input class="input" type="text" name="observacao" id="" placeholder="Escreva uma observação (opcional)">

                <input type="submit" name="adicionarCarrinho" class="btn" value="Adicionar ao carrinho">

            </form>


        </div>

    </div>

</body>

</html>