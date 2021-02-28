<!DOCTYPE html>
<head>
  <meta charset="UTF-8" />
  <title>Pagina inicial</title>  
  <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
  <link rel="stylesheet" type="text/css" href="css\css.css">
 
</head>
	<div>
		<?php 
    include('includes/menu.php');
    @session_start();
	  ?>
	</div>
	<div class="container">
		<form class="logar" method="post" action="db/login.php"> 
          <?php
          if(isset($_SESSION['msgError'])){
              echo $_SESSION['msgError'];
              unset($_SESSION['msgError']);
            }
          ?>
          <h1>Login</h1> 
          <p> 
            <label for="email_login">Seu e-mail</label>
            <input id="email_login" name="email_login" required="required" type="email" placeholder="exemplo@email.com" /> 
          </p>          
          <p> 
            <label for="senha_login">Senha</label>
            <input id="senha_login" name="senha_login" required="required" type="password" placeholder="sua senha" /> 
          </p>
          <p> 
            <input type="submit" name="btl" value="Logar" /> 
          </p>
           
          <p class="linka">
            Ainda não tem conta?
            <a href="cadastro.php">Cadastre-se</a>
          </p>

        </form>
	</div>
<body >
</body>