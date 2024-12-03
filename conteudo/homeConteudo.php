<?php
$conexao = new ConexaoClasse($_local, $_usuario, $_senha, $_banco);

$atributos = ["nomeUsuario"];
$consulta = "SELECT * FROM usuarios";
$entidades = $conexao->listarEntidade($consulta, $atributos);
?>

<div class="formularios">
    <form name="frmCadastro" id="frmCadastro" action="servicos/salvar.php" method="post">
        <label for="usuario">Novo Usuário</label>
        <input required type="text" name="usuario" id="usuario" placeholder="Digite o nome do usuário">

        <label for="login">Login</label>
        <input required type="text" name="login" id="login" placeholder="Digite o login">

        <label for="senha">Senha</label>
        <input required type="password" name="senha" id="senha" placeholder="Digite a senha">

        <label for="confirmaSenha">Confirme a Senha</label>
        <input required type="password" name="confirmaSenha" id="confirmaSenha" placeholder="Repita a senha">

        <button type="button" onclick="verificaSenhas()">Salvar</button>
    </form>
</div>

<?php
$mensagem = filter_input(INPUT_GET, 'mensagem', FILTER_DEFAULT);

if (isset($mensagem)) {
    if ($mensagem == 1) {
        ?>
        <div class="accept">
            <h3>Usuário cadastrado com sucesso!</h3>
        </div>
        <?php
    } else if ($mensagem == 3) {
        ?>
        <div class="alert">
            <h3>Usuário já cadastrado no sistema!</h3>
        </div>
        <?php
    } else {
        ?>
        <div class="alert">
            <h3>Erro ao cadastrar o usuário!</h3>
        </div>
        <?php
    }
}
?>
