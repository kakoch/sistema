<?php
	include('conection.php');
	session_start();
	$nome_cad = addslashes($_POST['nome_cad']);
    $snome_cad = addslashes($_POST['snome_cad']);
    $emp_cad = addslashes($_POST['emp_cad']);
    $nasci_cad = addslashes($_POST['nasci_cad']);
    $email_cad = addslashes($_POST['email_cad']);
    $senha_cad = addslashes($_POST['senha_cad']);
    $csenha_cad = addslashes($_POST['csenha_cad']);
    if(!empty($nome_cad) && !empty($snome_cad) && !empty($emp_cad) && !empty($nasci_cad) && !empty($email_cad) && !empty($senha_cad) &&!empty($csenha_cad))
    {		
    	$sql = mysqli_query($conn, "SELECT * FROM user WHERE email_cad = '{$email_cad}'") or print mysql_error();
   		if(mysqli_num_rows($sql)>0) {
        	echo json_encode(array(header('Location: ../cadastro.php')));
        	$_SESSION['msgError'] = "usuario já castrado!"; 
    }
    else
    {
	  	if($senha_cad == $csenha_cad)
	  	{
	      	$testa= ("SELECT email_cad FROM user WHERE email_cad");
			if($testa == $email_cad)
				{
					$_SESSION['msgError'] = "Email  já cadastrado!";
					header('Location: ../cadastro.php');
				}
				else
				{
					$sql = ("INSERT INTO user (nome_cad, snome_cad, email_cad, senha_cad,  nasci_cad, emp_cad) VALUES ('$nome_cad','$snome_cad','$email_cad','$senha_cad','$nasci_cad','emp_cad')");
					$res=mysqli_query($conn,$sql);
					$linhas= mysqli_affected_rows($conn);
					$_SESSION['msgError'] = "Cadastrado com sucesso!";
					header('Location: ../logar.php');
				}
		}
				else{ 
				$_SESSION['msgError'] = "Senha não coecidem!";
				header('Location: ../cadastro.php');
		
	}
}
}
?>