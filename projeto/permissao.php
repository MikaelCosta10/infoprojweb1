
<!DOCTYPE html>
<html lang="br">
<head>
<meta charset="utf-8">

<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="css.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="css/permissao.css">
<style >

</style>
</head>
<body>

<br/><h2> Permissão de Usuario</h2>
<form method="post" action="php/permissaophp.php">
<nav aria-label="breadcrumb" style="margin-top: 100px; margin-left: 0px; margin-right: 0px;"> 
  
     <ol class="breadcrumb"  >  <h3>Adicionar</h3>
   <li class="breadcrumb-item active" aria-current="page" style="margin-top: 0px; margin-left: 500px; margin-right: 500px;"></li>
<label class="switch" >
  <input type="checkbox"  name="adicionar">
<span class="slider round" ></span>
</label><br/>
    
  </ol>
               <ol class="breadcrumb" >  <h3>Excluir</h3>
            <li class="breadcrumb-item active" aria-current="page" style="margin-top: 0px; margin-left: 540px; margin-right: 500px;"></li>
                
                    <label class="switch" >
                        <input type="checkbox"  name="excluir">
                            <span class="slider round" ></span>
                    </label><br/>
         </ol>
         <ol class="breadcrumb" >  <h3>Editar</h3>
            <li class="breadcrumb-item active" aria-current="page" style="margin-top: 0px; margin-left: 550px; margin-right: 500px;"></li>
                
                    <label class="switch" >
                      <input type="checkbox"  name="editar">
                        <span class="slider round" ></span>
                    </label><br/>
                
          </ol>
          <button type="submit" class="btn btn-success">Salvar</button>    
</nav>
</form>
  </body>
</html> 
    


