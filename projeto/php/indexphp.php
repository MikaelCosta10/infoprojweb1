<?php
require 'conect.php';
session_start();
if(empty($_SESSION['prontuario'])){
$pront = $_SESSION['prontuario'];
$senha = $_SESSION['senha'];    
header("Location: ../index.php");
    exit;
}
?>
