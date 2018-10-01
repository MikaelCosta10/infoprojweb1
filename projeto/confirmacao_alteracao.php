<?php
require 'php/conect.php';
if (isset($_POST['prontuario1']) && empty($_POST['prontuario1']) == false)  {
	

$pron =addslashes($_POST['prontuario1']);
$novaSenha1 = $_POST["novaSenha1"];
$repetirNovaSenha1 = $_POST["repetirNovaSenha1"];

 $pdo= $sql->query("SELECT * FROM usuario WHERE prontuario = '$pron' ");
         
         if($pdo->rowCount() > 0){  

            $m = $pdo->fetchAll();
            foreach($m as $dados);
             $pront = $dados['prontuario'];
             $senhaantiga = $dados['senha'];
}

if ($pront == true ) {
	$alterarsenha = $sql->query("UPDATE usuario SET senha_nova = '$senhaantiga', data_senha = now() WHERE prontuario = '$pront'");

$enviaBanco = $sql->query("UPDATE usuario SET senha = '$novaSenha1' WHERE prontuario = '$pront' "); 
  header("Location: header.php");
}
    
}



?>