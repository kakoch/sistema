<!DOCTYPE html>
<head>
  <meta charset="UTF-8" />
  <title>Pagina inicial</title>  
  <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
  <link rel="stylesheet" type="text/css" href="..\css\css.css">
 
</head>
<?php
	include('verifica_login.php');
	include('conection.php');
	$alt = $_GET['p'];
	$id = $_GET['id'];
	
	if($alt == 2)
	{
		$sql= "DELETE FROM sala WHERE id_sala = '$id'";
		$exe=mysqli_query($conn,$sql);
		header('Location: verSalas?p=<?php echo $alt;?&id=<?php echo $id?;>>.php');
		$_SESSION['msg'] = 'Deletado com sucesso!';


	}

?>
<div class="container">
	<form class="salterar" action="verSalas.php?p=<?php echo $alt; ?>&id=<?php echo$id;?>" method="post">
		<p><label for="email_login">Nome</label>
		<input id="nome_sala" name="nome_sala" type="text" placeholder="nome da sala" /></p>
		<p><label for="email_login">Codigo</label>
		<input id="cod_sala" name="cod_sala"  type="number" placeholder="codigo da sala" /></p>
		<p><label for="email_login">Capacidade</label>
		<input id="capa_sala" name="capa_sala"  type="number" placeholder="capacidade da sala" /></p>
		<p><input type="submit" name="btl" value="Alterar" /></p>
		<p><a href="verSalas.php">Voltar</a></p>
	</form>
</div>