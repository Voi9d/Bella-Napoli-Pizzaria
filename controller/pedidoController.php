<?php


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

    $pedido = new pedidoModel();
    $result = $pedido->getQuantidade();

    if($result < 1){

     $pedido->adicionarPedido();

    }

    else{
         
         $pedido->getQuantidade();
         $usuario = $pedido->getUsuario();

         $sql = "UPDATE pedido SET quantidade = ($result + 1)  WHERE usuario = '$usuario' AND nome = '$pedido->nome'";

         $db = new ConexaoMysql();
         $db->Conectar();
         $db->Executar($sql);
    }
 
   header('location: ../cardapio.php');

}


if(isset($_POST['adicionarCarrinho'])){




}