<?php
	include('conection.php');
	session_start();
	$nome_event = $_POST['nome_event'];
	$etapa_event = $_POST['etapa_event'];
	$data_event = $_POST['data_event'];
	$sala_id_sala = $_POST['id_sala'];
	$coffee_id_coffee = $_POST['id_coffee'];
	if(!empty($nome_event) && !empty($etapa_event) && !empty($data_event) && !empty($sala_id_sala) && !empty($coffee_id_coffee))
    {
      	$sql = mysqli_query($conn, "SELECT * FROM event WHERE nome_event = '{$nome_event}'") or print mysql_error();
   		if(mysqli_num_rows($sql)>0)
   		{
        	echo json_encode(array(header('Location: ../cadastrarEvento.php')));
        	$_SESSION['msg'] = "evento já castrado!";
        }
		else
		{
			$sql = ("INSERT INTO event (nome_event, etapa_event, data_event, sala_id_sala, coffee_id_coffee) VALUES ('$nome_event','$etapa_event','$data_event','$sala_id_sala', '$coffee_id_coffee')");
			$res=mysqli_query($conn,$sql);
			$linhas= mysqli_affected_rows($conn);
			$_SESSION['msg'] = "Cadastrado com sucesso!";
			header('Location: ../cadastrarEvento.php');
		}
	}
else
{
	$_SESSION['msgError'] = "Não foi possivel cadastrar o evento!";
	header('Location: ../cadastrarEvento.php');
}
?>