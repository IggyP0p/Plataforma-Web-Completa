function openModal(){
    let modal = document.querySelector('.modal');

    modal.style.display = 'flex';
}

function closeModal(){
    let modal = document.querySelector('.modal');

    modal.style.display = 'none';
}

window.onclick = (e) => { 
    let modal = document.querySelector('.modal');
    if(e.target == modal) modal.style.display = 'none'; 
}
