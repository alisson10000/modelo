<?php
$conexao = new ConexaoClasse($_local, $_usuario, $_senha, $_banco);

// Consulta para popular o select com usuários
$atributos = ["nomeUsuario", "idUsuario"];
$consulta = "SELECT * FROM usuarios";
$entidades = $conexao->listarEntidade($consulta, $atributos);

// Mensagem de feedback
$mensagem = filter_input(INPUT_GET, 'mensagem', FILTER_DEFAULT);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuário</title>
    <link rel="stylesheet" href="styles.css"> <!-- Link para o CSS fornecido -->
</head>
<body>
    <!-- Formulário de Busca -->
    <form class="formularios" method="get">
        <label for="buscar">Selecione o usuário</label>
        <select required name="buscar" id="buscar">
            <option value="">-- Selecione o usuário --</option>
            <?php foreach ($entidades as $entidade): ?>
                <option value="<?= htmlspecialchars($entidade['idUsuario'], ENT_QUOTES, 'UTF-8') ?>">
                    <?= htmlspecialchars($entidade['idUsuario'], ENT_QUOTES, 'UTF-8') ?> -> <?= htmlspecialchars($entidade['nomeUsuario'], ENT_QUOTES, 'UTF-8') ?>
                </option>
            <?php endforeach; ?>
        </select>
        <button name="pagina" value="3" type="submit">Buscar</button>
    </form>

    <?php
    // Verifica se um usuário foi selecionado
    $buscar = filter_input(INPUT_GET, 'buscar', FILTER_DEFAULT);
    if (isset($buscar) && $buscar > 0):
        // Consulta o usuário selecionado
        $atributos = ["idUsuario", "nomeUsuario", "loginUsuario", "senhaUsuario"];
        $consulta = "SELECT * FROM usuarios WHERE idUsuario='$buscar'";
        $entidades = $conexao->listarEntidade($consulta, $atributos);
    ?>

        <!-- Formulário de Edição -->
        <form name="frmCadastro" id="frmCadastro" class="formularios" action="servicos/editar.php" method="post">
            <fieldset>
                <legend>Editar Usuário</legend>
                <?php foreach ($entidades as $entidade): ?>
                    <input type="hidden" name="id" value="<?= htmlspecialchars($entidade['idUsuario'], ENT_QUOTES, 'UTF-8') ?>">
                    
                    <label for="usuario">Nome</label>
                    <input required type="text" name="usuario" id="usuario" value="<?= htmlspecialchars($entidade['nomeUsuario'], ENT_QUOTES, 'UTF-8') ?>" placeholder="Nome do usuário">

                    <label for="login">Login</label>
                    <input required type="text" name="login" id="login" value="<?= htmlspecialchars($entidade['loginUsuario'], ENT_QUOTES, 'UTF-8') ?>" placeholder="Login do usuário">

                    <label for="senha">Senha</label>
                    <input required type="password" name="senha" id="senha" value="<?= htmlspecialchars($entidade['senhaUsuario'], ENT_QUOTES, 'UTF-8') ?>" placeholder="Senha do usuário">

                    <label for="confirmaSenha">Confirme a Senha</label>
                    <input required type="password" name="confirmaSenha" id="confirmaSenha" placeholder="Repita a senha">

                    <button type="submit">Editar</button>
                <?php endforeach; ?>
            </fieldset>
        </form>

    <?php endif; ?>

    <!-- Mensagem de Feedback -->
    <?php if (isset($mensagem)): ?>
        <?php if ($mensagem == 1): ?>
            <div class="accept">
                <h3>Registro de usuário editado com sucesso!</h3>
            </div>
        <?php else: ?>
            <div class="alert">
                <h3>Registro de usuário não editado no sistema!</h3>
            </div>
        <?php endif; ?>
    <?php endif; ?>
</body>
</html>
