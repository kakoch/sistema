<?php
@session_start();
if(!$_SESSION['usuario']) {
  header('Location: logar.php');
  exit();
}?>
<!DOCTYPE html>
<head>
  <meta charset="UTF-8" />
  <title>Pagina inicial</title>  
  <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
  <link rel="stylesheet" type="text/css" href="css\css.css" />
  <?php 
    include('includes/menu.php');
    include('db/conection.php');
  ?>
</head>
<body >
	<div class="container">
		<form class="cevent" method="post" action="db/getFormEvent.php"> 
          <h1>Cadastrar evento</h1> 
          <p>
        <?php
          if(isset($_SESSION['msg'])){
              echo $_SESSION['msg'];
              unset($_SESSION['msg']);
            }
            $consulta = "SELECT * FROM sala";
            $con = mysqli_query($conn,$consulta);
            $consultac = "SELECT * FROM coffee";
            $conc = mysqli_query($conn,$consultac);
            
          ?>
      </p>
          <p> 
            <label for="nome_event">Nome do evento</label>
            <input id="nome_event" name="nome_event" required="required" type="text" placeholder="Nome do evento"/>
          </p>     
          <p> 
            <label for="etapa_event">Quantidade de etapas</label>
            <input id="etapa_event" name="etapa_event" required="required" type="number" placeholder="somente numeros"/>
          </p>
          <p> 
            <label for="data_event">Data do evento</label>
            <input id="data_event" name="data_event" required="required" type="date"/>
          </p>
          <p>
            <?php while($dado = $con->fetch_array()){?>
            <label for="id_sala">Sala:</label>
            <input id="id_sala" name="id_sala" required="required" value="<?php echo $dado['id_sala'];?>" type="radio"/>
            <label for="id_sala"><?php echo $dado['nome_sala']; ?></label>
            <?php }?> </p>
          <p>
            <?php while($dadoc = $conc->fetch_array()){?>
            <label for="id_coffee">coffee:</label>
            <input id="id_coffee" name="id_coffee" required="required" value="<?php echo $dadoc['id_coffee'];?>" type="radio"/>
            <label for="id_coffee"><?php echo $dadoc['nome_coffee']; ?></label>
            
            <?php }?> </p>
          <p> 
          <p>
            <input type="submit" value="cadastrar" /> 
          </p>
        </form>
	</div>
</body>