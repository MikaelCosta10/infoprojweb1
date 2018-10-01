<?php

require 'header.php';
require 'php/conect.php';
session_start();

$buscaUsuario= $sql->query("SELECT * FROM usuario");
if($buscaUsuario->rowCount()==0)
{ 
          header("Location: primeiro_acesso.php");
}

if(isset($_GET['id']) && empty($_GET['id'])==false){
    $id=addslashes($_GET['id']);
}

	$buscaGrupoPesquisa = $sql->query("SELECT nomeGrupo, sigla_grupo FROM grupopesquisa");
        if($buscaGrupoPesquisa->rowCount()>0){
       $dado = $buscaGrupoPesquisa->fetch();
    }

   /* if(isset($_POST['nome']) && empty($_POST['nome']) == false ){
  	 $sigla = addslashes($_POST['sigla_grupo']);
     $nome = addslashes($_POST['nomeGrupo']);
     $img = addslashes($_POST['img_id']);
     $texto = addslashes($_POST['texto']);
}*/
?>   

<!DOCTYPE html>
<html>
<head>
<title>Pagina Inicial</title>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript" src="pagina_geral.css"></script>
</head>
<body>
<div class="container mt-5 mb-5">
	<div class="row">
<div class="img">
		<img src="imagens/peoples.jpg" class="img-fluid" alt="Responsive image">
	</div>
</div>
<div class="container mt-5 mb-5">
	<div class="row">
		<div class="col-md-6 offset-md-3">

			<h1 align="center">Grupo de Pesquisa</h1>
			<br>
			<br>
			<br>
			<ul class="timeline"> 
				
				<li> <?php 
if ($buscaGrupoPesquisa->rowCount() == 0) {
	echo "Desculpe, mas não há nenhum grupo de pesquisa cadastrado ou ativo. Entre em contato com seu líder de pesquisa ou administrador para maiores informações.";

// CRIA UM ARRAY E O EXIBE.
	
 }else{ 

 	while ($linha = $buscaGrupoPesquisa->fetch(PDO::FETCH_ASSOC)) {
    //echo " {$linha['nomeGrupo']} -  {$linha['sigla_grupo']}<br /> <br /> <br /> ";

        ?>        			
        			<ul>
        			<li>
					<a><?php echo " {$linha['nomeGrupo']} -  {$linha['sigla_grupo']}<br/>" ?> <a href="">Ver Mais</a></a>
					</li></ul>					
				</li>				
			</ul>
		</div>
	</div>
</div>
</body>
</html>

<?php
}
}
?>