<?php
session_start();
if(!$_SESSION['usuario']) {
  $_SESSION['msgError'] = "Você deve logar antes!";
  header('Location: logar.php');
  exit();
}?>
<!DOCTYPE html>
<head>
  <meta charset="UTF-8" />
  <title>Pagina inicial</title>  
  <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
  <link rel="stylesheet" type="text/css" href="css\css.css" />
 
</head>
<?php include("includes/menu.php");
      include("db/conection.php");

  ?>
<body >
	<!-- formulario cadastro de participante-->
	<div class="container">
		<form class="cpessoa" method="post" action="db/getFormPart.php"> 
          <h1>Cadastrar participante</h1> 
            <p><?php
              if(isset($_SESSION['msgError'])){
              echo $_SESSION['msgError'];
              unset($_SESSION['msgError']);
            }
            $consulta = "SELECT * FROM event";
            $con = mysqli_query($conn,$consulta);
          ?></p>
          <p> 
            <label for="nome_part">Nome</label>
            <input id="nome_part" name="nome_part" required="required" type="text" placeholder="nome"/>
          </p>
          <p> 
            <label for="snome_part">Sobrenome</label>
            <input id="snome_part" name="snome_part" required="required" type="text" placeholder="Sobrenome"/>
          </p>
          <p> 
            <label for="nasci_part">Nascimento</label>
            <input id="nasci_part" name="nasci_part" required="required" type="date"/>
          </p>
          <p> 
            <label for="email_part">E-mail</label>
            <input id="email_part" name="email_part" required="required" type="email" placeholder="participante@contato.com" /> 
          </p>
          <p>
            <label for="nasci_part">Evento</label>
            <?php while($dado = $con->fetch_array()){?>  
            <label for="id_event"><?php echo $dado['nome_event']; ?></label>
            <input id="id_event" name="id_event" value="<?php echo $dado['id_event'];?>" type="radio"/>
            <?php }?> 
          </p> 
          <p> 
            <input type="submit" value="cadastrar" /> 
          </p>
        </form>
	</div>
</body>