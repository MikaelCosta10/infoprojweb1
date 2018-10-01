<?php
require "php/conect.php";
require "header_lider.php";

$ide = $_GET['id'];
		
$buscaGrupoPesquisa = $sql->query("SELECT * FROM grupopesquisa where id = '$ide'");
        /*if($buscaGrupoPesquisa->rowCount()>0){
       $dado = $buscaGrupoPesquisa->fetch();
    }*/

while ($linha = $buscaGrupoPesquisa->fetch(PDO::FETCH_ASSOC)) {
    //echo " {$linha['nomeGrupo']} -  {$linha['sigla_grupo']}<br /> <br /> <br /> ";

    if ($linha['situacao_id'] == "1") {
    	$situacao = "Ativo";
    }
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
		
	</div>
</div>
<div class="container mt-5 mb-5">
	<div class="row">
		<div class="col-md-6 offset-md-3">

			<h1 align="center">Informações do grupo de pesquisa</h1>
			<br>
			<br>
			<br>
			<ul class="timeline"> 

        			<ul>
        			<li>
					<h1> <?php echo " {$linha['sigla_grupo']} -{$linha['nomeGrupo']} - I.P  "?></h1>
					</li></ul>

					<ul>
        			<li>
					<a></a>Logo: <?php echo " {$linha['img_id']}"?></a>
					</li></ul>

        			<ul>
        			<li>
					<a>Situação do grupo: <?php echo "$situacao"?> </a>
					</li></ul>

					<ul>
        			<li>
					<a>Data de formação: <?php echo "{$linha['data_criacao']} "?> </a>
					</li></ul>
					
					<ul>
        			<li>
					<a>Líder do grupo: <?php echo "{$linha['lider_id']}"?> </a>
					</li></ul>

					<ul>
        			<li>
					<a>Sigla do grupo: <?php echo "{$linha['sigla_grupo']}"?> </a>
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
?>
