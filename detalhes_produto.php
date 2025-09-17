<!-- Inicio da tag PHP -->

<?php

include_once "class/produto.php";
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $produto = new Produto();
    $produto = $produto->buscarPorId($id);
}

?>

<!-- Final da tag PHP -->

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
        <!-- Inicio da área de menu -->

        <?php include 'menu_publico.php' ?>

        <!-- Final da área de menu -->
    </header>

    <main class="container">
        <h2 class="alert alert-danger">
            <a href="index.php" class="text-decoration-none">
                <button class="btn btn-danger">
                    <span class="bi bi-chevron-left"></span>
                </button>
                <strong>Detalhes do produtos - </strong> <?=$prod['descricao']?>
            </a>
        </h2>

        <div class="col-sm-12 col-md-12">
             <div class="card">
              <img
                src="images/<?=$prod['imagem']?>"
                alt="<?=$prod['descricao']?>"
                class="card-img-top"
              />
              <div class="card-body bg-dark text-white">
                <h3 class="card-title text-light text-center">
                  <strong><i><?=$prod['descricao']?></i></strong>
                </h3>
                <p class="text-warning"><strong><?=$prod['rotulo']?></strong></p>
                <p class="card-text text-start"><?=mb_strimwidth($prod['resumo'],0,42,'...')?></p>
                <button class="btn btn-default disabled" role="button" style="cursor: default;">
                    <?="R$ ".number_format($prod['valor'],2,',','.')?>
                </button>
                <a href="detalhes_produto.php?id=<?=$prod['id']?>" class="btn btn-light float-end">
                  <span class="d-nome d-sm-inline">Saiba Mais</span>
                  <i class="bi bi-info-circle"></i>
                </a>
              </div>
            </div>
        </div>

    </main>

</body>
</html>