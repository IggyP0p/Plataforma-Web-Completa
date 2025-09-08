<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <title>Quem somos | Rito Gomes</title>

    <link rel="stylesheet" href="../css/root.css">
    <link rel="stylesheet" href="../css/empresa.css">
    
</head>
<body>

    <?php
        include("../../includes/navbar.php")
    ?>

    <section class="slideshow-container">
        
        <div class="slide fade">
            <div class="slide-texto">
                <span>NOSSOS VALORES</span>
                <h2>1. LEVAMOS NOSSOS <br> JOGOS A SÉRIO</h2>
                <p>
                    Os jogadores merecem alguém que se importe tanto quanto eles. Somos tão envolvidos quanto as pessoas que veem jogos como um objetivo de vida, porque nos identificamos com elas.
                </p>
            </div>
            <img src="../../utils/img/empresa_jogos.png">
        </div>

        <div class="slide fade">
            <div class="slide-texto">
                <span>NOSSOS VALORES</span>
                <h2>2. NA RIOT, SOMOS UM</h2>
                <p>
                    Nosso foco está no jogador, não no produto. Colaboramos entre equipes e com o mundo todo para criar experiências únicas da Riot que são muito mais do que a soma de suas partes.
                </p>
            </div>  
            <img src="../../utils/img/empresa_escritorio.jpg">
        </div>

        <div class="slide fade">
            <div class="slide-texto">
                <span>NOSSOS VALORES</span>
                <h2>3. O JOGADOR SEMPRE <br> VEM EM PRIMEIRO <br> LUGAR</h2>
                <p>
                    Tudo que fazemos é para os jogadores. Nosso foco constante nos jogadores nos faz criar experiências de jogo mais significativas e duradouras.
                </p>
            </div>
            <img src="../../utils/img/empresa_campeonato.png">
        </div>

        <!-- Botões que movem o slide -->
        <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
        <a class="next" onclick="plusSlides(1)">&#10095;</a>
        
        <div class="dots">
            <span class="dot" onclick="currentSlide(0)"></span> 
            <span class="dot" onclick="currentSlide(1)"></span> 
            <span class="dot" onclick="currentSlide(2)"></span> 
        </div>
        
    </section>

    
    

    <section class="quem-somos">
        <div class="container">
            <img src="../../utils/img/empresa_logo.png">
            <div>
                <h2>
                    QUEM SOMOS
                </h2>
                <p>
                    A Rito Gomes foi fundada em 2006 com o objetivo de criar jogos e vivências que visam melhorar a experiência dos jogadores. Desde então, crescemos e já somos mais de 4.500 Rioters em mais de 20 escritórios ao redor do mundo, trazendo uma perspectiva global para os jogos que criamos e personagens que desenvolvemos. Das ruas de Piltover aos laboratórios de radianita da Terra Alfa, adoramos criar jogos e servir as pessoas que os consomem.
                </p>
            </div>
        </div>
    </section>

    <section class="sede">
        <div class="container">
            <h2>
                nós somos GLOBAIS
            </h2>
            <p>
                Nosso QG fica na ensolarada Los Angeles, mas servimos os jogadores em escritórios do mundo todo. Em nossos escritórios globais, Rioters transformam a experiência de jogo das comunidades de suas regiões. Estamos buscando gamers apaixonados e líderes em suas áreas de atuação para nos ajudar a agregar valor às pessoas que jogam, não importa onde elas estejam. 
            </p>
            <button>
                Conheça nossos escritórios
            </button>
        </div>
    </section>


    <?php
        include("../../includes/footer.html")
    ?>

    <script src="../js/slideShow.js"></script>
</body>
</html>