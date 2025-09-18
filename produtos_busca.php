<?php

    if(isset($_GET['buscar']))
    {
    $busca = $_GET['buscar'];
    include_once "class/produto.php";

    $produto = new Produto();
    $produtos = $produto->buscarPorString($busca);  // Retorna apenas os produtos em destaques, se for (1),  vazio () retorna todos.
    $linhas = count($produtos);
    }
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

        <?php include "menu_publico.php" ?>

    </header>

    <main class="container">

        <!-- Área carousel (inclui uma sessão HTML) -->

        <?php include "carousel.php" ?>


        <!-- Final da tag PHP -->

        <section>

            <!-- Mostrar se a consulta retorna vazio -->

            <?php if ($linhas == 0) { ?>

                <h2 class="alert alert-primary text-center">Não há produtos cadastrados</h2>

            <?php } ?>

            <?php if ($linhas > 0) { ?>

                <h2 class="alert alert-primary text-center">Busca de Produtos por "<?=$busca?>"</h2>
                <div class="row">

                    <?php foreach ($produtos as $prod): ?>

                        <!-- Inicio do card -->

                        <div class="col-sm-6 col-md-4 mb-4">
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
                                        <?= mb_strimwidth($prod['resumo'], 0, 42, '...') ?>
                                    </p>
                                    <button class="btn btn-default disabled" role="button" style="cursor: default;">
                                        <?= "R$ " . number_format($prod['valor'], 2, ',', '.') ?>
                                    </button>
                                    <a href="detalhes_produto.php?id=<?= $prod['id'] ?>" class="btn btn-light float-end">
                                        <span class="d-nome d-sm-inline">Saiba Mais</span>
                                        <i class="bi bi-info-circle"></i>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <!-- Final do card picanha -->

                    <?php endforeach; ?>
                </div>
            <?php } ?>
        </section>

    </main>

    <footer class="container ps-4 bg-dark text-white p-4 rounded-top" id="Contato">

        <!-- Rodapé -->

        <a name="contato"></a>

        <?php include "rodape.php" ?>

    </footer>

</body>

</html>