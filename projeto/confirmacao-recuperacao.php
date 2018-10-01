
 
 <!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>

</body>
<meta charset="utf-8">
    
    <title>Login</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">
    <style type="text/css">
        body {
    padding-top: 90px;
            
}
.panel-login {
    border-color: #ccc;
    -webkit-box-shadow: 0px 2px 3px 0px rgba(0,0,0,0.2);
    -moz-box-shadow: 0px 2px 3px 0px rgba(0,0,0,0.2);
    box-shadow: 0px 2px 3px 0px rgba(0,0,0,0.2);
}
.panel-login>.panel-heading {
    color: #00415d;
    background-color: #fff;
    border-color: #fff;
    text-align:center;
}
.panel-login>.panel-heading a{
    text-decoration: none;
    color: #666;
    font-weight: bold;
    font-size: 15px;
    -webkit-transition: all 0.1s linear;
    -moz-transition: all 0.1s linear;
    transition: all 0.1s linear;
}
.panel-login>.panel-heading a.active{
    color: #029f5b;
    font-size: 18px;
}
.panel-login>.panel-heading hr{
    margin-top: 10px;
    margin-bottom: 0px;
    clear: both;
    border: 0;
    height: 1px;
    background-image: -webkit-linear-gradient(left,rgba(0, 0, 0, 0),rgba(0, 0, 0, 0.15),rgba(0, 0, 0, 0));
    background-image: -moz-linear-gradient(left,rgba(0,0,0,0),rgba(0,0,0,0.15),rgba(0,0,0,0));
    background-image: -ms-linear-gradient(left,rgba(0,0,0,0),rgba(0,0,0,0.15),rgba(0,0,0,0));
    background-image: -o-linear-gradient(left,rgba(0,0,0,0),rgba(0,0,0,0.15),rgba(0,0,0,0));
}
.panel-login input[type="text"],.panel-login input[type="email"],.panel-login input[type="password"] {
    height: 45px;
    border: 1px solid #ddd;
    font-size: 16px;
    -webkit-transition: all 0.1s linear;
    -moz-transition: all 0.1s linear;
    transition: all 0.1s linear;
}
.panel-login input:hover,
.panel-login input:focus {
    outline:none;
    -webkit-box-shadow: none;
    -moz-box-shadow: none;
    box-shadow: none;
    border-color: #ccc;
}
.btn-login {
    background-color: #1CB94E;
    outline: none;
    color: #fff;
    font-size: 14px;
    height: auto;
    font-weight: normal;
    padding: 14px 0;
    text-transform: uppercase;
    border-color: #1CB94A;
}
.btn-login:hover,
.btn-login:focus {
    color: #fff;
    background-color: #1CB94E;
    border-color: #53A3CD;
}
.forgot-password {
    text-decoration: underline;
    color: #888;
}
.forgot-password:hover,
.forgot-password:focus {
    text-decoration: underline;
    color: #666;
}
    </style>
    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
</head>
<body>
   <form action=" alterar_senha.php" method="POST">
<div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="panel panel-login">
                    <div class="panel-heading">
                        <div class="row">

                            
                            
                            
                            
                             <div class="text-center mb-4">
                            <img width="300px" height="230px" src="imagens/logo.png"/>
                            <hr>
                            <br>
                            
                            <p style="font-size:180%; rgb(0, 0, 0); ">Recuperação enviada com sucesso!</p>
                        
                            <br>
                             
                        <hr>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>
</div>

</form>
</html>

<?php
/* ############################################# AVISOS DE POSSÍVEIS MELHORIAS! #############################################
1 - Verificar se o campo da pagina recuperar-senha.php está em branco e redigir um erro caso seja verdadeiro
2 - Colocar tempo no link enviado por email
3 - Enviar link por email
4 - Vincular ao banco de dados a senha temporário gerada pelo sistema.
5 - Retornar a tela de login após clicar no link enviado por email, após ter feito o logon, mostrar imediatamente a tela de troca de senha.
6 - Formatar o texto que será enviado por email. */

require 'php/conect.php';
            
if(isset($_POST['senha-submit'])){
    date_default_timezone_set("America/Sao_Paulo");


$prontuario = $_POST["prontuario"];

$pdo = $sql->query("SELECT email FROM usuario WHERE prontuario = '$prontuario' ");

 if($pdo->rowCount() > 0){        
 foreach($pdo->fetchAll() as $usuario);
     $emailLink = $usuario['email'];

$chave = sha1($emailLink.$prontuario); 

// $salvaChave = $sql->query ("INSERT INTO codigolink SET codigo = '$chave'"); 

$dataExpiracao = date('Y-m-d H:i:s' , strtotime('+10 minute'));
$salvaData = $sql->query (" UPDATE codigolink SET codigo = '$chave', data = '$dataExpiracao' WHERE id = 1");
 


//if(isset($_POST['senha-submit'])){
//$link = $_POST["codigo"];
//$consultaBanco = $sql->query("");
//date_default_timezone_set("America/Sao_Paulo");
//echo "http://localhost/projeto/alterar_senha.php?chave=$chave";
//if ($chave) {
    
    $mensagemEmail = "'http://localhost/projeto/alterar_senha.php?chave=$chave";
      

    require_once("class.phpmailer.php");
    //Nova instância do PHPMailer
    $mail = new PHPMailer;
    //Informa que será utilizado o SMTP para envio do e-mail
    $mail->IsSMTP();
    $mail->SMTPAuth   = true;
    $mail->SMTPSecure = "tls";
    $mail->Port       = 587;
    $mail->Host       = 'mx1.hostinger.com.br';      // sets GMAIL as the SMTP server
    $mail->Username =  "contato@infoprojweb.tk";
    $mail->Password =   "123Info45!";

    //Titulo do e-mail
    $mail->Subject  ="Recuperacao de senha";

    //Preenchimento do campo FROM do e-mail
    $mail->From = "contato@infoprojweb.tk";
    $mail->FromName = "infoprojweb";

    //Email do destinatario
    $mail->AddAddress("" .$emailLink); //ALTERAR AQUI PARA COLOCAR O EMAIL QUE ESTÁ CADASTRADO NO PRONTUARIO.

    // MENSAGEM DO EMAIL
    $mail->Body =  "" .$mensagemEmail;

    //Envia o e-mail
    $enviadoSite = $mail->Send();

/*
    
    $dataExpiracao = date('Y-m-d H:i:s', strtotime('+10 minute'));
    $pdo = $sql->query("INSERT INTO usuario (`data_link`) WHERE prontuario = '$prontuario' VALUES ($dataExpiracao)")
           }
       */
       }
   }




?>
