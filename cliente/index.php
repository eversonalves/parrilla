<?php 

session_name('parrillaa');
session_start();

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Links Icons BootStrap do projeto -->

  <link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css" />

  <!-- Links CSS e BootStrap do projeto -->

  <link rel="stylesheet" href="../css/bootstrap.min.css" />

  <link rel="stylesheet" href="../css/style.css" />

  <script src="../js/bootstrap.min.js" defer></script>

  <script src="../js/bootstrap.bundle.min.js" defer></script>

    <title>Área Cliente - Parrilla</title>

</head>

<body>
    <?php 
        include_once "menu_cliente.php";
        include_once "cliente_options.php";
    ?>
</body>
</html>
