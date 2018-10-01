<?php                
    require 'php/conect.php';
$id= 0;

if(isset($_GET['id']) && empty($_GET['id'])==false){
    $id=addslashes($_GET['id']);
}

if(isset($_POST['lider']) && empty($_POST['lider'])==false){
    $nome = addslashes ($_POST['nome']);
    $lider = addslashes($_POST['lider']);
    $sigla = addslashes($_POST['sigla']);
    $link = addslashes($_POST['link']);
    $texto = addslashes($_POST['texto']);
    $email = addslashes($_POST['email']);  
    
    $pdo=$sql->query("UPDATE grupopesquisa SET nomeGrupo ='$nome' , lider_id ='$lider', sigla_grupo = '$sigla', link_lattes='$link', texto = '$texto' ,email ='$email' WHERE id ='$id'");
    

    
    header("Location: grupo_pesquisa.php");
}

$pdo=$sql->query("SELECT * FROM grupopesquisa WHERE id ='$id'");

    
if($pdo->rowCount()>0){
        $dado = $pdo->fetch();
    }
    else{
    
    header("Location: grupo_pesquisa.php");
}
    ?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    
    <title>Editar</title>
    
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

<head><script src='//static.codepen.io/assets/editor/live/console_runner-ce3034e6bde3912cc25f83cccb7caa2b0f976196f2f2d52303a462c826d54a73.js'></script><script src='//static.codepen.io/assets/editor/live/css_live_reload_init-e9c0cc5bb634d3d14b840de051920ac153d7d3d36fb050abad285779d7e5e8bd.js'></script><meta charset='UTF-8'><meta name="robots" content="noindex"><link  href="//static.codepen.io/assets/favicon/favicon-8ea04875e70c4b0bb41da869e81236e54394d63638a1ef12fa558a4a835f1164.ico" /><link rel="mask-icon" type="" href="//static.codepen.io/assets/favicon/logo-pin-f2d2b6d2c61838f7e76325261b7195c27224080bc099486ddd6dccb469b8e8e6.svg" color="#111" /><link rel="canonical" href="https://codepen.io/ruancarvalho/pen/apbNQb" />

<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css'>
<style class="cp-pen-styles"></style></head>
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <img width="150px" height="100px" src="imagens/logo.png"/>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Pagina Inicial<span class="sr-only">(current)</span></a>
      </li>
  
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Cadastros
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="grupo_pesquisa.php">Cadastrar Pesquisa</a>
          <a class="dropdown-item" href="#">Cadastrar Equipamentos</a>
        </div>
      </li>
    </ul>
   
  </div>
   <a href="php/sairphp.php">Sair</a>
</nav>
   <p style="font-size:200%; text-align:center;color: rgb(0, 0, 0);"><strong>Editar Grupo de Pesquisa</strong></p>


    	<div class="row">
			                 <div class="text-center mb-4">
							<div class="col-xs-6">
							</div>
							
						</div>
						<hr>
					</div>
					
				<div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <form method="post" role="form" style="display: block;">
                                        <div class="form-group">
                                            <input type="text" name="nome" tabindex="1" class="form-control" placeholder="Nome" value="<?php echo $dado['nomeGrupo'] ?>">
                                        </div>
                                           
                                        <div class="form-group">
                                         <select name="lider" class="form-control">       
                                            <?php 
                                                   $pdo=$sql->query("SELECT grupopesquisa.id,grupopesquisa.nomeGrupo, usuario.nome,grupopesquisa.sigla_grupo, grupopesquisa.link_lattes, grupopesquisa.email,grupopesquisa.texto FROM grupopesquisa inner JOIN  usuario on grupopesquisa.lider_id = usuario.id ");
                                                   
                                                 

                                                   if($pdo->rowCount()>0){
                                                      $dado = $pdo->fetch();
                                                      }
                                                     
                                                 ?> 
                                                 <?php
                                             
                                                $se= $sql->query("select id,nome from usuario");
                                             foreach($se as $b)                                      
                                                                                                                                         
                                            echo'<option value="'.$b['id'] .'" >'.$b['nome'].'</option>';
                                             echo $lider;
                                         ?> 
                                          </select>
                                            
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="sigla"  tabindex="3" class="form-control" placeholder="Sigla do Grupo" value="<?php echo $dado['sigla_grupo'] ?>">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="link"  tabindex="4" class="form-control" placeholder="Link" value="<?php echo $dado['link_lattes'] ?>">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="email"  tabindex="5" class="form-control" placeholder="E-mail" value="<?php echo $dado['email'] ?>">
                                        </div>
                                              <div class="form-group">
                                            <input type="text" name="texto"  tabindex="7" class="form-control" placeholder="Texto" value="<?php echo $dado['texto'] ?>" >
                                        </div>
                                        <div >
                                        <input type="submit" value = "Salvar">
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