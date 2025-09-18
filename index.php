<?php


?>

<!-- Inicio da tag HTML -->

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <!-- Links Icons BootStrap do projeto -->

  <link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css" />

  <!-- Links CSS e BootStrap do projeto -->

  <link rel="stylesheet" href="css/bootstrap.min.css" />

  <link rel="stylesheet" href="css/style.css" />

  <script src="js/bootstrap.min.js" defer></script>

  <script src="js/bootstrap.bundle.min.js" defer></script>

  <title>Parrilla</title>

</head>

<body class="fundo-fixo">

  <header>

    <!-- Área de menu -->

    <?php include 'menu_publico.php' ?>

  </header>

  <main class="container">

    <!-- Área carousel (inclui uma sessão HTML) -->

    <?php include "carousel.php"?>


    <!-- Área  destaque -->

    <a class="pt-6" name="destaques">&nbsp;</a>

    <?php include "destaques.php"?>


    <!-- Área geral de produtos -->

    <a class="pt-6" name="produtos">&nbsp;</a>

    <?php include "produtos_geral.php"?>


  </main>

</body>

</html>