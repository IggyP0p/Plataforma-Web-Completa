<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <title>Noticias | Rito Gomes</title>
    <link rel="stylesheet" href="../css/root.css">
    <link rel="stylesheet" href="../css/noticias.css">

</head>
<body>
    
    <?php
        include("../../includes/navbar.php")
    ?>

    <aside>
        <div class="container-filtro">
            <span>FILTRAR</span>
            <ul>
                <li>Categoria:
                    <a id="opcao">ESPORTS</a>
                    <!--
                    <div class="opcao">
                        <input type="radio" id="esports" name="categoria">
                        <label>ESPORTS</label>
                    </div>
                    <div class="opcao">
                        <input type="radio" id="Patch-notes" name="categoria">
                        <label for="Patch-notes">PATCH NOTES</label>
                    </div>
                    -->
                    <a id="opcao">PATCH NOTES</a>
                </li>
                <li>Tag:
                    <a id="opcao">Dentro da Rito</a>
                    
                </li>
                <li>Jogo:
                    <a id="opcao">Liga das lendas</a>
                    <a id="opcao">VALOROSO</a>
                    <a id="opcao">Taticas de time</a>
                    <!--
                    <div class="opcao">
                        <input type="radio" id="LOL" name="jogo">
                        <label for="LOL">Liga das lendas</label>
                    </div>
                    <div class="opcao">
                        <input type="radio" id="VAVA" name="jogo">
                        <label for="VAVA">VALOROSO</label>
                    </div>
                    <div class="opcao">
                        <input type="radio" id="TFT" name="jogo">
                        <label for="TFT">Taticas de time</label>
                    </div>
                    -->
                </li>
                <li>Evento:
                    <a id="opcao">WORLDS</a>
                    <a id="opcao">CHAMPIONS</a>
                    <a id="opcao">LTA</a>
                    <!--
                    <div class="opcao">
                        <input type="radio" id="worlds" name="evento">
                        <label for="worlds">WORLDS</label>
                    </div>
                    <div class="opcao">
                        <input type="radio" id="champions" name="evento">
                        <label for="champions">CHAMPIONS</label>
                    </div>
                    <div class="opcao">
                        <input type="radio" id="LTA" name="evento">
                        <label for="LTA">LTA</label>
                    </div>
                    -->
                </li>
            </ul>
        </div>
    </aside>

    <main>
        <div class="ultimas-noticias">
            <h1>NOTICIAS</h1>

            <div class="container-noticias">
                <div class="noticia">
                    <div class="noticia-moldura">
                        <img src="../../utils/img/Champions_Paris.jpg">
                    </div>
                    <div class="noticia-info">
                        <span class="noticia-categoria">ESPORTS</span>
                        <hr>
                        <span class="noticia-data">04/09/2025</span>
                    </div>
                    <div class="noticia-descricao">
                        <h2 class="noticia-titulo">
                            Tudo o que você precisa saber sobre o Champions Paris
                        </h2>
                        <p class="noticia-conteudo">
                            Partidas, formato, datas e muito mais!
                        </p>
                    </div>
                </div>
                <div class="noticia">
                    <div class="noticia-moldura">
                        <img src="../../utils/img/vava_Patch_notes.jpg">
                    </div>
                    <div class="noticia-info">
                        <span class="noticia-categoria">ATUALIZAÇÕES DO JOGO</span>
                        <hr>
                        <span class="noticia-data">01/09/2025</span>
                    </div>
                    <div class="noticia-descricao">
                        <h2 class="noticia-titulo">
                            Atualização 11.04 do VALOROSO
                        </h2>
                        <p class="noticia-conteudo">
                            Novo mapa, Agentes e armas. Venha descobrir tudo sobre a nova atualização
                        </p>
                    </div>
                </div>
                
            </div>

            <div class="container-noticias">
                <div class="noticia">
                    <div class="noticia-moldura">
                        <img src="../../utils/img/tft_SET15.jpeg">
                    </div>
                    <div class="noticia-info">
                        <span class="noticia-categoria">ATUALIZAÇÕES DO JOGO</span>
                        <hr>
                        <span class="noticia-data">13/08/2025</span>
                    </div>
                    <div class="noticia-descricao">
                        <h2 class="noticia-titulo">
                            Nova atualização, SET 15 do TFT.
                        </h2>
                        <p class="noticia-conteudo">
                            Enfrentando a GenG de Chovy pela 89º vez, Faker faz um jogo implacável
                            de Janna mid e leva para casa o trófeu.
                        </p>
                    </div>
                </div>
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
            </div>


                <button class="load-btn">Carregar mais</button>
        </div>
    </main>

    <?php
        include("../../includes/footer.html")
    ?>
    
</body>
</html>