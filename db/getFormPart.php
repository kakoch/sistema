<?php
	include('conection.php');
	session_start();
	$nome_part = addslashes($_POST['nome_part']);
    $snome_part = addslashes($_POST['snome_part']);
    $email_part = addslashes($_POST['email_part']);
    $nasci_part = addslashes($_POST['nasci_part']);
    $event_id_event = addslashes($_POST['id_event']);
    if(!empty($nome_part) && !empty($snome_part)  && !empty($nasci_part) && !empty($email_part) && !empty($event_id_event))
    {		
    	$sql = mysqli_query($conn, "SELECT * FROM participante WHERE email_part = '{$email_part}'") or print mysql_error();
   		if(mysqli_num_rows($sql)>0) {
        	echo json_encode(array(header('Location: ../cadastrarPessoa.php')));
        	$_SESSION['msgError'] = "Participante já castrado!";
			}
			else{
				$sql = ("INSERT INTO participante (nome_part, snome_part, email_part, nasci_part, event_id_event) VALUES ('$nome_part','$snome_part','$email_part','$nasci_part', '$event_id_event')");
				$res=mysqli_query($conn,$sql);
				$linhas= mysqli_affected_rows($conn);
				$_SESSION['msgError'] = "Cadastrado com sucesso!";
				header('Location: ../cadastrarPessoa.php');

			}
	}

?>