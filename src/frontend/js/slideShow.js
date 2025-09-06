
/* Inicializando meu index do slide */ 
let slideIndex = 0;
/* Chamo a função pra aparecer a primeira imagem */ 
showSlides(slideIndex);

// Botões de próximo/anterior
function plusSlides(n) {
    showSlides(slideIndex += n);
}

// Controle pelas bolinhas
function currentSlide(n) {
    showSlides(slideIndex = n);
}

function showSlides(n) {
    let slides = document.getElementsByClassName("slide");
    let dots = document.getElementsByClassName("dot");
    let btnNext = document.getElementsByClassName("next");
    let btnPrev = document.getElementsByClassName("prev");

    // Retira slides anteriores
    for (let i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";  
    }
    // Desativa o dot anterior
    for (let i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace("dot active", "dot");
    }
    // Dando o destaque para a imagem e o dot referente a ela
    slides[n].style.display = "block";  
    dots[n].className = "dot active";

    // Retirando os botões caso o index chegue ao inicio ou fim do array
    // E os colocando de volta caso não
    if(slideIndex == 2){
        btnNext[0].style.display = "none"; 
    } else {
        btnNext[0].style.display = "flex";
    }
    
    if(slideIndex == 0){
        btnPrev[0].style.display = "none"; 
    } else {
        btnPrev[0].style.display = "flex"; 
    }
}