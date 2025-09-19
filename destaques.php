<?php

include_once "class/produto.php";

$produto = new Produto();
$produtos = $produto->listar(1);  // Retorna apenas os produtos em destaques, se for (1),  vazio () retorna todos.
$linhas = count($produtos);
?>

<!-- Final da tag PHP -->

<section>

  <!-- Mostrar se a consulta retorna vazio -->

  <?php if($linhas == 0){ ?>

    <h2 class="alert alert-danger text-center">Não há produtos em destaques</h2>

  <?php }?>

  <?php if($linhas > 0){ ?>

    <h2 class="alert alert-dark text-center">Destaques</h2>
    <div class="row">

      <?php foreach ($produtos as $prod):?>

        <!-- Inicio do card -->

        <div class="col-sm-6 col-md-4 mb-4">
          <div class="card">
            <img
              src="./images/carne/<?=$prod['imagem']?>"
              alt="<?=$prod['descricao']?>"
              class="card-img-top"
            />
            <div class="card-body bg-dark text-white">
              <h3 class="card-title text-light text-center">
                <strong><i><?=$prod['descricao']?></i></strong>
              </h3>
              <p class="text-warning"><strong><?=$prod['rotulo']?></strong></p>
              <p class="card-text text-start">
                <?= mb_strimwidth($prod['resumo'],0,42,'...')?>
              </p>
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

        <!-- Final do card picanha -->

      <?php endforeach; ?>
    </div>
  <?php } ?>
</section>