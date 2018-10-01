<?php
require'header_lider.php';
require 'php/conect.php';
?>
 

 <html lang='pt-br' class=''>
 
  <meta charset="utf-8">
    
    <title>Grupo de Pesquisa</title>
      <body>


 
 <div class="container">
  <h1 class="page-header">Grupo de Pesquisa</h1>
  <div class="table-responsive">
    <table class="table table-striped table-bordered table-hover">
      <thead>
        <tr>
        
          <th>Nome</th>
          <th>Lider</th>
          <th>Sigla</th>
          <th>link</th>
          <th>E-mail</th>
          <th>Data de Inicio</th>
          <th>Edições</th>
        </tr>
      </thead>
      <tbody>
        <tr>
        <?php
          
     $pdo= $sql->query("SELECT grupopesquisa.id ,grupopesquisa.nomeGrupo, usuario.nome,grupopesquisa.sigla_grupo, grupopesquisa.link_lattes, grupopesquisa.email,grupopesquisa.data_criacao FROM grupopesquisa inner JOIN  usuario on grupopesquisa.lider_id = usuario.id");
  
      
      if($pdo->rowCount() > 0){
          
          foreach($pdo->fetchAll() as $usuario) {  
          echo '<tr>'; 
          echo '<td>'.$usuario['nomeGrupo'].'</td>';
          echo '<td>'.$usuario['nome'].'</td>'; 
          echo '<td>'.$usuario['sigla_grupo'].'</td>';
          echo '<td>'.$usuario['link_lattes'].'</td>';
          echo '<td>'.$usuario['email'].'</td>';
          echo '<td>'.$usuario['data_criacao'].'</td>';
          echo '<td><a href="editar.php?id='.$usuario['id'].'">Editar</a>';
          echo'</tr>';
          }
      }
            
        ?>
        </tr>
        <tr>
      </tbody>
    </table>
    
  </div>
</div>

     </body>
</html>