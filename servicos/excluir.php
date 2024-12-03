
<?php 

include './variaveisConexaoBanco.php';
include './ConexaoClasse.php';
$excluir = new ConexaoClasse($_local, $_usuario, $_senha, $_banco);
$idUsuario = filter_input(INPUT_POST, 'idUsuario', FILTER_DEFAULT);
$consulta = "DELETE FROM usuarios WHERE idUsuario='$idUsuario'";
$excluir->excluiOcorrencia($consulta);

$consulta="select * from usuarios where idUsuario='$idUsuario'";
$excluir->contaOcorrencias($consulta);


$contagem = $excluir->contaOcorrencias($consulta);

if ($contagem == 0) {
    header("Location: ../home.php?pagina=4&mensagem=1");
} else {
    header("Location: ../home.php?pagina=4&mensagem=2");
}
?>

