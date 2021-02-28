<!DOCTYPE html>
<head>
  <meta charset="UTF-8" />
  <title>Pagina inicial</title>  
  <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
  <link rel="stylesheet" type="text/css" href="..\css\css.css" />
</head>
<div>
	<?php
		include('../includes/menuSeg.php');
		include('verifica_login.php');
		$_SESSION['msgError'] = "Você deve logar antes!";
	?>
  <div class="lpai">
    <ul class="nome">Olá, <?php echo $_SESSION['nome'];?></ul>
    <ul class="logout"><a href="../logout.php">Sair</a></ul>
    <ul><a class="linkp" href="../cadastrarEvento.php">Cadastrar um evento</a></ul>
    <ul><a class="linkp" href="../cadastrarPessoa.php">Cadastrar uma pessoa</a></ul>          
    <ul><a class="linkp" href="../cadastrarSala.php">Cadastrar sala</a></ul>
    <ul><a class="linkp" href="../cadastrarCoffee.php">Cadastrar Coffee</a></ul>
    <ul><a href="verSalas.php">Salas</a></ul>
    <ul><a href="verCoffees.php">Coffees</a></ul>
    <ul><a href="verParti.php">Particpantes</a></ul>
    <ul><a href="verEvent.php">Eventos</a></ul>
</div>
</div>


