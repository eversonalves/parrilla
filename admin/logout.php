<?php 

session_name('parrillaa');
session_start();
session_destroy();   // Ao usar "destroy" você obriga o usuario refazer o login.
header('location: ../index.php');
exit;

?>