// Função para quando o usuario esta cadastrado abrir o menu do usuario
function openMenu(){
    let menu = document.querySelector('.menu');

    if(menu.style.display == 'flex'){
        menu.style.display = 'none';
    } else {
        menu.style.display = 'flex';
    }

}

// Fecha a página do modal clicando fora da tela
window.onclick = (event) => { 
    let menu = document.querySelector('.menu');

    if(event.target == menu) menu.style.display = 'none'; 
}   

// Função para quando o usuario tem que se cadastrar
function openModal(){
    let modal = document.querySelector('.modal');

    modal.style.display = 'flex';
}

// Fecha a página do modal
function closeModal(){
    let modal = document.querySelector('.modal');

    modal.style.display = 'none';
}

// Fecha a página do modal clicando fora da tela
window.onclick = (e) => { 
    let modal = document.querySelector('.modal');
    if(e.target == modal) modal.style.display = 'none'; 
}
