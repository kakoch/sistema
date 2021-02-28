<?php
define('HOST', '127.0.0.1');
define('USUARIO', 'admin');
define('SENHA', 'admin123');
define('DB', 'sistema');

$conn = mysqli_connect(HOST, USUARIO, SENHA, DB) or die ('Não foi possível conectar');
?>