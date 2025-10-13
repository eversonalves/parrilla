<body class="fundo-fixo"> 
<main class="container my-4">
  <h1 class="mb-4 text-center text-white">Área Administrativa</h1>
  <div class="row g-4">  <!-- g-4 = espaçamento entre colunas -->
 
    <!-- ADM PRODUTOS -->
    <div class="col-sm-6 col-md-4 mb-5">
      <div class="card border-danger h-100 text-center">
        <div class="card-body">
          <img src="../IMAGES/logo/logo-produto.png" alt="Produtos" class="mb-3" style="max-height:80px;">
          <h5 class="card-title text-danger">PRODUTOS</h5>
          <div class="d-grid gap-2">
            <a href="produtos_lista.php" class="btn btn-danger">LISTAR</a>
            <a href="produtos_insere.php" class="btn btn-danger">INSERIR</a>
          </div>
        </div>
      </div>
    </div>
    <!-- fecha ADM PRODUTOS -->
 
    <!-- ADM TIPOS -->
    <div class="col-sm-6 col-md-4 mb-5">
      <div class="card border-warning h-100 text-center">
        <div class="card-body">
          <img src="../IMAGES/logo/logo-tipo.png" alt="Tipos" class="mb-3" style="max-height:80px;">
          <h5 class="card-title text-warning">TIPOS</h5>
          <div class="d-grid gap-2">
            <a href="tipos_lista.php" class="btn btn-warning">LISTAR</a>
            <a href="tipos_insere.php" class="btn btn-warning">INSERIR</a>
          </div>
        </div>
      </div>
    </div>
    <!-- fecha ADM TIPOS -->

    
    <!-- ADM USUÁRIOS -->
    <div class="col-sm-6 col-md-4 mb-5">
      <div class="card border-info h-100 text-center">
        <div class="card-body">
          <img src="../IMAGES/logo/logo-user.png" alt="Usuários" class="mb-3" style="max-height:80px;">
          <h5 class="card-title text-info">USUÁRIOS</h5>
          <div class="d-grid gap-2">
            <a href="usuarios_lista.php" class="btn btn-info">LISTAR</a>
            <a href="usuarios_insere.php" class="btn btn-info">INSERIR</a>
          </div>
        </div>
      </div>
    </div>
    <!-- fecha ADM USUÁRIOS -->

    <!-- ADM RESERVAS -->
    <div class="col-sm-6 col-md-4 mb-5">
      <div class="card border-dark h-100 text-center">
        <div class="card-body">
          <img src="../IMAGES/logo/iconreserva.png" alt="Usuários" class="mb-3" style="max-height:80px;">
          <h5 class="card-title text-dark">RESERVAS</h5>
          <div class="d-grid gap-2">
            <a href="reservas_lista.php" class="btn btn-dark">LISTAR</a>
          </div>
        </div>
      </div>
    </div>
    <!-- fecha ADM RESERVAS-->
    
  </div><!-- fecha row -->
</main>
</body>