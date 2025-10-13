<?php


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
                Regras da Reserva
            </a>
        </h2>

        <div class="col-sm-12 col-md-12 mb-3">
            <div class="card">
                <img
                    src="./IMAGES/alt/reservamesas.png"
                    alt=""
                    class="card-img-top" />
                <div class="card-body bg-dark text-white">
                    <h5 class="card-title text-light text-center">
                        <i>
                            <h5 class="text-danger">Regras de reserva, Por favor leia com atenção.</h5>
                            <br>
                            Você pode realizar apenas uma reserva por dia com o seu CPF,
                            <br>
                            o agendamento deve ser feito com no mínimo 24 horas de antecedência
                            <br>
                            você pode reservar com até 30 dias de antecedência a partir de hoje.
                            <br>
                            <br>
                            <h5 class="text-warning">Informações de Identificação.</h5>
                            <br>
                            CPF: (Campo de preenchimento obrigatório)
                            <br>
                            <br>
                            Nome Completo: (Campo de preenchimento obrigatório)
                            <br>
                            <br>
                            E-mail: (Campo de preenchimento obrigatório)
                            <br>
                            <br>
                            Telefone de Contato: (Campo de preenchimento obrigatório)
                            <br>
                            <br>
                            <h5 class="text-warning">Detalhes da Reserva</h5>
                            <br>
                            Data Escolhida: (Obrigatório restrições de 24h a 30 dias.)
                            <br>
                            <br>
                            Horário: (Obrigatório horários disponíveis em intervalos de 30 minutos.)
                            <br>
                            <br>
                            Número de Pessoas: (Obrigatório)
                            <br>
                            <br>
                            Motivo da Reserva: (Exemplo: "Aniversário", "Casamento", "Confraternização", etc.)
                        </i>
                    </h5>
                    <a href="./cliente/login_reserva.php" class="btn btn-warning float-end">
                        <span class="d-nome d-sm-inline">Reservar</span>
                        <i class="bi bi-calendar2-date"></i>
                    </a>
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