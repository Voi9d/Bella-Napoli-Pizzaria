<?php

@session_start();

function loadId()
{
    require_once "../model/usuarioModel.php";
    $usuario = new usuarioModel();
    $result = $usuario->getId();
    return $result;
}


function loadNome()
{
    require_once "model/usuarioModel.php";
    $usuario = new usuarioModel();
    $result = $usuario->getNome();
    return $result;
}

if (isset($_POST['login'])) {

    require_once "../model/usuarioModel.php";
    $usuario = new usuarioModel();
    $usuario->Autenticar();
}

if (isset($_POST['criarConta'])) {

    require_once "../model/usuarioModel.php";
    $usuario = new usuarioModel();
    $usuario->criarConta();
}
