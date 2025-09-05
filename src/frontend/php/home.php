<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <title>Home | Rito Gomes</title>
    <link rel="stylesheet" href="../css/root.css">
    <link rel="stylesheet" href="../css/index.css">

</head>
<body>

    <?php
        include("../../includes/navbar.html")
    ?>

    <section class="apresentacao">
        <!-- frase de efeito na frente da imagem -->
        <div class="frs-eft">
            <span>Desafie seus inimigos!<br>Se torne uma lenda!</span>
        </div>
        
        <img class="welcome-photo" src="../../utils/img/Arcano.webp">
    </section>

    <section class="noticias">
        <header>
            <h2>NOTÍCIAS</h2>

            <a href="#">Saiba mais!</a>
        </header>
        
        <article class="article-principal">
            <div class="img-container">
                <img src="../../utils/img/oldFaker.png">
            </div>

            <div class="texto-noticias">
                <p class="texto-principal">
                    Após vencer seu 100º Mundial, Faker escolhe skin da Janna.
                </p>
                <a></a>
            </div>
        </article>
        
        <article class="primeira-article sub-article">
            <div class="texto-noticias">
                <p class="sub-texto">
                    Em homenagem a Streamer BR, a rito gomes lança skin...
                </p>
                <a></a>
            </div>

            <img src="../../utils/img/Ferias_com_Axt.jpeg">
        </article>

        <article class="segunda-article sub-article">
            <div class="texto-noticias">
                <p class="sub-texto">
                    Novo card game da rito gomes é o jogo do momento!
                </p>
                <a></a>
            </div>

            <img src="../../utils/img/legendsOFruneterra.jpg">
        </article>

        
        <article class="terceira-article sub-article">
            <div class="texto-noticias">
                <p class="sub-texto">
                    LLL Kyuzans é contratato pela Dor Jogos...
                </p>
                <a></a>
            </div>

            <img src="../../utils/img/LLL Kyuzans.webp">
        </article>

        <article class="quarta-article sub-article">
            <div class="texto-noticias">
                <p class="sub-texto">
                    LLL Kyuzans é contratato pela Dor Jogos para jogar o Valoroso Champions!
                </p>
                <a></a>
            </div>

            <img src="../../utils/img/LLL Kyuzans.webp">
        </article>


    </section>

    <section class="nossos-jogos">

        <header>
            <h2>Nossos Jogos</h2>
        </header>

        <div class="container-jogos">
            
            <article class="LOL">
                <img class="card" src="../../utils/img/LOL.png">
            </article>

            <article class="valoroso">
                <img class="card" src="../../utils/img/Valoroso.png">
            </article>

            <article class="TFT">
                <img class="card" src="../../utils/img/TFT.png">
            </article>
        </div>
        
    </section>

    <section class="trabalhe-conosco">
        <div class="texto-trabalhe-conosco">
            <header>
                <h2>Estamos Contratando!</h2>
            </header>

            <p>
                Você vive e respira games? Traga sua paixão e talento para a revolução.
                Na Rito Gomes, criamos experiências épicas para milhões de jogadores ao redor do mundo.
                Venha transformar o futuro dos jogos conosco!
            </p>

            <button>Ir agora!</button>
        </div>
        
        <img src="../../utils/img/Comunidade.jpg">
    </section>

    <?php
        include("../../includes/footer.html")
    ?>
    
</body>
</html>