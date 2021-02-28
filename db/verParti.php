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

?>
<?php 
	$id= 0;
	$alt= 0;
	@$id=$_GET['id'];
	@$alt=$_GET['p'];
	if($alt == 1)
		{
			$nome_part = addslashes($_POST['nome_part']);
	    	$snome_part = addslashes($_POST['snome_part']);
	    	$email_part = addslashes($_POST['email_part']);
	    	$nasci_part = addslashes($_POST['nasci_part']);
	    	$id_event = addslashes($_POST['id_event']);
			$sql="UPDATE participante SET nome_part  = '$nome_part',  snome_part = '$snome_part', email_part = '$email_part', nasci_part = '$nasci_part', event_id_event ='$id_event' WHERE id_part ='$id'";
			$exe=mysqli_query($conn,$sql);
			$_SESSION['msg'] = "Alterado com sucesso!";

		}
?>
<table class="parti">
          <?php
          	$consulta = "SELECT * FROM participante";
			$con = mysqli_query($conn,$consulta);
	
          	if(isset($_SESSION['msg'])){
              echo $_SESSION['msg'];
              unset($_SESSION['msg']);
            }
          ?>
	<tr>
		<td>Nome </td>
		<td>email</td>
		<td>nascimento</td>
		<td>ID evento</td>
		<td>ID do participante</td>
		<td class="nc"><a href="../cadastrarPessoa.php">Cadastrar novo participante</a></td>
	</tr>
	<?php while($dado = $con->fetch_array()){?>	
	<tr>
		<td> <?php echo $dado[ 'nome_part'];?> <?php echo $dado['snome_part' ]; ?> </td>
		<td><?php echo $dado['email_part']; ?></td>
		<td><?php echo $dado['nasci_part']; ?></td>
		<td><?php echo $dado['event_id_event']?></td>
		<td><?php echo $dado['id_part']; ?></td>
		<td class="alt" ><a href="part_alterar.php?p=1&id=<?php echo $dado['id_part']; ?>">alterar</a></td>
		<td class="del" ><a href="part_alterar.php?p=2&id=<?php echo $dado['id_part']; ?>">deletar</a></td>
	</tr>
<?php } ?>
</table>