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
		$sql= "DELETE FROM coffee WHERE id_coffee = '$id'";
		$exe=mysqli_query($conn,$sql);
		header('Location: verCoffees?p=<?php echo $alt;?&id=<?php echo $id?;>>.php');
		$_SESSION['msg'] = 'Deletado com sucesso!';


	}

?>
<div class="container">
<form class="cfalterar" action="verCoffees.php?p=<?php echo $alt; ?>&id=<?php echo$id;?>" method="post">
	<p><label for="nome_coffee">Alterar nome</label>
	<input id="nome_coffee" name="nome_coffee" type="text" placeholder="nome do coffee" /></p>
	<p><label for="capa_coffee">Alterar capacidade</label>
	<input id="capa_coffee" name="capa_coffee" type="number" placeholder="capacidade" /></p>
	<p><input type="submit" name="btl" value="Alterar" /></p>
	<p><a href="verCoffees.php">Voltar</a></p>
</form>
</div>