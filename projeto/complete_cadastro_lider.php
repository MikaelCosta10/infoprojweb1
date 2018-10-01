
<?php         
    require 'php/conect.php';
    require 'header_lider.php';

        
$id= 0;

if(isset($_GET['id']) && empty($_GET['id'])==false){
    $id=addslashes($_GET['id']);
}

    $busca = $sql->query("SELECT * FROM usuario where id = '$id'");
    if($busca->rowCount()>0){
       $dado = $busca->fetch();
    }
    

    if(isset($_POST['nome']) && empty($_POST['nome']) && empty($_FILES['img']['name'])==false ){
     
     $img = strtolower(substr($_FILES['img']['name'],-4));
     $novo_nome = md5(time());
     $diretorio = "arquivoIMG/";  
     $pront = addslashes($_POST['prontuario']);
     $nome = addslashes($_POST['nome']);
     $email = addslashes($_POST['email']);
     $lattes = addslashes($_POST['lattes']);
     $senha = addslashes($_POST['senha']);        
    
        $id = $pdo['id'];
         move_uploaded_file($_FILES['img']['tmp_name'],$diretorio.$novo_nome);    
      
        $sql->query("UPDATE usuario SET nome ='$nome' ,email ='$email',senha ='$senha', prontuario = '$pront', img='$novo_nome', lattes = '$lattes' WHERE id ='$id'");
        
        $permissao = $pdo['permissao_id'];
        
    if($permissao == 1){
        header("Location: index_adm.php");
    }else{
        header("Location: index_lider.php");
    }
        

    }
       ?>  

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    
    <title>Complete seu Cadastro</title>

<head>


  <script src='//static.codepen.io/assets/editor/live/console_runner-ce3034e6bde3912cc25f83cccb7caa2b0f976196f2f2d52303a462c826d54a73.js'></script>
  <script src='//static.codepen.io/assets/editor/live/css_live_reload_init-e9c0cc5bb634d3d14b840de051920ac153d7d3d36fb050abad285779d7e5e8bd.js'></script>
  <meta charset='UTF-8'>
  <meta name="robots" content="noindex">
  <link  href="//static.codepen.io/assets/favicon/favicon-8ea04875e70c4b0bb41da869e81236e54394d63638a1ef12fa558a4a835f1164.ico" />
  <link rel="mask-icon" type="" href="//static.codepen.io/assets/favicon/logo-pin-f2d2b6d2c61838f7e76325261b7195c27224080bc099486ddd6dccb469b8e8e6.svg" color="#111" />
  <link rel="canonical" href="https://codepen.io/ruancarvalho/pen/apbNQb" />
    <script language="javascript" type="text/javascript" src="js/alerta.js"></script>
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css'>
<style class="cp-pen-styles"></style></head>
</head>
<body>
    <p style="font-size:200%; text-align:center;color: rgb(0, 0, 0);"><strong>Complete seu Cadastro</strong></p>


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
                                    <form method="post" role="form" style="display: block;" action="complete_cadastro.php" enctype="multipart/form-data" >
                    
                                        <div class="form-group">
                                            Foto: <input type="file"  name="img" >
                                        </div>

                                        <div class="form-group">
                                            <input type="text" name="prontuario" tabindex="1" class="form-control" placeholder="Prontuario" value="<?php echo $dado['prontuario']; ?>">
                                        </div>
                                           
                                        <div class="form-group">
                                                                          
                                        <input type="text" name="nome"  tabindex="2" class="form-control" placeholder="Nome" value="<?php echo $dado['nome']; ?>" >
                                        </div>
                                        <div class="form-group">
                                            <input type="email" name="email"  tabindex="3" class="form-control" placeholder="Email" value="<?php echo $dado['email']; ?>">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="lattes" placeholder="Curriculo Lattes"  tabindex="3" class="form-control" placeholder="Lattes"value="<?php echo $dado['lattes']; ?>">
                                        </div>
                                               <div class="form-group">
                                            <input type="password" name="senha" placeholder="senha"  tabindex="3" class="form-control" placeholder="Email"value="<?php echo $dado['senha'] ?>">
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