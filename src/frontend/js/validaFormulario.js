let avisos = document.getElementsByClassName("warning");

document.addEventListener('DOMContentLoaded', function() {
    for(i=0; i<avisos.length; i++){
        avisos[i].style.display = "none";
    }
})

function validaCadastro(){
    let usuario = document.getElementById("usuario").value;
    let email   = document.getElementById("email").value;
    let senha1   = document.getElementById("senha1").value; // Senha original
    let senha2   = document.getElementById("senha2").value; // Confirmação da senha

    // A string de caracteres que você quer proibir
    const caracteresProibidos = "@#$%¨&*()!/??{}|";

    // Cria a expressão regular de forma mais segura
    const regex = new RegExp(`[${caracteresProibidos.replace(/[.*+?^${}()|[\]\\]/g, '\\$&')}]`);

    // Validação de usuario 
    if(usuario){
        avisos[2].style.display = "none";
        
        // Impedindo cadastro de usuario com menos de 6 caracteres
        if(usuario.length < 4){
            avisos[2].textContent = "Minimo de 6 caracteres.";
            avisos[2].style.display = "block";
            return;
        }
        // Impedindo cadastro de usuario com caracteres especiais
        if(regex.test(usuario)) {
            avisos[2].textContent = "Caracteres especiais não permitidos.";
            avisos[2].style.display = "block";
            return;
        }

    } else {
        // Impedindo cadastro de usuario vazio
        avisos[2].textContent = "Preencha o usuário.";
        avisos[2].style.display = "block";
        return;
    }

    //Validando E-mail.
    if(email){
        avisos[3].style.display = "none";
        // Impedindo cadastro de email invalido
        if(!email.includes("@")){
            avisos[3].textContent = "E-mail inválido.";
            avisos[3].style.display = "block";
            return;
        }

        var user = email.substring(0, email.indexOf("@"));
        var dominio = email.substring(email.indexOf("@") + 1, email.length);
        //Dominios validos
        const dominiosValidos = ["gmail.com", "hotmail.com", "outlook.com", "Gmail.com", "Hotmail.com", "Outlook.com"];

        if(dominio.length <= 4){
            avisos[3].textContent = "Dominio inválido.";
            avisos[3].style.display = "block";
            return;
        }

        if(!dominiosValidos.includes(dominio)){
            avisos[3].textContent = "Dominio inválido.";
            avisos[3].style.display = "block";
            return;
        }

        if(user.length < 4){
            avisos[3].textContent = "E-mail inválido.";
            avisos[3].style.display = "block";
            return;
        }

        // Impedindo cadastro de usuario com caracteres especiais
        if(regex.test(user)) {
            avisos[3].textContent = "E-mail inválido.";
            avisos[3].style.display = "block";
            return;
        }

    } else {
        // Impedindo cadastro de email vazio
        avisos[3].textContent = "Preencha o e-mail.";
        avisos[3].style.display = "block";
        return;
    }

    //Validando Senha.
    if(senha1){
        avisos[4].style.display = "none";

        //Impedindo uso de caracteres especiais na senha
        if(regex.test(senha1)) {
            avisos[4].textContent = "Use apenas numeros e letras.";
            avisos[4].style.display = "block";
            return;
        }

        if (!/[1234567890]/.test(senha1)) {
            avisos[4].textContent = "Use pelo menos 1 numero.";
            avisos[4].style.display = "block";
            return;
        }

        if (!/[abcdefghijklmnopqrstuvxzwyABCDEFGHIJKLMNOPQRSTUVXZWY]/.test(senha1)) {
            avisos[4].textContent = "Use pelo menos 1 letra.";
            avisos[4].style.display = "block";
            return;
        }

    } else {
        // Impedindo cadastro de senha vazia
        avisos[4].textContent = "Preencha a senha.";
        avisos[4].style.display = "block";
        return;
    }

    //Confirmando senha.
    if(senha2){
        avisos[5].style.display = "none";

        if(senha2 !== senha1){
            avisos[5].textContent = "Senhas não coincidem.";
            avisos[5].style.display = "block";
            return;
        }

    } else {
        // Impedindo cadastro de senha vazia
        avisos[5].textContent = "Confirme sua senha.";
        avisos[5].style.display = "block";
        return;
    }

    Cadastro.submit();

}


function validaLogin() {
    let usuario = document.getElementById("login-usuario").value;
    let senha   = document.getElementById("login-senha").value;

    // A string de caracteres que você quer proibir
    const caracteresProibidos = "@#$%¨&*()!/?{}|~";

    // Cria a expressão regular de forma mais segura
    const regex = new RegExp(`[${caracteresProibidos.replace(/[.*+?^${}()|[\]\\]/g, '\\$&')}]`);

    // Validação de usuario 
    if(usuario){
        avisos[0].style.display = "none";
        
        // Impedindo cadastro de usuario com menos de 6 caracteres
        if(usuario.length < 4){
            avisos[0].style.display = "block";
            return;
        }
        // Impedindo cadastro de usuario com caracteres especiais
        if(regex.test(usuario)) {
            avisos[0].style.display = "block";
            return;
        }

    } else {
        // Impedindo cadastro de usuario vazio
        avisos[0].style.display = "block";
        return;
    }

    //Validando Senha.
    if(senha){
        avisos[1].style.display = "none";

        //Impedindo uso de caracteres especiais na senha
        if(regex.test(senha)) {
            avisos[1].style.display = "block";
            return;
        }

        if (!/[1234567890]/.test(senha)) {
            avisos[1].style.display = "block";
            return;
        }

        if (!/[abcdefghijklmnopqrstuvxzwyABCDEFGHIJKLMNOPQRSTUVXZWY]/.test(senha)) {
            avisos[1].style.display = "block";
            return;
        }

    } else {
        // Impedindo cadastro de senha vazia
        avisos[1].style.display = "block";
        return;
    }

    Login.submit();
}