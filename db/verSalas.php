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
	include('conection.php');
	$id= 0;
	$alt= 0;
	@$id=$_GET['id'];
	@$alt=$_GET['p'];
	if($alt == 1)
		{
			$nome_sala = addslashes($_POST['nome_sala']);
	    	$cod_sala = addslashes($_POST['cod_sala']);
	    	$capa_sala = addslashes($_POST['capa_sala']);
			$sql="UPDATE sala SET nome_sala  = '$nome_sala',  cod_sala = '$cod_sala', capa_sala = '$capa_sala'  WHERE id_sala ='$id'";
			$exe=mysqli_query($conn,$sql);
			$_SESSION['msg'] = "Alterado com sucesso!";
		}
?>
<table class="salas">
          <?php
          	$consulta = "SELECT * FROM sala";
			$con = mysqli_query($conn,$consulta);
          	if(isset($_SESSION['msg'])){
              echo $_SESSION['msg'];
              unset($_SESSION['msg']);
            }
          ?>

	<tr> 
		<td>Nome da sala</td>
		<td>Codigo da sala</td>
		<td>Lotação da sala</td>
		<td>ID da sala</td>
		<td class="nc"><a href="../cadastrarSala.php">Cadastrar nova sala</a></td>
	</tr>
	<?php while($dado = $con->fetch_array()){?>	
	<tr>
		<td><?php echo $dado['nome_sala']; ?></td>
		<td><?php echo $dado['cod_sala']; ?></td>
		<td><?php echo $dado['capa_sala']; ?></td>
		<td><?php echo $dado['id_sala']; ?></td>
		<td class="alt"><a href="sala_alterar.php?p=1&id=<?php echo $dado['id_sala']; ?>">alterar</a></td>
		<td class="alt"><a href="sala_alterar.php?p=2&id=<?php echo $dado['id_sala']; ?>">deletar</a></td>
	</tr>
<?php } ?>
</table>