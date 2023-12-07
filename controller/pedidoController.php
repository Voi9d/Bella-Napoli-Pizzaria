<?php


function loadCarrinho(){
require_once "./model/pedidoModel.php";
$pedido = new pedidoModel();
$result = $pedido->loadAll();
return $result;
}

function loadHis(){
     require_once "./model/pedidoModel.php";
     $pedido = new pedidoModel();
     $result = $pedido->loadHis();
     return $result;
     }
     

     function loadAdm(){
          require_once "./model/pedidoModel.php";
          $pedido = new pedidoModel();
          $result = $pedido->loadAllAdm();
          return $result;
    
     }
     

function getSumOfTotal(){
     require_once "./model/pedidoModel.php";
     $pedido = new pedidoModel();
     $result = $pedido->getSumOfTotal();
     return $result;
     }

function loadPizza(){
require_once "./model/pedidoModel.php";
$pedido = new pedidoModel();
$nome = $pedido->getNome();
return $nome;
}

function verificaPizza(){
require_once "./model/pedidoModel.php";
$pedido = new pedidoModel();
$nome = $pedido->verificaPizza();
}

if(isset($_POST['adicionarCarrinho'])){

    require_once "../model/ConexaoMysql.php";
    require_once "../model/pedidoModel.php";
    echo "<script src='script.js'></script>";
    $pedido = new pedidoModel();
    $result = $pedido->getQuantidade();

    if($result < 1){

     $pedido->adicionarPedido();

    }

    else{
         
         $pedido->getQuantidade();
         $usuario = $pedido->getUsuario();

         $sql = "UPDATE pedido SET quantidade = ($result + 1) WHERE usuario = '$usuario' AND nome = '$pedido->nome'";

         $db = new ConexaoMysql();
         $db->Conectar();
         $db->Executar($sql);

         $pedido->getTotal1();
    }
 
   header('location: ../cardapio.php?cod=success');


}


if(isset($_GET['b'])){

     require_once "../model/ConexaoMysql.php";
     require_once "../model/pedidoModel.php";
 
     $pedido = new pedidoModel();
     $result = $pedido->getBebidas();
 
     if($result < 1){
 
      $pedido->adicionarBebida();

      header('location: ../cardapio.php?cod=success');
 
     }
 
     else{
          
          $pedido->getBebidas();
          $usuario = $pedido->getUsuario();
 
          $sql = "UPDATE pedido SET quantidade = ($result + 1)  WHERE usuario = '$usuario' AND nome = '$pedido->nome'";
 
          $db = new ConexaoMysql();
          $db->Conectar();
          $db->Executar($sql);

         $result =  $pedido->getTotal2();
     }


  
    header('location: ../cardapio.php?cod=success');


}

if(isset($_GET['deletar'])){

     require_once "../model/ConexaoMysql.php";
     require_once "../model/pedidoModel.php";
 
     $delete = new pedidoModel();
     $delete->deleteAllFromPedido();

     header('location: ../cliente.php');

}


if(isset($_POST['pagar'])){

     require_once "../model/ConexaoMysql.php";
     require_once "../model/pedidoModel.php";
 
     $pagar = new pedidoModel();

     $pagar->pagar();

     header('location: ../index.php?su');

}
?>