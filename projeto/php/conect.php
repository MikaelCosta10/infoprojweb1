<?php

$dsn = "mysql:dbname=bd_infoprojweb;host=localhost";
$dbuser = "root";
$dbpass = "toor";

try{
    $sql = new PDO($dsn,$dbuser,$dbpass);
    
     
}catch(PDOException $e){
   
    echo"Falhou: ".$e->getMessage();
  
    
}

?>