<?php 


function loadAll(){
require_once "./model/usuarioModel.php";
$usuario = new usuarioModel();
$resultlist = $usuario->loadAll();

return $resultlist;

}


function loadAdmin(){
    require_once "./model/usuarioModel.php";
    $usuario = new usuarioModel();
    $resultlist = $usuario->loadAdmin();
    
    return $resultlist;
    
    }
    


if(isset($_POST['alterarDados'])){

    require_once "../model/usuarioModel.php";

    $usuario = new usuarioModel();
    $usuario->alterarDados();

    header('location:../cliente.php?cod=sucess');


}


if(isset($_GET['perfil'])){

    require_once "../model/usuarioModel.php";

    $usuario = new usuarioModel();
    $usuario->deletar();

    header('location:../admin.php?cod=sucess');


}