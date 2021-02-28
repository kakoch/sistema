<!DOCTYPE html>
<head>
  <meta charset="UTF-8" />
  <title>Pagina inicial</title>  
  <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
  <link rel="stylesheet" type="text/css" href="css\css.css" />
 
</head>
<?php
  include('includes/menu.php');
  include('verifica_login.php');
?>
<div class="container">
    <form class="csala" method="post" action="db/getFormSala.php"> 

      <h1>Cadastro</h1> 
       
        <?php
          if(isset($_SESSION['msgError'])){
              echo $_SESSION['msgError'];
              unset($_SESSION['msgError']);
            }
          ?>
      <p> 
        <label for="nome_sala">Nome da sala</label>
        <input id="nome_sala" name="nome_sala" required="required" type="text" placeholder="nome da sala" />
      </p> 
      <p> 
        <label for="cod_sala">Codigo da sala</label>
        <input id="cod_sala" name="cod_sala" required="required" type="number" placeholder="apenas numeros"/>
      </p>      
      <p> 
        <label for="capa_sala">Capacidade</label>
        <input id="capa_sala" name="capa_sala" required="required" type="number" placeholder="apenas numeros"/>
      </p>
      <p>
        <input type="submit" value="Cadastrar"/> 
      </p>
    </form>
  </div>