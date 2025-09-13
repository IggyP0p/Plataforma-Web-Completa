// Coletar os dados para os campos
function ProcessarDados(id_post){
    // Classe nativa do Javascript para mandar formulário via fetch
    // feito para substituir o <form method="POST" enctype="multipart/form-data">
    let formData = new FormData();
    // Pegando os avisos para impedir o envio indesejado
    let warnings = document.getElementsByTagName('span');
    // Diferencia de quando for att ou criacao
    let submitButton = document.getElementById('atualizar');


    // Agora adicionando a imagem
    let imagem = document.getElementById('imagem-principal').files[0];
    if (imagem) {
        formData.append('imagemPrincipal', imagem);
        warnings[0].style.display = "none";

    } else {
        if(!submitButton){
            warnings[0].style.display = "flex";
            return;
        }

    }


    // Título
    let titulo = document.getElementById('titulo').value;
    if (titulo) {
        formData.append('titulo', titulo);
        warnings[1].style.display = "none";

    } else {
        warnings[1].style.display = "flex";
        return;
    }


    // Subtítulo
    let subtitulo = document.getElementById('subtitulo').value;
    if (subtitulo) {
        formData.append('subtitulo', subtitulo);
        warnings[2].style.display = "none";

    } else {
        warnings[2].style.display = "flex";
        return;
    }


    // Categoria
    let categoria = document.getElementById('categoria').value;
    if (categoria) {
        formData.append('categoria', categoria);
        warnings[3].style.display = "none";

    } else {
        warnings[3].style.display = "flex";
        return;
    }


    // Tags
    let tags = document.getElementById('tags').value;
    if (tags) {


        // Limpa a string e a divide em um array
        tags = tags.trim().toLowerCase().split(',');
        
        // Remove espaços extras que possam ter ficado após a vírgula
        tags = tags.map(palavra => palavra.trim());

        // Método Filter() para retirar espaços vazios ['tag', ' '] causados por uso excessivo de virgulas
        tags = tags.filter(elemento => elemento !== '');

        // coloca toda as tags em lower case para adição no banco de dados
        tags = tags.map(elemento => elemento.toLowerCase());

        // Cria um set para a verificação de duplicatas
        // Se houver tamanhos diferentes, quer dizer que o set eliminou uma duplicata
        const verificaDuplicatas = new Set(tags);

        if(verificaDuplicatas.size !== tags.length){
            warnings[4].style.display = "flex";
            warnings[4].innerText = "As tags não podem ser iguais.";
            return; 
        }
        console.log(tags);
        formData.append('tags', tags);
        warnings[4].style.display = "none";

    } else {
        warnings[4].style.display = "flex";
        return;
        
    }


    // Data
    let data = document.getElementById('data').value;
    if (data) {
        formData.append('data', data);
        warnings[5].style.display = "none";

    } else {
        warnings[5].style.display = "flex";
        return;
    }

    // Pegando os jogos que foram selecionados e os adicionando o formData
    let checkboxes = document.querySelectorAll('input[name="Jogo"]');
    let jogosSelecionados = [];
    for (const checkbox of checkboxes) {
        if (checkbox.checked) {
            jogosSelecionados.push(checkbox.value);
        }
    }
    formData.append('jogos', JSON.stringify(jogosSelecionados));


    // Pegando os eventos que foram selecionados e os adicionando o formData
    checkboxes = document.querySelectorAll('input[name="evento"]');
    let eventosSelecionados = [];
    for (const checkbox of checkboxes) {
        if (checkbox.checked) {
            eventosSelecionados.push(checkbox.value);
        }
    }
    formData.append('eventos', JSON.stringify(eventosSelecionados));

    /*          DESCONTINUADO
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
    */


    // Coletar os topicos, se existirem.
    let conteudoInfo = new Map();
    mainSection = document.querySelector(".info-opcional");
    secoes = mainSection.getElementsByTagName('section');

    // Joga os titulos,conteudos como "chave:dado" para o formData
    warnings[6].style.display = "none";
    if(secoes){
        for (let i = 0; i < secoes.length - 1; i++) {

            let inputs = secoes[i].getElementsByTagName('input');
            if (inputs.length > 0) {
                if(inputs[0].type === "file"){
                    conteudoInfo.set(secoes[i].id, inputs[0].files[0]);

                } else {
                    if(inputs[0].value === ''){
                        warnings[6].style.display = "flex";
                        return;
                    }
                    conteudoInfo.set(secoes[i].id, inputs[0].value);

                }
            }
            
            let textareas = secoes[i].getElementsByTagName('textarea');
            if (textareas.length > 0) {
                if(textareas[0].value === ''){
                    warnings[6].style.display = "flex";
                    return;
                }
                conteudoInfo.set(secoes[i].id, textareas[0].value);
            }
        }
    }


    conteudoInfo.forEach((valor, chave) => {
        if(valor === "")return;
    });

    // Conteúdo (transformando o Map em objeto)
    let conteudo = Object.fromEntries(conteudoInfo);

    // Agora temos o JSONs separados:
    let json = JSON.stringify(conteudo, null, 4);
    formData.append('conteudo', json);


    // Debuger
    for (let pair of formData.entries()) {
        console.log(pair[0] + ':', pair[1]);
    }


    if(id_post !== undefined){
        formData.append('post', id_post);
        dir = 'mandarPost.php';
        href = '../frontend/php/cms.php';

    } else {
        dir = '../../backend/mandarPost.php';
        href = 'cms.php';

    }
    

    enviarDadosParaPHP(formData, dir, href);

}

async function enviarDadosParaPHP(dados, dir, href){

    try {
        const response = await fetch(dir, {
            method: 'POST',
            body: dados
        });

        
        alert('Post enviado com sucesso!');
        const resultado = await response;
        console.log(resultado);

    } catch (error) {
        console.error('Erro:', error);
        
    }

    window.location.href = href;
}