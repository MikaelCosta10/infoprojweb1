<?php   
	session_start();
    require 'conect.php';
   
unset($_SESSION['prontuario']);
unset($_SESSION['senha']);
	session_destroy();


header("Location: ../index.php");
exit;
    ?>