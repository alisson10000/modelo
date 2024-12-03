<?php
$listar = new ConexaoClasse($_local, $_usuario, $_senha, $_banco);
$atributos = ["idUsuario", "nomeUsuario", "loginUsuario", "senhaUsuario"];
$consulta = "SELECT * FROM usuarios";
$entidades = $listar->listarEntidade($consulta, $atributos);
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Usuários</title>
    <link rel="stylesheet" href="styles.css"> <!-- CSS com os estilos fornecidos -->
</head>
<body>
    <!-- Tabela de Usuários -->
    <table>
        <caption>Lista de Usuários</caption>
        <thead>
            <tr>
                <th>Matrícula</th>
                <th>Nome</th>
                <th>Login</th>
                <th>Senha</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($entidades as $entidade): ?>
                <tr>
                    <td><?= htmlspecialchars($entidade['idUsuario'], ENT_QUOTES, 'UTF-8') ?></td>
                    <td><?= htmlspecialchars($entidade['nomeUsuario'], ENT_QUOTES, 'UTF-8') ?></td>
                    <td><?= htmlspecialchars($entidade['loginUsuario'], ENT_QUOTES, 'UTF-8') ?></td>
                    <td><?= htmlspecialchars($entidade['senhaUsuario'], ENT_QUOTES, 'UTF-8') ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
