<?php

    session_start();

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <title>Home | Rito Gomes</title>
    <link rel="stylesheet" href="../css/root.css">
    <link rel="stylesheet" href="../css/index.css">
    <link rel="stylesheet" href="../css/navbar.css">
    <link rel="stylesheet" href="../css/footer.css">
    <script src="../frontend/js/modal.js" defer></script>
    <script src="../js/modal.js" defer></script>

</head>
<body>

    <?php
        include("../../includes/navbar.php");
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

        <?php

            include("../../backend/database/dbFunctions.php");

            $dados = listarPosts(5);

            echo <<<html
                        <article class="article-principal" onclick="window.location.href = 'Post.php?id_post={$dados["0"]["id_post"]}';">
                            <div class="img-container">
                                <img src='{$dados["0"]["imagem"]}'>
                            </div>
                            

                            <div class="texto-noticias">
                                <p class="texto-principal">
                                    {$dados["0"]["titulo"]}
                                </p>
                                <a></a>
                            </div>
                        </article>
                        <article class="primeira-article sub-article" onclick="window.location.href = 'Post.php?id_post={$dados["1"]["id_post"]}'">
                            <div class="texto-noticias">
                                <p class="sub-texto">
                                    {$dados["1"]["titulo"]}
                                </p>
                                <a></a>
                            </div>

                            <img src="{$dados["1"]["imagem"]}">
                        </article>
                        <article class="segunda-article sub-article" onclick="window.location.href = 'Post.php?id_post={$dados["2"]["id_post"]}'">
                            <div class="texto-noticias">
                                <p class="sub-texto">
                                    {$dados["2"]["titulo"]}
                                </p>
                                <a></a>
                            </div>

                            <img src="{$dados["2"]["imagem"]}">
                        </article>
                        <article class="terceira-article sub-article" onclick="window.location.href = 'Post.php?id_post={$dados["3"]["id_post"]}'">
                            <div class="texto-noticias">
                                <p class="sub-texto">
                                    {$dados["3"]["titulo"]}
                                </p>
                                <a></a>
                            </div>

                            <img src="{$dados["3"]["imagem"]}">
                        </article>
                        <article class="quarta-article sub-article" onclick="window.location.href = 'Post.php?id_post={$dados["4"]["id_post"]}'">
                            <div class="texto-noticias">
                                <p class="sub-texto">
                                    {$dados["4"]["titulo"]}
                                </p>
                                <a></a>
                            </div>

                            <img src="{$dados["4"]["imagem"]}">
                        </article>
                    html
            ;


        ?>
    
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