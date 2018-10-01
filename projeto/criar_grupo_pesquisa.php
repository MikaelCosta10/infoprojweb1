<?php  
    require'header_adm.php';
    require 'php/conect.php';
    date_default_timezone_set("America/Sao_Paulo");

if(isset($_POST['nome']) && empty($_POST['nome'])==false){
    $nome = addslashes ($_POST['nome']);
    $lider = addslashes($_POST['lider']);
    $sigla = addslashes($_POST['sigla']);
    $dataAtual = date('Y-m-d H:i:s');
    $situacao_id = NULL;
    
//INSERT INTO `grupopesquisa`( `nomeGrupo`, `sigla_grupo`, `data_criacao`, `lider_id`, `situacao_id`) VALUES ("get", "gt", "2018-09-30 00:41:21" , 1, 1)


    $insereBanco = $sql->query("INSERT INTO `grupopesquisa`( `nomeGrupo`, `sigla_grupo`, `data_criacao`, `lider_id`, `situacao_id`) VALUES ('$nome', '$sigla', '$dataAtual' , 1, 1 )");

    //$e=$sql->query("INSERT INTO grupopesquisa SET nomeGrupo ='$nome' , lider_id ='$lider', sigla_grupo = '$sigla', data_criacao = NOW()");
}

   ?>
                                        
<!DOCTYPE html>
<html lang="pt-br">
<body>
           <p style="font-size:200%; text-align:center;color: rgb(0, 0, 0);"><strong>Criar Grupo de Pesquisa</strong></p>

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
                                          
                                                                               
                                            <input type="text" name="nome" tabindex="1" class="form-control" placeholder="Nome">
                                        </div>
                                           
                                        <div class="form-group">
                                            <input type="text" name="sigla"  tabindex="2" class="form-control" placeholder="Sigla do Grupo">
                                        </div>
                                        
                                        <div class="form-group">
                                           <select name="lider" class="form-control">       
                                            <?php 
                                                   $pdo=$sql->query("SELECT usuario.nome,grupopesquisa.lider_id FROM grupopesquisa inner JOIN  usuario on grupopesquisa.lider_id = usuario.id ");
                                                   
                                                 

                                                   if($pdo->rowCount()>0){
                                                      $dado = $pdo->fetch();
                                                      }
                                                     
                                                 ?> 
                                                 <?php
                                             
                                                $se= $sql->query("select id,nome from usuario");
                                             foreach($se as $b)                                      
                                                                                                                                   
                                            echo'<option value="'.$b['id'] .'" >'.$b['nome'].'</option>';                                               
                                         ?> 
                                          </select>
                                        </div>
                                           <div >
                                            <input type="submit" value = "Salvar">
                                        </div>
                                        </form>
                                </div>
                            </div>
                </div>
    </body>
</html>
                      