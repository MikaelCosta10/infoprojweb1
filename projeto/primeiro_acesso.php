<!DOCTYPE html>
<html lang="br">
<head>
    <meta charset="utf-8">
    
    <title>Primeiro Cadastro</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/primeiro_acesso.css">

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
                            <p style="font-size:150%; text-align:center;color: rgb(0, 0, 0);"><strong>CADASTRO PRIMEIRO ACESSO</strong></p>
							<div class="col-xs-6">
							</div>
							
						</div>
						<hr>
					</div>
<?php
require 'php/conect.php';
session_start();

if(isset($_POST['prontuario']) && empty($_POST['prontuario']) == false)
{
    $nome = addslashes($_POST['prontuario']);
    $email = addslashes($_POST['email']);
    $senha = addslashes($_POST['senha']);
    if(!empty($nome) && !empty($email) && !empty($senha)){        
    $pdo = $sql->query("INSERT INTO usuario SET prontuario='$nome', email='$email',senha ='$senha' , permissao_id = 1 "); 
         header("Location: login.php");
}else{
         ?>
         <div class="alert alert-danger">Preencha todos os campos</div>
        <?php
    }
   
   
}
?>
					<div class="panel-body">
						<div class="row">
							<div class="col-lg-12">
								<form   method="post"  role="form" style="display: block;">
									
									<div class="form-group">
										<input type="text" name="prontuario" id="prontuario" tabindex="1" class="form-control" placeholder="Prontuário">
									</div>
									<div class="form-group">
										<input type="email" name="email" id="email" tabindex="1" class="form-control" placeholder="Email" value="">
									</div>
									<div class="form-group">
										<input type="password" name="senha" id="password" tabindex="2" class="form-control" placeholder="Senha">
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-sm-6 col-sm-offset-3">
												<input type="submit" name="register-submit" id="register-submit" tabindex="4" class="form-control btn btn-register" value="Cadastrar">
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
