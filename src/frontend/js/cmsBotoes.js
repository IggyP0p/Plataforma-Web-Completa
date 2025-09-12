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

    if (confirmacao){
        const deletar = obj.parentElement;

        const id_post = deletar.id;

        console.log(id_post);

        // Realiza a requisição POST
        // Cria um objeto FormData para empacotar o ID
        const formData = new FormData();
        formData.append('id_post', id_post); // 'id_post' será o nome da variável no PHP

        try {
            const response = await fetch('../../backend/removerPost.php', {
                method: 'POST',
                body: formData // Envia o objeto FormData no corpo da requisição
            });

            // Verifica se a resposta do servidor foi bem-sucedida
            if (!response.ok) {
                // Se a resposta não for ok (status 200), lança um erro
                throw new Error('Erro ao remover o post: ' + response.statusText);
            }

            location.reload();

        } catch (error) {
            console.error('Erro:', error);
            alert('Erro ao tentar remover o post. Tente novamente.');
        }

    } else {
        return;

    }
}

function voltarHome(Dir) {

    window.location.href = Dir;
};