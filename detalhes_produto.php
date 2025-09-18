<?php

include_once "class/produto.php";
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $produto = new Produto();
    $prod = $produto->buscarPorId($id);
}

?>

<!-- Final da tag PHP -->


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

        <?php include_once "menu_publico.php" ?>

    </header>

    <main class="container">
        
        <h2 class="alert alert-danger text-center">
            <a href="index.php" class="text-decoration-none">
                <button class="btn btn-danger">
                    <span class="bi bi-chevron-left"></span>
                </button>
                Detalhes do produto - <strong><?= $prod['descricao'] ?></strong>
            </a>
        </h2>

        <div class="col-sm-12 col-md-12 mb-3">
            <div class="card">
                <img
                    src="images/<?= $prod['imagem'] ?>"
                    alt="<?= $prod['descricao'] ?>"
                    class="card-img-top" />
                <div class="card-body bg-dark text-white">
                    <h3 class="card-title text-light text-center">
                        <strong><i><?= $prod['descricao'] ?></i></strong>
                    </h3>
                    <p class="text-warning"><strong><?= $prod['rotulo'] ?></strong></p>
                    <p class="card-text text-start">
                        <?= $prod['resumo'] ?>
                    </p>
                    <button class="btn btn-default disabled" role="button" style="cursor: default;">
                        <?= "R$ " . number_format($prod['valor'], 2, ',', '.') ?>
                    </button>
                </div>
            </div>
        </div>

    </main>

    <footer class="container ps-4 bg-dark text-white p-4 rounded-top" id="Contato">

        <!-- Rodapé -->

        <a name="contato"></a>

        <?php include "rodape.php" ?>

    </footer>

</body>

</html>