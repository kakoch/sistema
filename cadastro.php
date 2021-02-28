
<!DOCTYPE html>
<head>
  <meta charset="UTF-8" />
  <title>Pagina inicial</title>  
  <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
 <link rel="stylesheet" type="text/css" href="css\css.css" />
 
</head>
<?php include("includes/menu.php");
  ?>
<body >
  <!-- fomulario cadastro funcionario-->
  <div class="container">
    <form class="cadastro" method="post" action="db/getFormCad.php"> 

      <h1>Cadastro</h1> 
     <?php
          if(isset($_SESSION['msgError'])){
              echo $_SESSION['msgError'];
              unset($_SESSION['msgError']);
            }
          ?>
      <p> 
        <label for="nome_cad">Seu nome</label>
        <input id="nome_cad" name="nome_cad" required="required" type="text" placeholder="nome" />
      </p> 
      <p> 
        <label for="snome_cad">Sobrenome</label>
        <input id="snome_cad" name="snome_cad" required="required" type="text" placeholder="sobrenome" />
      </p>
      <p> 
        <label for="emp_cad">Cadastro empresa</label>
        <input id="emp_cad" name="emp_cad" required="required" type="number"/>
      </p>      
      <p> 
        <label for="nasci_cad">Nascimento</label>
        <input id="nasci_cad" name="nasci_cad" required="required" type="date"/>
      </p>
       
      <p> 
        <label for="email_cad">Seu e-mail</label>
       <input id="email_cad" name="email_cad" required="required" type="email" placeholder="contato@exemplo.com"/> 
      </p>
       
      <p> 
        <label for="senha_cad">Senha</label>
        <input id="senha_cad" name="senha_cad" required="required" type="password" placeholder="sua senha"/>
      </p>      
      <p> 
        <label for="csenha_cad">Confirmar senha</label>
        <input id="csenha_cad" name="csenha_cad" required="required" type="password" placeholder="confirmar senha"/>
      </p>
       
      <p> 
        <input type="submit" value="Cadastrar"/> 
      </p>
       
      <p class="linka">  
        Já tem conta?
        <a href="logar.php"> Ir para Login </a>
      </p>
    </form>
  </div>

</body>