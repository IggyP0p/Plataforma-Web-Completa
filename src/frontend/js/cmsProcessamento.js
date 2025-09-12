// Coletar os dados para os campos
function ProcessarDados(id_post){
    // Classe nativa do Javascript para mandar formulário via fetch
    // feito para substituir o <form method="POST" enctype="multipart/form-data">
    let formData = new FormData();
    let jogosSelecionados = [];
    let eventosSelecionados = [];
    let conteudoInfo = new Map();

    let checkboxes = document.querySelectorAll('input[name="Jogo"]');

    for (const checkbox of checkboxes) {
        if (checkbox.checked) {
            jogosSelecionados.push(checkbox.value);
        }
    }

    checkboxes = document.querySelectorAll('input[name="evento"]');

    for (const checkbox of checkboxes) {
        if (checkbox.checked) {
            eventosSelecionados.push(checkbox.value);
        }
    }

    // Pega os principais dados do formulario para jogar no formData
    let dados = {
        imagemPrincipal: document.getElementById('imagem-principal').files[0],
        titulo: document.getElementById('titulo').value,
        subtitulo: document.getElementById('subtitulo').value,
        categoria: document.getElementById('categoria').value,
        tags: document.getElementById('tags').value,
        data: document.getElementById('data').value,
        jogos: jogosSelecionados,
        eventos: eventosSelecionados
    };

    // Joga os dados para o formData
    for (const key in dados) {
        formData.append(key, dados[key]);
    }

    // Coletar as subcategorias, se existirem.
    let mainSection = document.querySelector(".info-obrigatoria");
    let secoes = mainSection.getElementsByTagName('section');
    // Joga as subcategorias como "chave:dado" para o formData
    if(secoes){
        let select;
        for(i=0; i<secoes.length; i++){     
            select = secoes[i].getElementsByTagName('select');

            formData.append(secoes[i].id, select[0].value);
        }
    }

    // Coletar os topicos, se existirem.
    mainSection = document.querySelector(".info-opcional");
    secoes = mainSection.getElementsByTagName('section');
    // Joga os titulos,conteudos e imagens como "chave:dado" para o formData
    if(secoes){
        for (let i = 0; i < secoes.length - 1; i++) {

            let inputs = secoes[i].getElementsByTagName('input');
            if (inputs.length > 0) {
                if(inputs[0].type === "file"){
                    conteudoInfo.set(secoes[i].id, inputs[0].files[0]);

                } else {
                    conteudoInfo.set(secoes[i].id, inputs[0].value);

                }
            }
            
            let textareas = secoes[i].getElementsByTagName('textarea');
            if (textareas.length > 0) {
                conteudoInfo.set(secoes[i].id, textareas[0].value);
            }
            
        }

    }

    // Conteúdo (transformando o Map em objeto)
    let conteudo = Object.fromEntries(conteudoInfo);

    // Agora temos o JSONs separados:
    let json = JSON.stringify(conteudo, null, 4);

    formData.append('conteudo', json);

    for (let pair of formData.entries()) {
        console.log(pair[0] + ':', pair[1]);
    }

    if(id_post !== undefined){
        formData.append('post', id_post);
        dir = 'mandarPost.php';


    } else {
        dir = '../../backend/mandarPost.php';

    }
    
    enviarDadosParaPHP(formData, dir);
}

async function enviarDadosParaPHP(dados, dir){

    try {
        const response = await fetch(dir, {
            method: 'POST',
            body: dados
        });

        // Converte a resposta do servidor para JSON
        alert('Post enviado com sucesso!');
        const resultado = await response;
        console.log(resultado);

    } catch (error) {
        console.error('Erro:', error);
    }
}