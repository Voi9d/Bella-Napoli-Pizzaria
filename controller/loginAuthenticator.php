<?php

@session_start();

$email = isset($_SESSION['admin']) ? $_SESSION['admin'] : (isset($_SESSION['email']) ? $_SESSION['email'] : null);

if(!isset($email)){
  
header('location:./index.php?cod=172');

}

