<?php

include './variaveisConexaoBanco.php';
include './ConexaoClasse.php';
$editar = new ConexaoClasse($_local, $_usuario, $_senha, $_banco);
$idUsuario = filter_input(INPUT_POST, 'id', FILTER_DEFAULT);
$nomeUsuario = filter_input(INPUT_POST, 'usuario', FILTER_DEFAULT);
$loginUsuario = filter_input(INPUT_POST, 'login', FILTER_DEFAULT);
$senhaUsuario = filter_input(INPUT_POST, 'senha', FILTER_DEFAULT);
$dataAtualizacao = date("Y-m-d H:i:s");

$consulta = "UPDATE usuarios SET nomeUsuario='$nomeUsuario',loginUsuario='$loginUsuario', senhaUsuario='$senhaUsuario',dataAtualizacao='$dataAtualizacao' WHERE idUsuario='$idUsuario'";
$resultado = $editar->editarOcorrencia($consulta);

$consulta = "SELECT * FROM `usuarios` WHERE loginUsuario='$loginUsuario' and nomeUsuario='$nomeUsuario' and senhaUsuario='$senhaUsuario' ";
$contagem = $editar->contaOcorrencias($consulta);
var_dump($contagem);
if ($contagem == 1) {
    header("Location: ../home.php?pagina=3&mensagem=1");
} else {
    header("Location: ../home.php?pagina=3&mensagem=2");
}