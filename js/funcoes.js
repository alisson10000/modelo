function verificaSenhas() {


    var senha, confirmaSenha, usuario, login;


    senha = document.getElementById('confirmaSenha').value;
    confirmaSenha = document.getElementById('senha').value;
    usuario = document.getElementById('usuario').value;
    login = document.getElementById('login').value;





    if (usuario == "") {
        alert('Campo usuario vazio!');
        document.getElementById('usuario').focus();
    } else if (login == "") {
        alert('Campo login vazio!');
        document.getElementById('login').focus();
    } else if (senha == "") {
        alert('Campo senha vazio!');
        document.getElementById('senha').focus();
    } else if (confirmaSenha == "") {
        alert('Campo login vazio!');
        document.getElementById('confirmaSenha').focus();
    } else if (senha != confirmaSenha ) {
        alert('Senha não são iguais!');
        document.getElementById('senha').value="";
        document.getElementById('confirmaSenha').value="";
        document.getElementById('senha').focus();
    } else {
        document.frmCadastro.submit();
    }

}