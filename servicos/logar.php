<?php

include './variaveisConexaoBanco.php';
include './ConexaoClasse.php';

$logar = new ConexaoClasse($_local, $_usuario, $_senha, $_banco);

$login = filter_input(INPUT_POST, 'login', FILTER_DEFAULT);
$senha = filter_input(INPUT_POST, 'senha', FILTER_DEFAULT);
$logar = new ConexaoClasse($_local, $_usuario, $_senha, $_banco);
$logar->conectar();
$consulta = "select * from usuarios where 
        loginUsuario='$login' 
        and senhaUsuario='$senha'";

echo $logar->contaOcorrencias($consulta);

if ($logar->contaOcorrencias($consulta) > 0) {
    session_start();
    $_SESSION['login'] = $login;
    $_SESSION['senha'] = $senha;
    header("Location: ../home.php?pagina=1");
} else {
    header("Location: ../index.php?mensagem=1");
}



