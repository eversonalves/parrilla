
<!-- Inicio da tag HTML -->

<!DOCTYPE html>
<html lang="pt-br">
    
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="refresh" content="30;url=./index.php">

    <!-- Links Icons BootStrap do projeto -->
    
    <link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css" />
    
    <!-- Links CSS e BootStrap do projeto -->
    
    <link rel="stylesheet" href="./css/bootstrap.min.css" />
    
    <link rel="stylesheet" href="./css/style.css" />
    
    <script src="../js/bootstrap.min.js" defer></script>
    
    <script src="../js/bootstrap.bundle.min.js" defer></script>
    
    <title>Parrilla</title>
    
</head>

<body>
    <main class="container my-5">
        <section>
            <article>
                <div class="row justify-content-center">
                    <div class="col-12 col-sm-8 col-md-6 col-lg-4">
                        <h1 class="text-info text-center mb-4">Faça seu login</h1>
                        
                        <div class="card shadow-lg mb-5">
                            <div class="card-body">
                                <p class="text-info text-center mb-4" role="alert">
                                    <i class="bi bi-people-fill display-1"></i>
                                </p>
                                
                                <div class="alert alert-info" role="alert">
                                    <form action="login_reserva.php" name="form_login" id="form_login" method="POST" enctype="multipart/form-data">

                                        <!-- CPF -->

                                        <div class="mb-3">
                                            <label for="cpf" class="form-label">CPF:</label>
                                            <div class="input-group">
                                                <span class="input-group-text">
                                                    <i class="bi bi-lock-fill text-info"></i>
                                                </span>
                                                <input type="number" name="cpf" id="cpf"
                                                class="form-control"
                                                placeholder="Digite sua CPF"
                                                required autocomplete="off">
                                            </div>
                                        </div>

                                        <!-- Email -->

                                        <div class="mb-3">
                                            <label for="email" class="form-label">E-mail:</label>
                                            <div class="input-group">
                                                <span class="input-group-text">
                                                    <i class="bi bi-envelope-at-fill text-info"></i>
                                                </span>
                                                <input type="text" name="email" id="email"
                                                class="form-control"
                                                placeholder="Digite seu E-mail"
                                                autofocus required autocomplete="off">
                                            </div>
                                        </div>
                                        
                                        
                                        <!-- Botão -->

                                        <div class="d-grid">
                                            <button type="submit" class="btn btn-primary">Entrar</button>
                                        </div>
                                    </form>
                                </div>
                                
                                <p class="text-center mt-3">
                                    <small>
                                        Nessecario efetuar login para fazer reservas.
                                    </small>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </article>
        </section>
    </main>
</body>

</html>