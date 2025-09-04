document.addEventListener('DOMContentLoaded', function() {
    const closeModal = document.getElementById('close-modal');
    const modal = document.querySelector('.modal');

    closeModal.onclick = () => {modal.style.display = 'none';}

    function openModal(){
        modal.style.display = 'flex';
    }

    window.onclick = (e) => { if(e.target == modal) modal.style.display = 'none'; }
});