<?php
session_start();
include('conection.php');

if(empty($_POST['email_login']) || empty($_POST['senha_login'])) {
	header('Location: ../logar.php');
	exit();
}

$usuario = mysqli_real_escape_string($conn, $_POST['email_login']);
$senha = mysqli_real_escape_string($conn, $_POST['senha_login']);

$query = "select * from user where email_cad = '$usuario' and senha_cad = '$senha'";

$result = mysqli_query($conn, $query);

$row = mysqli_num_rows($result);
$rowS= mysqli_fetch_assoc($result);

if($row == 1) {
	$_SESSION['usuario'] = $usuario;
	$_SESSION['nome'] = $rowS['nome_cad'];
	header('Location: painel.php');
	exit();
} else {
	$_SESSION['usuario'] = True;
	header('Location: ../logar.php');
	exit();
}
?>
        <td> 
           <a class="link" href="verSala.php">Ver Salas</a>
        </td>