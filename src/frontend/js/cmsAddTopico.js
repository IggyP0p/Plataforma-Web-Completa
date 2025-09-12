const lastSelectedOptions = new Map();

let secaoTitulo =`
        <div class="cabecalho">
            <label>Titulo:</label>
            <span onclick="cancelaTopico(this)">&times;</span>
        </div>
        <input type="text">
`;

let secaoTexto =`
        <div class="cabecalho">
            <label>Conteúdo:</label>
            <span onclick="cancelaTopico(this)">&times;</span>
        </div>
        <textarea></textarea>
`;

let secaoImagem =`
        <div class="cabecalho">
            <label>Adicionar Imagem:</label>
            <span onclick="cancelaTopico(this)">&times;</span>
        </div>
        <input type="file">
        <p>Prefira imagens com proporção de 0.5625. (ex: "1280x720")</p>
`;

let secaoSubcategoria =`
        <div class="cabecalho">
            <label>Subcategoria:</label>
            <span onclick="cancelaTopico(this)">&times;</span>
        </div>
        <select name="categoria" id="categoria" onchange="tiraOpcao(this)">
            <option value="">-- SELECIONE --</option>
            <option value="1">ESPORTS</option>
            <option value="2">ATUALIZACAO DE JOGO</option>
            <option value="3">BLOG</option>
        </select>
`;

function consertaNomes(texto){
    let mainSection = document.querySelector(".info-opcional");

    let secoes = mainSection.getElementsByTagName("section");

    let idAntigo;

    for(i=0; i<secoes.length -1; i++){
        idAntigo = secoes[i].id.substring(0, secoes[i].id.length - 1);

        if(!idAntigo){
            secoes[i].id = "topico-" + texto + i ;
        } else {
            secoes[i].id = idAntigo + i ;
        }
    }
}

function adicionaTitulo(){
    // Tela na qual é adicionada os inputs
    let Painel = document.querySelector(".info-opcional");
    let btnSecao = document.querySelector(".btns-add");
    let novaSecao = document.createElement('section');

    novaSecao.innerHTML = secaoTitulo;

    Painel.insertBefore(novaSecao, btnSecao);

    consertaNomes("Titulo-");
}

function adicionaTexto(){
    // Tela na qual é adicionada os inputs
    let Painel = document.querySelector(".info-opcional");
    let btnSecao = document.querySelector(".btns-add");
    let novaSecao = document.createElement('section');

    novaSecao.innerHTML = secaoTexto;

    Painel.insertBefore(novaSecao, btnSecao);

    consertaNomes("Texto-");
}

/*      DESENVOLVIMENTO FUTURO
function adicionaImagem(){
    // Tela na qual é adicionada os inputs
    let Painel = document.querySelector(".info-opcional");
    let btnSecao = document.querySelector(".btns-add");
    let novaSecao = document.createElement('section');

    novaSecao.innerHTML = secaoImagem;

    Painel.insertBefore(novaSecao, btnSecao);

    consertaNomes("Imagem-");
}
*/

/*      DESENVOLVIMENTO FUTURO
function adicionaSubcategoria(obj){
    // Tela na qual é adicionada os inputs
    let Painel = document.querySelector(".info-obrigatoria");
    let novaSecao = document.createElement('section');

    novaSecao.innerHTML = secaoSubcategoria;

    Painel.insertBefore(novaSecao, obj);

    // Conserta os Nomes das subcategorias
    let mainSection = document.querySelector(".info-obrigatoria");

    let secoes = mainSection.getElementsByTagName("section");

    for(i=0; i<secoes.length; i++){
        secoes[i].id = "subcategoria-" + i ;
    }

    // Remove as opções ja selecionadas
    let novoSelect = secoes[secoes.length - 1].getElementsByTagName('select');

    for (const [selectElement, value] of lastSelectedOptions.entries()) {
        if (value) {
            const optionToHide = novoSelect[0].querySelector(`option[value="${value}"]`);
            if (optionToHide) {
                optionToHide.style.display = 'none';
            }
        }
    }

}
*/

function cancelaTopico(obj){
    let sectionPai = obj.closest('section');

    sectionPai.remove();
}

function tiraOpcao(obj){
    const allSelects = document.querySelectorAll('select[name="categoria"]');
    const selectedValue = obj.value;

    // 1. Torna visível a opção que estava oculta anteriormente
    if (lastSelectedOptions.has(obj)) {
        const lastHiddenValue = lastSelectedOptions.get(obj);
        allSelects.forEach(otherSelect => {
            if (otherSelect !== obj) {
                const optionToShow = otherSelect.querySelector(`option[value="${lastHiddenValue}"]`);
                if (optionToShow) {
                    optionToShow.style.display = '';
                }
            }
        });
    }

    // 2. Oculta a nova opção selecionada em todos os outros <selects>
    if (selectedValue) {
        allSelects.forEach(otherSelect => {
            // Garante que a opção não será ocultada no <select> que disparou a função
            if (otherSelect !== obj) {
                const optionToHide = otherSelect.querySelector(`option[value="${selectedValue}"]`);
                if (optionToHide) {
                    optionToHide.style.display = 'none';
                }
            }
        });
    }

    // 3. Salva a opção selecionada atual para futuras referências
    lastSelectedOptions.set(obj, selectedValue);

}