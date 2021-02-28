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
		$sql= "DELETE FROM event WHERE id_event = '$id'";
		$exe=mysqli_query($conn,$sql);
		header('Location: verEvent.php?p=<?php echo $alt;?&id=<?php echo $id?;>>.php');
		$_SESSION['msg'] = 'Deletado com sucesso!';
	}
	
?>
<div class="container">
<form class="ealterar" action="verEvent.php?p=<?php echo $alt; ?>&id=<?php echo$id;?>" method="post">
	<p><label for="nome_event">Alterar nome</label>
	<input id="nome_event" name="nome_event" type="text" placeholder="nome do evento" /></p>
	<p><label for="etapa_event">Alterar quantidade de etapas</label>
	<input id="etapa_event" name="etapa_event" type="number" placeholder="quantidade de etapas" /></p>
	<p><label for="data_event">Alterar data do evento</label>
	<input id="data_event" name="data_event" type="date"/></p>
	<p><input type="submit" name="btl" value="Alterar" /></p>
	<p><a href="verEvent.php">Voltar</a></p>
	</form>
</div>