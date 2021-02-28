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
	$consulta = "SELECT * FROM coffee";
	$con = mysqli_query($conn,$consulta);
?>
<?php 
	$id= 0;
	$alt= 0;
	@$id=$_GET['id'];
	@$alt=$_GET['p'];
	if($alt == 1)
		{
			$nome_coffee = addslashes($_POST['nome_coffee']);
	    	$capa_coffee = addslashes($_POST['capa_coffee']);
			$sql="UPDATE coffee SET nome_coffee  = '$nome_coffee' , capa_coffee = '$capa_coffee' WHERE id_coffee ='$id'";
			$exe=mysqli_query($conn,$sql);
			$_SESSION['msg'] = "Alterado com sucesso!";

		}
?>
<table class="coffee">
          <?php
          	$consulta = "SELECT * FROM coffee";
			$con = mysqli_query($conn,$consulta);
          if(isset($_SESSION['msg'])){
              echo $_SESSION['msg'];
              unset($_SESSION['msg']);
            }
          ?>
	<tr>
		<td>Nome da coffee</td>
		<td>Lotação da sala</td>
		<td>ID da sala</td>
		<td class="nc"><a href="../cadastrarCoffee.php">Cadastrar novo coffee</a></td>
	</tr>
	<?php while($dado = $con->fetch_array()){?>	
	<tr>
		<td><?php echo $dado['nome_coffee']; ?></td>
		<td><?php echo $dado['capa_coffee']; ?></td>
		<td><?php echo $dado['id_coffee']; ?></td>
		<td class="alt"><a href="coffee_alterar.php?p=1&id=<?php echo $dado['id_coffee']; ?>">alterar</a></td>
		<td class="del"><a href="coffee_alterar.php?p=2&id=<?php echo $dado['id_coffee']; ?>">deletar</a></td>
	</tr>
<?php } ?>
</table>