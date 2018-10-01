<?php
require 'php/conect.php';
    
session_start();
if(empty($_SESSION['prontuario'])){
$pront = $_SESSION['prontuario'];
$senha = $_SESSION['senha'];    
header("Location: index.php");
    exit;
}

$id = $_SESSION['prontuario'];


$pdo = $sql->prepare("SELECT * FROM usuario WHERE id = '$id' ");
$pdo->execute();

if($pdo->rowCount()> 0){
    
    $pdo = $pdo->fetch();
    $nome = $pdo['nome'];
    $img = $pdo['img'];
}else{
    header("Location: login.php");
}


?>





<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    
    <title>Administrador</title>
      
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

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
        <a class="nav-link" href="index_adm.php">Pagina Inicial<span class="sr-only">(current)</span></a>
      </li>
  
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Cadastros
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="/projeto/cadastro.php">Cadastrar Lider ou Administrador</a>
          <?php echo '<a class="dropdown-item" href="complete_cadastro.php?id='.$id.'">Complete o seu Cadastro</a>' ?>
          <a class="dropdown-item" href="grupo_pesquisa.php">Editar Grupo de Pesquisa</a>
          <a class="dropdown-item" href="criar_grupo_pesquisa.php">Criar Grupo de Pesquisa</a>
        </div>
      </li>
    </ul>
   
  </div>
   <?php if ($img == true ) { echo '<img width="65px" height="40px" src="arquivoIMG/'.$img.'"/>';}?>
   <?php echo'<h7>'. $nome.'</h7>' ?>
   <a href="php/sairphp.php" >, Sair</a>
</nav>



</body>
</html>


