document.addEventListener("DOMContentLoaded", function() {
    const telaCriar = document.getElementById("tela-criar");

    telaCriar.style.display = "none";
});


document.querySelectorAll('.alterar').forEach(botao => {
  botao.addEventListener('click', (evento) => {
    const id_post = evento.currentTarget.getAttribute('value');
    
    // Redireciona o usuário para a página de edição
    // enviando o ID do post como um parâmetro na URL (método GET)
    window.location.href = `../../backend/mudarPost.php?id_post=${id_post}`;
  });
});


document.querySelectorAll('.excluir').forEach(botao => {
  botao.addEventListener('click', (evento) => {
    const id_post = evento.currentTarget.getAttribute('value');

    if(confirm("Tem certeza que quer excluir este post?")){
        
        window.location.href = `../../backend/removerPost.php?id_post=${id_post}`;
    } 

    return;

  });
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


function voltarHome(Dir) {

    window.location.href = Dir;
};
