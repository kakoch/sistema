<?php
	include('conection.php');
	session_start();
	$nome_sala = addslashes($_POST['nome_sala']);
    $cod_sala = addslashes($_POST['cod_sala']);
    $capa_sala = addslashes($_POST['capa_sala']);
    if(!empty($nome_sala) && !empty($cod_sala) && !empty($capa_sala))
    {
    	$sql = mysqli_query($conn, "SELECT * FROM sala WHERE nome_sala = '{$nome_sala}'") or print mysql_error();
   		 if(mysqli_num_rows($sql)>0) {
        		echo json_encode(array(header('Location: ../cadastrarSala.php')));
        		$_SESSION['msgError'] = "sala já castrada!"; 
    	}
    	else {
				$sql = ("INSERT INTO sala (nome_sala, cod_sala, capa_sala) VALUES ('$nome_sala','$cod_sala','$capa_sala')");
				$res=mysqli_query($conn,$sql);
				$_SESSION['msgError'] = "sala cadastrada com sucesso!";
				header('Location: ../cadastrarSala.php');


				}
	}
else{
		$_SESSION['msgError'] = "os campos não pode estar vazio!";
		header('Location: ../cadastrarSala.php');
	}

?>
