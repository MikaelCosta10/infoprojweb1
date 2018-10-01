<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    
    <title>Login</title>
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
                            <p style="font-size:200%; text-align:center;color: rgb(0, 0, 0);"><strong>LOGIN</strong></p>
							<div class="col-xs-6">
							</div>
							
						</div>
						<hr>
					</div>
					
<?php
                        
    require 'php/conect.php';
    session_start();

    if(empty($_POST['prontuario'])==false){
    $pront= addslashes($_POST['prontuario']);
    $senha = addslashes($_POST['senha']);
 

            $consultaSenha = $sql->query("SELECT senha_nova FROM usuario WHERE prontuario = '$pront'");
            if($consultaSenha->rowCount() > 0){
            foreach($consultaSenha->fetchAll() as $dado);
            $senha_nova = $dado['senha_nova'];   

            if(!empty($pront) && !empty($senha)){
            
                $pdo= $sql->prepare("SELECT * FROM usuario WHERE prontuario = :prontuario  AND senha = :senha ");
                $pdo->bindValue(":prontuario",$pront);
                $pdo->bindValue(":senha",$senha);
                $pdo->execute();        
                
         if($pdo->rowCount() > 0){  

            $pdo = $pdo->fetch();
            $_SESSION['prontuario'] = $pdo['id'];

            if($pdo['permissao_id']==1){
        header("Location: index_adm.php");
                exit;             
        }else{
                 header("Location: index_lider.php");
                    exit;        
        }

         }else{
                ?>
       <div class="alert alert-danger">Prontuario ou senha incorretos</div>
        <?php
            }

        }else{            
         ?>
       <div class="alert alert-danger">Usuário não existente </div>
        <?php      
            }

    

 
}
}


    ?>					<div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <form  method="POST" role="form" style="display: block;">
                                        <div class="form-group">
                                            <input type="text" name="prontuario" tabindex="1" class="form-control"  placeholder="Prontuário">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="senha"  tabindex="2" class="form-control" placeholder="Senha">
                                        </div>

                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-sm-6 col-sm-offset-3">
                                                    <input type="submit"  tabindex="3" class="form-control btn btn-login" >
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="text-center">
                                                        <a href="recuperar-senha.php" tabindex="5" class="forgot-password">Recuperar Senha</a>
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