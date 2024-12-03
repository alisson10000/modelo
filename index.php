<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Project/PHP/PHPProject.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <style>
            @import"css/raiz.css";
        </style>
    </head>
    <body>
        <div class="conteudoGeral">


            <div class="topo">
                <h1>modelo</h1>
                <img src="img/logo.png" alt="alt"/>

            </div><!-- Fim do topo -->


            <div class="conteudo">
                <form class="formulario" action="servicos/logar.php" method="post">
                    <input type="text" name="login" placeholder="digite o seu login" >
                    <input type="password" name="senha" placeholder="digite sua senha" >
                    <button>logar</button>
                </form>
                <?php
                if (isset($_GET['mensagem'])) {


                    if ($_GET['mensagem'] == 1) {
                        ?>
                        <div class="error">
                            <h3>login ou senha inválida</h3>
                        </div>
                        <?php
                    }
                }
                ?>



            </div>

        </div><!-- Fim do conteudo geral -->
        <footer class="rodape">
            <h1>
                modelo 2023 &COPY;
            </h1>
        </footer>
    </body>
</html>
