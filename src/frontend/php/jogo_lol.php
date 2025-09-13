<?php

    session_start();

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <title>Home | Liga das lendas</title>
    <link rel="stylesheet" href="../css/root.css">
    <link rel="stylesheet" href="../css/jogo_lol.css">
    <link rel="stylesheet" href="../css/navbar.css">
    <link rel="stylesheet" href="../css/footer.css">
    <script src="../frontend/js/modal.js" defer></script>
    <script src="../js/modal.js" defer></script>

</head>
<body>
    
    <?php
        include("../../includes/navbar.php")
    ?>

    <div class="apresentacao">
        <div class="foreground">
            <img src="../../utils/img/lol_logo.png">

            <p>
                LEAGUE OF LEGENDS: um MOBA 5v5 em que as <br>
                equipes batalham para destruir o Nexus inimigo.
            </p>

            <button>
                JOGUE DE GRAÇA
            </button>
        </div>
    </div>

    
    <div class="ultimas-noticias">
        <h1>ULTIMAS NOTICIAS</h1>

        <div class="container-noticias">
            <?php
            
                include("../../backend/database/dbFunctions.php");

                $dados = listarPostsFiltrado(3, [1], null, null, null);

                foreach ($dados as $post) {
                    // CORTAR AS STRINGS
                    $titulo = $post['titulo'];
                    $subtitulo = $post['subtitulo'];
                    $data = $post['data_criacao'];
                    $tamanhoTitulo = 34;
                    $tamanhoSubtitulo = 102;

                    if(strlen($titulo) > $tamanhoTitulo){
                        $titulo = substr($titulo, 0, $tamanhoTitulo - 3);
                        $titulo = str_pad($titulo, $tamanhoTitulo, ".", STR_PAD_RIGHT);
                    }

                    if(strlen($subtitulo) > $tamanhoSubtitulo){
                        $subtitulo = substr($subtitulo, 0, $tamanhoSubtitulo - 3);
                        $subtitulo = str_pad($subtitulo, $tamanhoSubtitulo, ".", STR_PAD_RIGHT);
                    }

                    $data = substr($data, 0, 11);

                    echo <<<html
                            <div class="noticia" onclick="window.location.href = 'Post.php?id_post={$post['id_post']}';">
                                <div class="noticia-moldura">
                                    <img src="{$post['imagem']}">
                                </div>
                                <div class="noticia-info">
                                    <span class="noticia-categoria">{$post['nome_categoria']}</span>
                                    <hr>
                                    <span class="noticia-data">{$data}</span>
                                </div>
                                <div class="noticia-descricao">
                                    <h2 class="noticia-titulo">
                                        {$titulo}
                                    </h2>
                                    <p class="noticia-conteudo">
                                        {$subtitulo}
                                    </p>
                                </div>
                            </div>
                        html
                    ;
                }
            ?>
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