<body class="fundo-fixo">
  <main class="container my-4">
    <h1 class="mb-4 text-center text-white">Área do Cliente</h1>
    <div class="row g-4">

      <!-- CLIENTE RESERVAS -->

      <div class="col-sm-6 col-md-4 mb-5">
        <div class="card border-dark h-100 text-center">
          <div class="card-body">
            <img src="../images/iconreserva.png" alt="Clientes" class="mb-3" style="max-height:80px;">
            <h5 class="card-title text-dark">MINHAS RESERVA</h5>
            <div class="d-grid gap-2">
              <a href="reservas_lista.php"
                class="btn btn-primary">
                <span class="d-none d-sm-inline">LISTAR</span>
                <i class="bi bi-card-list"></i>
              </a>
            </div>
          </div>
        </div>
      </div>

      <!-- FECHA CLIENTE RESERVAS-->

      <!-- NEW RESERVAS -->

      <div class="col-sm-6 col-md-4 mb-5">
        <div class="card border-dark h-100 text-center">
          <div class="card-body">
            <img src="../images/iconreserva.png" alt="Clientes" class="mb-3" style="max-height:80px;">
            <h5 class="card-title text-dark">NOVA RESERVA</h5>
            <div class="d-grid gap-2">
              <a href="reserva_insere.php"
                class="btn btn-success">
                <span class="d-none d-sm-inline">FAZER</span>
                <i class="bi bi-plus-lg"></i>
              </a>
            </div>
          </div>
        </div>
      </div>

      <!-- NEW RESERVAS-->

      <!-- CANCELAR RESERVAS -->

      <div class="col-sm-6 col-md-4 mb-5">
        <div class="card border-dark h-100 text-center">
          <div class="card-body">
            <img src="../images/iconreserva.png" alt="Clientes" class="mb-3" style="max-height:80px;">
            <h5 class="card-title text-dark">RESERVAS</h5>
            <div class="d-grid gap-2">
              <a href="reserva_cancelar.php"
                class="btn btn-danger">
                <span class="d-none d-sm-inline">CANCELAR</span>
                <i class="bi bi-trash-fill"></i>
              </a>
            </div>
          </div>
        </div>
      </div>

      <!-- CANCELAR RESERVAS-->

    </div>
  </main>
</body>