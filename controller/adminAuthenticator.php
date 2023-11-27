<?php

session_start();
if(!isset($_SESSION['admin'])){
  
  header('location:./index.php?cod=172');
 
 }
 
 