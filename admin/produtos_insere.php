<?php

include 'acesso_com.php';
include_once '../class/produto.php';
include_once '../class/tipo.php';

$tipo = new Tipo();
$listaTipos = $tipo->listar();

if ($_POST) {
    if (isset($_POST['enviar'])) {
        $nome_img = $_FILES['imagemfile']['name'];
        $temp_img = $_FILES['imagemfile']['tmp_name'];
        $rand = rand(100001, 999999);
        $diretorio_imagem = "../images/produtos_geral/" . $rand . $nome_img;
        move_uploaded_file($temp_img, $diretorio_imagem);
    }
    $produto = new Produto;
    $produto->setTipoId($_POST['id_tipo']);
    $produto->setDestaque($_POST['destaque']);
    $produto->setDescricao($_POST['descricao']);
    $produto->setResumo($_POST['resumo']);
    $produto->setValor($_POST['valor']);
    $produto->setImagem($rand . $nome_img);

    if ($produto->inserir()) {
        header('location: produtos_lista.php');
    } else {
    }
}

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/estilo.css">

    <!-- Bootstrap Icons -->

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <title>Produto - Insere</title>

</head>

<body>
    <?php include "menu_adm.php"; ?>
    <main class="container my-4">
        <div class="row justify-content-center">
            <div class="col-12 col-sm-8 col-md-8">
                <h2 class="breadcrumb text-danger d-flex align-items-center">
                    <a href="produtos_lista.php" class="me-2">
                        <button class="btn btn-danger">
                            <i class="bi bi-chevron-left"></i>
                        </button>
                    </a>
                    Inserindo Produtos
                </h2>

                <div class="card shadow-sm">
                    <div class="card-body">
                        <form action="produtos_insere.php" method="post"
                            name="form_insere" enctype="multipart/form-data"
                            id="form_insere">

                            <!-- Tipo -->

                            <div class="mb-3">
                                <label for="id_tipo" class="form-label">Tipo:</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bi bi-list-task"></i></span>
                                    <select name="id_tipo" id="id_tipo" class="form-select" required>
                                        <?php foreach ($listaTipos as $tipo): ?>
                                            <option value="<?= $tipo['id'] ?>">
                                                <?= htmlspecialchars($tipo['rotulo']) ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>

                            <!-- Destaque -->

                            <div class="mb-3">
                                <label class="form-label">Destaque:</label>
                                <div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="destaque" id="destaque_s" value="1">
                                        <label class="form-check-label" for="destaque_s">Sim</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="destaque" id="destaque_n" value="0" checked>
                                        <label class="form-check-label" for="destaque_n">Não</label>
                                    </div>
                                </div>
                            </div>

                            <!-- Descrição -->

                            <div class="mb-3">
                                <label for="descricao" class="form-label">Descrição:</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bi bi-egg-fried"></i></span>
                                    <input type="text" name="descricao" id="descricao"
                                        class="form-control" placeholder="Digite a descrição do Produto"
                                        maxlength="100" required>
                                </div>
                            </div>

                            <!-- Resumo -->

                            <div class="mb-3">
                                <label for="resumo" class="form-label">Resumo:</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bi bi-card-text"></i></span>
                                    <textarea name="resumo" id="resumo" cols="30" rows="8"
                                        class="form-control" placeholder="Digite os detalhes do Produto" required></textarea>
                                </div>
                            </div>

                            <!-- Valor -->

                            <div class="mb-3">
                                <label for="valor" class="form-label">Valor:</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bi bi-tag"></i></span>
                                    <input type="number" name="valor" id="valor"
                                        class="form-control" required min="0.01" max='999.99' step="0.01">
                                </div>
                            </div>

                            <!-- Imagem -->

                            <div class="mb-3">
                                <label for="imagemfile" class="form-label">Imagem:</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bi bi-image"></i></span>
                                    <input type="file" name="imagemfile" id="imagemfile" class="form-control" accept="image/*">
                                </div>
                                <img src="" id="imagem" name="imagem" class="img-fluid mt-2" alt="Pré-visualização da imagem" required>
                            </div>

                            <!-- Botão -->

                            <div class="d-grid">
                                <input type="submit" name="enviar" id="enviar" class="btn btn-danger w-100" value="Cadastrar">
                            </div>

                        </form>
                    </div>
                </div>

            </div>
        </div>
    </main>

<script>

    // Script para imagem com validação de dimensão (640x480), tamanho (máx 500KB) e formato.

    document.getElementById("imagemfile").onchange = function() {
        const file = this.files[0];
        const MAX_SIZE = 512000; // 500KB em bytes
        const REQUIRED_WIDTH = 640;
        const REQUIRED_HEIGHT = 480;
        function resetFileAndImage(message) {
            alert(message);
            $("#imagem").attr("src", "blank");
            $("#imagem").hide();
            $("#imagemfile").wrap('<form>').closest('form').get(0).reset();
            $("#imagemfile").unwrap();
        }

        if (!file) {
            return;
        }

        // 1. Validação do Tamanho do Arquivo (máximo 500KB)

        if (file.size > MAX_SIZE) {
            resetFileAndImage("A imagem deve ter no máximo 500KB");
            return false;
        }

        // 2. Validação do Tipo do Arquivo (apenas imagem)

        if (file.type.indexOf("image") === -1) {
            resetFileAndImage("Formato inválido! Escolha uma imagem.");
            return false;
        }
        const reader = new FileReader();
        reader.onload = function(e) {
            const image = new Image();
            image.onload = function() {
                const width = this.width;
                const height = this.height;

                // 3. Validação das Dimensões (640x480)

                if (width !== REQUIRED_WIDTH || height !== REQUIRED_HEIGHT) {
                    resetFileAndImage("A imagem precisa ter 640x480.");
                    return false;
                }

                // Se todas as validações passarem: Exibe a imagem

                document.getElementById("imagem").src = e.target.result;
                $("#imagem").show();
            };
            image.src = e.target.result;
        };
        reader.readAsDataURL(file);
    };
</script>
</body>
</html>