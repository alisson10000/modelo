<?php

include './variaveisConexaoBanco.php';
include './ConexaoClasse.php';
$salvar = new ConexaoClasse($_local, $_usuario, $_senha, $_banco);
$usuario = filter_input(INPUT_POST, 'usuario', FILTER_DEFAULT);
$login = filter_input(INPUT_POST, 'login', FILTER_DEFAULT);
$senha = filter_input(INPUT_POST, 'senha', FILTER_DEFAULT);
$dataCriacao = date("Y-m-d H:i:s");


$consulta = "SELECT * FROM `usuarios` WHERE loginUsuario='$login'";
$contagem = $salvar->contaOcorrencias($consulta);

if ($contagem == 0) {
    $consulta = "INSERT INTO usuarios VALUES (null,'$usuario','$login','$senha','$dataCriacao ','$dataCriacao')";
    $salvar->salvaOcorrencia($consulta);
    $consulta = "SELECT * FROM `usuarios` WHERE loginUsuario='$login'";
    $contagem = $salvar->contaOcorrencias($consulta);

    if ($contagem == 1) {
        header("Location: ../home.php?pagina=1&mensagem=1");
    } else {
        header("Location: ../home.php?pagina=1&mensagem=2");
    }
}
else if($contagem > 0 ){
     header("Location: ../home.php?pagina=1&mensagem=3");
}










