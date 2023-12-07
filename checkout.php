<!DOCTYPE html>
<html lang="en">
<?php
require_once "./controller/loginController.php";
require_once "./controller/usuarioController.php";
require_once "./controller/loginAuthenticator.php";
require_once "./controller/pedidoController.php";
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
             
            </div>

            <div class="endereco">
                <h3>Endereço de entrega:</h3>
                <?php
$resultlist = loadAll();
?>

<?php foreach ($resultlist as $result) { 
    echo "<p>{$result['endereco']}</p>";
} ?>
     
            </div>

            <div class="valores-container">
                <h3>Valores</h3>

                <div class="subtotal">
                    <?php 
                    $total = getSumOfTotal();
                    echo " <h4>Subtotal</h4>
                    <h4>R$ $total</h4>";

                    ?>
                   
                </div>

                <div class="taxa">
                    <h4>Taxa de entrega</h4>
                    <h4>R$ 0,00</h4>
                </div>

                <div class="total">
                <?php 
                    $total = getSumOfTotal();
                    echo " <h4>Total</h4>
                    <h4>R$ $total</h4>";

                    ?>
                </div>
            </div>

            <div class="pagamento">
                <h3>Pagamento</h3>
                <form action="./controller/pedidoController.php" method="post">
                <div class="payment-options">
                    <p>Número do cartão</p>
                    <input class="input" type="text" name="" id="" placeholder="XXXX-XXXX-XXXX-XXXX" required>
                    <p>Nome</p>
                    <input class="input" type="text" name="" id="" placeholder="Insira o nome do cartão" required>
                    <p>CVV/CVC</p>
                    <input class="input" type="text" name="" id="" placeholder="***" required>

                    <input class="button" name="pagar" type="submit" value="Efeutar pagamento">

                </div>
                </form>
            </div>
        </div>

        <div class="carrinho">

        <?php
$resultList = loadCarrinho();
foreach ($resultList as $data) {
    echo "
    <div class='item'>
        <div class='text'>
            <h1>{$data['nome']}</h1>
            <p>R$ {$data['valor']}</p>
        </div>

        <div class='text'>
            <p>Quantidade: {$data['quantidade']}</p>
            <p>Total: {$data['total']}</p>
        </div>
    </div>";
}
?>
    

        

        </div>




    </div>


</body>

</html>