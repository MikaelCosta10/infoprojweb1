<?php

$alerta = false;
require 'php/conect.php';
    $usuario = NULL;

date_default_timezone_set("America/Sao_Paulo");
//$dataExpiracao = date('Y-m-d H:i:s', strtotime('+10 minute'));
$chave = $_GET["chave"];

$codBanco = $sql->query("SELECT codigo FROM codigolink WHERE codigo = '$chave'");
foreach($codBanco->fetchAll() as $usuario);
     $codigo = $usuario['codigo'];

$s = $sql->query("SELECT data FROM codigolink ");
foreach($s->fetchAll() as $usuario);
     $dataExpiracao = $usuario['data'];


// ----------------------------------------------- VALIDADE DO TEMPO ------------------------------------------------------------
$dataAtual = date('Y-m-d H:i:s');


if ($chave == $codigo && $dataExpiracao >= $dataAtual ) { //ALTERAR PARA MAIOR >



?>





<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">    
    <title>Alterar Senha</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/login.css">
       <style type="text/css">
    </style>
    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
</head>
<body>
   
<div class="container">
    	<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<div class="panel panel-login">
					<div class="panel-heading">
						<div class="row">
                             <div class="text-center mb-4">
                            <img width="300px" height="230px" src="imagens/logo.png"/>
                            <p style="font-size:200%; text-align:center;color: rgb(0, 0, 0);"><strong>ALTERAR Senha</strong></p>
							<div class="col-xs-6">
							</div>							
						</div>
						<hr>
					</div>					
						<div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                	
                                    <form   form id="alterarSenha" action="confirmacao_alteracao.php"  role="form" method="post"style="display: block;">
                                        <div class="form-group">
                                            <input type="text" name="prontuario1" tabindex="1" class="form-control"  placeholder="Prontuario">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="novaSenha1" tabindex="1" class="form-control"  placeholder="senha">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="repetirNovaSenha1"  tabindex="2" class="form-control" placeholder="Confirmar Senha">
                                        </div>

                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-sm-6 col-sm-offset-3">
                                                    <input type="submit" name="altera-submit" tabindex="3" class="form-control btn btn-login" >

                                                </div>
                                            </div>
                                        </div> 
                                    </form>
                                </div>
                            </div>
                         </div>
                        </div>
                    </div>
                </div>
             </div>
        </div>
</body>
</html>

<?php
}else{  
require 'header.php';
echo "<h1>pagina nao encontrada</h1>";


}


?>




