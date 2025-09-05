<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <title>Home | Liga das lendas</title>
    <link rel="stylesheet" href="../css/root.css">
    <link rel="stylesheet" href="../css/jogo_lol.css">

</head>
<body>
    
    <?php
        include("../../includes/navbar.html")
    ?>

    <div class="apresentacao">

    <!-- 
        <img src="../../../utils/img/LOL_logo.png">

        <p>
            LEAGUE OF LEGENDS:um MOBA 5v5 em que as <br>
            equipes batalham para destruir o Nexus inimigo.
        </p>

        <button>
            JOGUE DE GRAÇA
        </button>
    -->
        
    </div>

    <div class="ultimas-noticias">
        <h1>ULTIMAS NOTICIAS</h1>

        <div class="container-noticias">
            <div class="noticia">
                <div class="noticia-moldura">
                    <img src="../../utils/img/oldFaker.png">
                </div>
                <div class="noticia-info">
                    <span class="noticia-categoria">ESPORTS</span>
                    <hr>
                    <span class="noticia-data">03/09/2025</span>
                </div>
                <div class="noticia-descricao">
                    <h2 class="noticia-titulo">
                        Após vencer seu 100º Mundial, Faker escolhe skin da Janna.
                    </h2>
                    <p class="noticia-conteudo">
                        Enfrentando a GenG de Chovy pela 89º vez, Faker faz um jogo implacável
                        de Janna mid e leva para casa o trófeu.
                    </p>
                </div>
            </div>
            <div class="noticia">
                <div class="noticia-moldura">
                    <img src="../../utils/img/Ferias_com_Axt.jpeg">
                </div>
                <div class="noticia-info">
                    <span class="noticia-categoria">ATUALIZAÇÕES DO JOGO</span>
                    <hr>
                    <span class="noticia-data">01/09/2025</span>
                </div>
                <div class="noticia-descricao">
                    <h2 class="noticia-titulo">
                        Em homenagem a Streamer BR, a rito gomes lança skin.
                    </h2>
                    <p class="noticia-conteudo">
                        Após pedido de diversos fãs do famoso streamer Axt, conhecido pelo seu amor
                        por praias. A Rito Gomes decide criar uma skin homenageando o streamer.
                    </p>
                </div>
            </div>
            <div class="noticia">
                <div class="noticia-moldura">
                    <img src="../../utils/img/LLL Kyuzans.webp">
                </div>
                <div class="noticia-info">
                    <span class="noticia-categoria">ESPORTS</span>
                    <hr>
                    <span class="noticia-data">23/08/2025</span>
                </div>
                <div class="noticia-descricao">
                    <h2 class="noticia-titulo">
                        LLL Kyuzans é contratato pela Dor Jogos.
                    </h2>
                    <p class="noticia-conteudo">
                        Mesmo errado 20 tiros e desenhando mais os inimigos na parede do que
                        realmente os atingindo, o pro Gustavo Kyuzans Minerva é contratado.
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class="personagens">
        <div class="personagens-texto">
            <h2>
                Diversos campeões <br> para você escolher
            </h2>
            <p>
                Quer você goste de se jogar na batalha, ajudar seus aliados ou os dois, existe um lugar para você no Rift.
            </p>
            <div class="container-btns">
                <button class="btn-1">Descubra mais campeões</button>
                <button class="btn-2">Jogar agora</button>
            </div>
        </div>
        
        <div class="personagens-img">
            <img src="../../utils/img/Zed.png">
        </div>
    </div>

    <div class="mapas">
        <div class="mapas-img">
            
        </div>
        <div class="mapas-texto">
            <p>
                Explore os mapas de
            </p>
            <h2>
                Runeterra
            </h2>
            <p>
                E jogue de diversas maneiras com seus amigos.
            </p>
            <div class="container-btns">
                <button class="btn-1">Jogue agora</button>
            </div>
        </div>
    </div>

    <?php
        include("../../includes/footer.html")
    ?>
    
</body>
</html>