const loadButton = document.querySelector('#load-btn');
let categoriasSelecionadas = [];
let jogosSelecionados = [];
let eventosSelecionados = [];
let tagsSelecionadas = [];
let limite = 4;

paginasNoticias();

let secao =`
            <div class="noticia-moldura">
                <img id="imagem" src="">
            </div>
            <div class="noticia-info">
                <span class="noticia-categoria" id="categoria"></span>
                <hr>
                <span class="noticia-data" id="data"></span>
            </div>
            <div class="noticia-descricao">
                <h2 class="noticia-titulo" id="titulo">
                </h2>
                <p class="noticia-conteudo" id="subtitulo">
                </p>
            </div>
`;

document.querySelectorAll('.opcao').forEach(botao => {
    botao.addEventListener('click', (evento) => {
        // Usa classList.toggle para alternar a classe 'clicked'
        evento.currentTarget.classList.toggle('clicked');

    });
});

loadButton.addEventListener('click', () => {
    limite += 4;

    filtrar();
});


function filtrar(obj){
    
    if(obj){

        if(obj.name === 'categoria'){
            if(categoriasSelecionadas.includes(obj.id)){
                categoriasSelecionadas=categoriasSelecionadas.filter(item => item !== obj.id);

            } else {
                categoriasSelecionadas.push(obj.id);

            }

        };

        if(obj.name === 'jogo'){
            if(jogosSelecionados.includes(obj.id)){
                jogosSelecionados=jogosSelecionados.filter(item => item !== obj.id);

            } else {
                jogosSelecionados.push(obj.id);
                
            }

        };

        if(obj.name === 'evento'){
            if(eventosSelecionados.includes(obj.id)){
                eventosSelecionados=eventosSelecionados.filter(item => item !== obj.id);

            } else {
                eventosSelecionados.push(obj.id);
                
            }

        };

    
        if(obj.name === 'tag'){
            if(tagsSelecionadas.includes(obj.id)){
                tagsSelecionadas=tagsSelecionadas.filter(item => item !== obj.id);

            } else {
                tagsSelecionadas.push(obj.id);
                
            }

        };
    }

    let formData = new FormData();


    formData.append('categorias', JSON.stringify(categoriasSelecionadas));
    formData.append('jogos', JSON.stringify(jogosSelecionados));
    formData.append('eventos', JSON.stringify(eventosSelecionados));
    formData.append('tags', JSON.stringify(tagsSelecionadas));
    formData.append('limite', limite);

    enviarDadosParaPHP(formData);

}

async function enviarDadosParaPHP(dados){

    try {
        const response = await fetch('../../backend/filtrarPostagens.php', {
            method: 'POST',
            body: dados
        });

        const resultado = await response.json();

        atualizarTela(resultado);

    } catch (error) {
        console.error('Erro:', error);
        
    }

}

function atualizarTela(dados){
    const container = document.getElementById('container-noticias');
    container.innerHTML = ''; // limpa a tela

    dados.forEach(post => {
        const div = document.createElement('div');
        div.classList.add('noticia');
        div.innerHTML = secao;

        div.id = post.id_post;

        img = div.querySelector('#imagem');
        img.src = post.imagem;

        cat = div.querySelector('#categoria');
        cat.textContent = post.categorias;

        data = div.querySelector('#data');
        data.textContent = post.data_criacao;

        titulo = div.querySelector('#titulo');
        titulo.textContent = post.titulo;

        titulo = div.querySelector('#titulo');
        titulo.textContent = post.titulo;

        subtitulo = div.querySelector('#subtitulo');
        subtitulo.textContent = post.subtitulo;

        container.appendChild(div);
    });

    paginasNoticias();
}

function paginasNoticias(){
    document.querySelectorAll('.noticia').forEach(botao => {
        botao.addEventListener('click', (evento) => {

            tag = evento.currentTarget.id;

            window.location.href = `Post.php?id_post=${tag}`;

        });
    });
}
