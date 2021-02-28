<!DOCTYPE html>
<head>
  <meta charset="UTF-8" />
  <title>Pagina inicial</title>  
  <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
  <link rel="stylesheet" type="text/css" href="..\css\css.css">
 
</head>
	<div>
		<?php 
    include('../includes/menuSeg.php');
    include('verifica_login.php');
	include('conection.php');
	$alt = $_GET['p'];
	$id = $_GET['id'];
	
	if($alt == 2)
	{
		$sql= "DELETE FROM participante WHERE id_part = '$id'";
		$exe=mysqli_query($conn,$sql);
		header('Location: verParti.php?p=<?php echo $alt;?&id=<?php echo $id?;>>.php');
		$_SESSION['msg'] = 'Deletado com sucesso!';
	}
	  ?>
	</div>
	<div class="container">
	
	<form class="palterar" action="verParti.php?p=<?php echo $alt; ?>&id=<?php echo$id;?>" method="post">
			<h1>Alterar dados participante</h1>
			<p><label for="nome_part">Alterar nome</label>
			<input id="nome_part" name="nome_part" type="text" placeholder="nome" /></p>
			<p><label for="snome_part">Alterar sobrenome</label>
			<input id="snome_part" name="snome_part" type="text" placeholder="sobrenome" /></p>
			<p><label for="email_part">Aletarar e-mail</label>
			<input id="email_part" name="email_part"  type="email" placeholder="contato@email.com" /></p>
			<p><label for="nasci_part">Alterar nascimento</label>
			<input id="nasci_part" name="nasci_part"  type="date"/></p>
			<p><label for="id_event">ID evento</label>
			<input id="id_event" name="id_event"  type="number"/></p>
			<p><input type="submit" name="btl" value="Alterar" /></p>
			<p><a href="verParti.php">Voltar</a></p>
	</form>
	