<?php
	include('conection.php');
	session_start();
	$nome_coffee = $_POST['nome_coffee'];
	$capa_coffee = $_POST['capa_coffee'];
	   if(!empty($nome_coffee) && !empty($capa_coffee))
    	{
      		$sql = mysqli_query($conn, "SELECT * FROM coffee WHERE nome_coffee = '{$nome_coffee}'") or print mysql_error();
   			if(mysqli_num_rows($sql)>0)
   			{
        		echo json_encode(array(header('Location: ../cadastrarCoffee.php')));
        		$_SESSION['msgC'] = "Coffee já cadastrado!";
        	}
			else
			{
				$sql = ("INSERT INTO coffee (nome_coffee, capa_coffee) VALUES ('$nome_coffee','$capa_coffee')");
				$res=mysqli_query($conn,$sql);
				$linhas= mysqli_affected_rows($conn);
				$_SESSION['msgC'] = "Cadastrado com sucesso!";
				header('Location: ../cadastrarCoffee.php');
			}
	}
	else
	{
		$_SESSION['msgC'] = "os campos não pode estar vazio!";
		header('Location: ../cadastrarCoffee.php');
	}
?>