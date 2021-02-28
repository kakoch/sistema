<!DOCTYPE html>
<head>
  <meta charset="UTF-8" />
  <title>Pagina inicial</title>  
  <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
  <link rel="stylesheet" type="text/css" href="css\css.css" />
</head>

<?php
  include('includes/menu.php');
  $_SESSION['msgC'] = "Você deve logar antes!";
  include('verifica_login.php');

?>
<div class="container">
    <form class="ccoffee" method="post" action="db/getFormCoffee.php"> 
      <h1>Cadastro</h1> 
        <?php
          if(isset($_SESSION['msgC'])){
              echo $_SESSION['msgC'];
              unset($_SESSION['msgC']);
            }
          ?>
      <p> 
        <label for="nome_coffee">Nome da sala</label>
        <input id="nome_coffee" name="nome_coffee" required="required" type="text" placeholder="nome da sala" />
      </p>
      <p> 
        <label for="capa_coffee">Capacidade</label>
        <input id="capa_coffee" name="capa_coffee" required="required" type="number" placeholder="apenas numeros"/>
      </p>      
      <p> 
        <input type="submit" value="Cadastrar"/> 
      </p>
    </form>
  </div>