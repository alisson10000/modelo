<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include 'variaveisConexaoBanco.php';
include 'ConexaoClasse.php';
session_start();
$login = $_SESSION['login'];
$senha = $_SESSION['senha'];
$verifica = new ConexaoClasse($_local, $_usuario, $_senha, $_banco);
$verifica->conectar();
$consulta = "select * from usuarios where 
        loginUsuario='$login' 
        and senhaUsuario='$senha'";



if ($verifica->contaOcorrencias($consulta) == 0) {
   header("Location: ../index.php?mensagem=1");
}


