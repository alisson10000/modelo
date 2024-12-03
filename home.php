<?php
include './servicos/verifica.php';
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modelo Atualizado</title>
    <!-- Link do Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/raiz.css"> <!-- Adiciona o CSS atualizado -->
</head>
<body class="d-flex flex-column min-vh-100">

    <!-- Topo -->
    <header class="bg-dark text-white py-3">
        <div class="container d-flex align-items-center">
            <img src="img/logo.png" alt="Logo" class="me-3" style="width: 80px; height: auto;">
            <div>
                <h1 class="h3 text-uppercase">Modelo</h1>
                <h3 class="text-capitalize">
                    Seja bem-vindo,
                    <?php
                    $usuarioSistema = new ConexaoClasse($_local, $_usuario, $_senha, $_banco);
                    $indice = 'nomeUsuario';
                    $consulta = "SELECT * FROM usuarios WHERE loginUsuario='$login' AND senhaUsuario='$senha'";
                    $us = $usuarioSistema->listaOcorrencia($consulta, $indice);

                    foreach ($us as $value) {
                        echo htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
                    }
                    ?>
                </h3>
            </div>
        </div>
    </header>

    <!-- Menu -->
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link <?= ($_GET['pagina'] == 1 ? 'active' : '') ?>" href="home.php?pagina=1">Criar Usuário</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= ($_GET['pagina'] == 2 ? 'active' : '') ?>" href="home.php?pagina=2">Listar Usuários</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= ($_GET['pagina'] == 3 ? 'active' : '') ?>" href="home.php?pagina=3">Editar Usuário</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= ($_GET['pagina'] == 4 ? 'active' : '') ?>" href="home.php?pagina=4">Excluir Usuário</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="servicos/sair.php">Sair</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Conteúdo -->
    <main class="flex-grow-1 py-4">
        <div class="container">
            <?php
            if (isset($_GET['pagina'])) {
                if ($_GET['pagina'] == 1) {
                    include './conteudo/homeConteudo.php';
                } else if ($_GET['pagina'] == 2) {
                    include './conteudo/listarConteudo.php';
                } else if ($_GET['pagina'] == 3) {
                    include './conteudo/editarConteudo.php';
                } else if ($_GET['pagina'] == 4) {
                    include './conteudo/excluirConteudo.php';
                }
            }
            ?>
        </div>
    </main>

    <!-- Rodapé -->
    <footer class="bg-dark text-white text-center py-3">
        <div class="container">
            <p class="mb-0">Modelo 2023 &COPY;</p>
        </div>
    </footer>

    <!-- Scripts do Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/funcoes.js"></script>
</body>
</html>
