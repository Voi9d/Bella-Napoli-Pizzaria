<!DOCTYPE html>
<html lang="en">
<?php
require_once "./controller/loginController.php";
require_once "./controller/usuarioController.php";
require_once "./controller/loginAuthenticator.php";
require_once "./controller/pedidoController.php";

?>

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>
  <link rel="stylesheet" href="./css/cliente.css" />
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
          <?php $nome = loadNome(); ?>
          <h3><?php echo "$nome" ?></h3>
          <?php echo '<a class="logout" href="./controller/logoutController.php">Sair</a>'; ?>
        </div>
      </div>
    </div>
  </header>

  <div class="container">
    <div class="bloco">
      <h1>Carrinho</h1>

      <?php
$resultList = loadCarrinho();

foreach ($resultList as $data) {


    if (isset($data['nome'], $data['valor'], $data['quantidade'])) {
        echo "
        <div class='item'>
            <div class='text'>
                <h1>{$data['nome']}  {$data['observacoes']} </h1>
                <p> R$ {$data['valor']}</p>
            </div>

            <div class='text'>
                <p>Quantidade: {$data['quantidade']}</p>
                <p>Total: R$ {$data['total']}</p>
            </div>
        </div>";    
    }
    
}

if (isset($data['nome'], $data['valor'], $data['quantidade'])){
       echo "
        <div class='options'>
            <div class='options-1'>
                ";
        
        $result = getSumOfTotal();
        echo "<p style='margin-top: 12px'>Total: R$ $result</p>";
        
        echo "
                <div class='btn'>
                    <a href='./checkout.php'>Prosseguir</a>
                </div>
            </div>
        
            <div class='options-2'>
                <a href='./controller/pedidoController.php?deletar'>Limpar</a>
            </div>
        </div>";

}


?>

     

    </div>
  </div>

  <div class="container">
    <div class="bloco">
      <h1>Histórico de pedidos</h1>


      <?php 
$resultList = loadHis();

foreach ($resultList as $data) {
    echo '<div class="item">
            <div class="text">
              <h1>' . $data['nome'] . '</h1>
              <p>R$ ' . $data['valor'] . '</p>
            </div>

            <div class="text">
              <p>Quantidade: ' . $data['quantidade'] . '</p>
              <p>Total: R$ ' . $data['total'] .  ' </p>
            </div>
          </div>';
}
?>


 


    </div>
  </div>

  <div class="container">
    <div class="bloco">
      <h1>Dados da conta</h1>
      <?php
      $resultlist = loadAll();
      ?>

      <?php foreach ($resultlist as $result) { ?>
        <form action="./controller/usuarioController.php" method="post">

          <p style="margin-top: 12px">Nome</p>
          <input class="input" type="text" name="nome" id="" value="<?php echo $result['nome']; ?>" />

          <p style="margin-top: 12px">Endereço</p>
          <input class="input" type="text" value="<?php echo $result['endereco']; ?>" name="endereco" id="" />

          <p style="margin-top: 12px">Telefone:</p>
          <input class="input" type="text" value="<?php echo $result['telefone']; ?>" name="telefone" id="" />

          <p style="margin-top: 12px">Senha</p>
          <input class="input" type="password" value="<?php echo $result['senha']; ?>" name="senha" id="" />

          <input class="btn" name="alterarDados" type="submit" value="Salvar alterações">
        </form>

      <?php } ?>

    </div>
  </div>
</body>

</html>