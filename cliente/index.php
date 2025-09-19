<?php 

session_name('parrillaa');
session_start();
?>

<h1>Área de cliente</h1>
<h2>Área Exclusiva de <?=$_SESSION['login_usuario']?></h2>