
<!-- Inicio da tag PHP -->

<?php 

include "class/db.php";

$pdo = getConnection(); // ok
$tipo_lista = $pdo->query("SELECT * FROM tipos");
$tipos = $tipo_lista->fetchAll();

?>

<!-- Final da tag PHP -->

<!-- Inicio do Menu (navbar) - será um arquivo externo -->

      <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
        <div class="container-fluid">
          <a href="index.html" class="navbar-brand">
            <img
              src="./images/Logo_parrilla/Logo_escuro.png"
              alt="Logo parrila"
              width="190"
            />
          </a>

          <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#menuprincipal"
            aria-controls="menuprincipal"
            aria-expanded="false"
            aria-label="Toggle navigation"
          >
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="menuprincipal">
            <ul class="navbar-nav ms-auto mb-2 mb-md-0">
              <li class="nav-item">
                <a
                  href="index.html"
                  class="nav-link active"
                  aria-current="page"
                >
                  <i class="bi bi-house-door-fill"></i
                ></a>
              </li>

              <li class="nav-item">
                <a href="#" class="nav-link">Produtos</a>
              </li>

              <li class="nav-item dropdown">
                <a
                  href=""
                  class="nav-link dropdown-toggle"
                  role="button"
                  data-bs-toggle="dropdown"
                  aria-expanded="false"
                >
                  Tipos
                </a>
                <ul class="dropdown-menu dropdown-menu-dark">
                  <?php foreach ($tipos as $tipo):?>
                  <li><a href="produto_por_tipo.php?tipo_id=<?=$tipo['id']?>" class="dropdown-item"><?=$tipo['rotulo']?></a></li>
                  <?php endforeach;?>
                </ul>
              </li>

              <li class="nav-item">
                <a href="#contato" class="nav-link">Contato</a>
              </li>

              <li class="nav-item">
                <form class="d-flex" role="search">
                  <input
                    type="search"
                    class="form-control me-2"
                    placeholder="Buscar produto"
                    aria-label="search"
                    required
                  />
                  <button class="btn btn-outline-light">
                    <i class="bi bi-search"></i>
                  </button>
                </form>
              </li>

              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="bi bi-person-fill"></i>&nbsp;ADMIN/CLIENTE
                </a>
              </li>

              <li class="nav-item">
                <a href="" class="nav-link"></a>
              </li>
            </ul>
          </div>
        </div>
      </nav>

      <!-- Final do Menu (navbar) -->