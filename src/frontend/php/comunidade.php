<?php

    session_start();

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <title>Comunidade | Rito Gomes</title>
    <link rel="stylesheet" href="../css/root.css">
    <link rel="stylesheet" href="../css/comunidade.css">
    <link rel="stylesheet" href="../css/navbar.css">
    <link rel="stylesheet" href="../css/footer.css">
    <script src="../js/modal.js" defer></script>
    
</head>
<body>
    
    <?php
        include("../../includes/navbar.php")
    ?>

    <section class="introducao">
        <div class="container-introducao">
            <h1>
                COMUNIDADE
            </h1>
            <p>De streamers em destaque a criações da comunidade, veja o que há de novo por aí.</p>
            
        </div>
    </section>

    <main>
        <h2>Somos mais de 1 milhão de jogadores no mundo inteiro!</h2>
        <div class="container-texto">
            <img class="imagem-1" src="../../utils/img/Comunidade.jpg">
            <p>A paixão pelos jogos vai além das telas. É sobre fazer parte de uma comunidade que se encontra, celebra e se inspira. Nossos milhões de jogadores mostram a força e a diversidade da nossa família global</p>
        </div>
        <div class="container-texto">
            <p>Somos uma equipe global de criadores, pensadores e jogadores dedicados a construir experiências que unem pessoas. Porque a diversidade de ideias é o que nos torna mais fortes</p>
            <img class="imagem-2" src="../../utils/img/Comunidade_3.jpg">
        </div>
        <div class="container-texto">
            <img class="imagem-3" src="../../utils/img/Comunidade_2.jpg">
            <p> Nossa equipe é tão diversificada quanto nossos jogadores. Pessoas de diferentes origens e culturas se unem para criar jogos que conectam e inspiram milhões</p>
        </div>
        
        
        

    </main>

    <section class="foruns">
        <p>Junte-se a nós. Descubra novas amizades, explore mundos incríveis e encontre o seu lugar na nossa comunidade de mais de 1 milhão de jogadores.</p>

        <button>
            A sua jornada começa aqui
        </button>
    </section>

    <?php
        include("../../includes/footer.html")
    ?>
    
</body>
</html>