<?php
$conexao = new ConexaoClasse($_local, $_usuario, $_senha, $_banco);

// Consulta os usuários para exibição no select
$atributos = ["nomeUsuario", "idUsuario"];
$consulta = "SELECT * FROM usuarios";
$entidades = $conexao->listarEntidade($consulta, $atributos);

// Mensagem de feedback
$mensagem = filter_input(INPUT_GET, 'mensagem', FILTER_DEFAULT);
?>

<!-- Formulário de Exclusão -->
<form class="formularios" action="servicos/excluir.php" method="post">
    <label for="idUsuario">Selecione o Usuário</label>
    <select required name="idUsuario" id="idUsuario">
        <option value="">-- Selecione o usuário --</option>
        <?php foreach ($entidades as $entidade): ?>
            <option value="<?= htmlspecialchars($entidade['idUsuario'], ENT_QUOTES, 'UTF-8') ?>">
                <?= htmlspecialchars($entidade['idUsuario'], ENT_QUOTES, 'UTF-8') ?> -> <?= htmlspecialchars($entidade['nomeUsuario'], ENT_QUOTES, 'UTF-8') ?>
            </option>
        <?php endforeach; ?>
    </select>
    <button>Excluir</button>
</form>

<!-- Mensagem de Feedback -->
<?php if (isset($mensagem)): ?>
    <?php if ($mensagem == 1): ?>
        <div class="accept">
            <h3>Registro excluído do sistema!</h3>
        </div>
    <?php else: ?>
        <div class="error">
            <h3>Registro não excluído no sistema!</h3>
        </div>
    <?php endif; ?>
<?php endif; ?>
