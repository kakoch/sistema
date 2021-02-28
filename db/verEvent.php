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
	$consulta = "SELECT * FROM event";
	$con = mysqli_query($conn,$consulta);
?>
<?php 
	$id= 0;
	$alt= 0;
	@$id=$_GET['id'];
	@$alt=$_GET['p'];
	if($alt == 1)
		{
			$nome_event = addslashes($_POST['nome_event']);
	    	$etapa_event = addslashes($_POST['etapa_event']);
	    	$data_event = addslashes($_POST['data_event']);
			$sql="UPDATE event SET nome_event  = '$nome_event' , etapa_event = '$etapa_event', data_event ='$data_event' WHERE id_event ='$id'";
			$exe=mysqli_query($conn,$sql);
			$_SESSION['msg'] = "Alterado com sucesso!";

		}
?>
<table class="event">

          <?php
          	$consulta = "SELECT * FROM event";
			$con = mysqli_query($conn,$consulta);
          if(isset($_SESSION['msg'])){
              echo $_SESSION['msg'];
              unset($_SESSION['msg']);
            }
          ?>
	<tr>
		<td>Nome do evento</td>
		<td>Quantidade de etapas</td>
		<td>Data do evento</td>
		<td>ID do evento</td>
		<td class="nc"><a href="../cadastrarEvento.php">Cadastrar novo evento</a></td>
	</tr>
	<?php while($dado = $con->fetch_array()){?>	
	<tr>
		<td><?php echo $dado['nome_event']; ?></td>
		<td><?php echo $dado['etapa_event']; ?></td>
		<td><?php echo $dado['data_event']; ?></td>
		<td><?php echo $dado['id_event']; ?></td>
		<td class="alt"><a href="event_alterar.php?p=1&id=<?php echo $dado['id_event']; ?>">alterar</a></td>
		<td class="del"><a href="event_alterar.php?p=2&id=<?php echo $dado['id_event']; ?>">deletar</a></td>
	</tr>
<?php } ?>
</table>