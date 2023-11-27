<!DOCTYPE html>
<html lang="en">
<?php
require_once "./controller/loginController.php";
require_once "./controller/loginAuthenticator.php";

?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/checkout.css">
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
            
            $nome = loadNome();
        $linkRedirecionamento = isset($_SESSION['admin']) ? 'admin.php' : 'cliente.php';
        
        echo '<div class="nav-button-container">
                <a href="' . $linkRedirecionamento . '" class="login">
                  <img src="./img/index/nav/Union.svg" alt="" />
                  <h3>' . $nome . '</h3>
                </a>';

    echo '<a class="logout" href="./controller/logoutController.php">Sair</a>';
              
            ?>


        </div>
    </header>

    <h1 class="tittle">Finalize seu pedido</h1>
    <div class="container">

        <div class="payment">
            <div class="option">
                <h3 class="verde">Entrega</h3>
                <h3>Retirar</h3>
            </div>

            <div class="endereco">
                <h3>Endereço de entrega:</h3>
                <p>123 Rua das Flores Bairro da Alegria Cidade Feliz, Estado da Imaginação CEP: 12345-678 </p>
            </div>

            <div class="valores-container">
                <h3>Valores</h3>

                <div class="subtotal">
                    <h4>Subtotal</h4>
                    <h4>R$ 300,00</h4>
                </div>

                <div class="taxa">
                    <h4>Taxa de entrega</h4>
                    <h4>R$ 0,00</h4>
                </div>

                <div class="total">
                    <h4>Total</h4>
                    <h4>R$ 300,00</h4>
                </div>
            </div>

            <div class="pagamento">
                <h3>Pagamento</h3>
                <div class="payment-options">
                    <p>Número do cartão</p>
                    <input class="input" type="text" name="" id="" placeholder="XXXX-XXXX-XXXX-XXXX">
                    <p>Nome</p>
                    <input class="input" type="text" name="" id="" placeholder="Insira o nome do cartão">
                    <p>CVV/CVC</p>
                    <input class="input" type="text" name="" id="" placeholder="***">

                    <input class="button" type="submit" value="Efeutar pagamento">

                </div>
            </div>
        </div>

        <div class="carrinho">

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
                    <h1>Schweppes Tônica Lata</h1>
                    <p>R$ 5,50</p>
                </div>

                <div class="text">
                    <p>Quantidade: 8</p>
                    <p>Total: 39,90</p>
                </div>
            </div>

        </div>




    </div>


</body>

</html>