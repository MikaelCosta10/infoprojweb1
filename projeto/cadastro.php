<?php
require 'header_adm.php';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
        
    <title>Primeiro Cadastro</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">
     <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
     <link rel="stylesheet" type="text/css" href="css/cadastro.css">
       <style type="text/css">
        
    </style>    
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
                            <p style="font-size:150%; text-align:center;color: rgb(0, 0, 0);"><strong>CADASTRO</strong></p>
							<div class="col-xs-6">
							</div>
							
						</div>
						<hr>
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-lg-12">
								<form action="confirmacao_cadastro.php" method="POST" role="form" style="display: block;">
									<div class="form-group">
										<input type="text" name="prontuario" tabindex="1" class="form-control" placeholder="Prontuário" >
									</div>
									<div class="form-group" >
										<input type="email" name="email" tabindex="1" class="form-control" placeholder="Email" >
									</div>
									<div class="col-6 offset-2">
              
                   <select class="form-control" id="tempo" name="tipoPermissao">
                    <option value="1">Administrador</option>
                    <option value="2">Lider de Pesquisa</option>
                </select>
               
<br><hr><br>
							<div class="form-group">
										<div class="row">
											<div class="col-sm-6 col-sm-offset-3">
												<input type="submit" name="register-submit" id="register-submit" tabindex="4" class="form-control btn btn-register" value="Cadastrar">
											</div>
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







