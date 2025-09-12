document.addEventListener("DOMContentLoaded", function() {
    const telaCriar = document.getElementById("tela-criar");

    telaCriar.style.display = "none";
});

function telaCriar(){
    const telaListar = document.getElementById("tela-listar");
    const telaCriar = document.getElementById("tela-criar");

    telaCriar.style.display = "flex";

    telaListar.style.display = "none";
}

function telaListar(){
    const telaListar = document.getElementById("tela-listar");
    const telaCriar = document.getElementById("tela-criar");

    telaCriar.style.display = "none";

    telaListar.style.display = "flex";
}

async function excluirPost(obj){

    let confirmacao = confirm('Tem certeza que deseja excluir este post?');

    

}

function voltarHome(Dir) {

    window.location.href = Dir;
};