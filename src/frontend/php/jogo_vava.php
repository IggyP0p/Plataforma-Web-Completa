<?php

    session_start();

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <title>Home | Valorant</title>
    <link rel="stylesheet" href="../css/root.css">
    <link rel="stylesheet" href="../css/jogo_vava.css">
    <link rel="stylesheet" href="../css/navbar.css">
    <link rel="stylesheet" href="../css/footer.css">
    <script src="../frontend/js/modal.js"></script>
    <script src="../js/modal.js"></script>

</head>
<body>
    
    <?php
        include("../../includes/navbar.php")
    ?>

    <div class="apresentacao">
        <div class="foreground">
            <img src="../../utils/img/vava_logo.png">

            <p>
                VALORANT – Jogo de tiro tático 5x5 estrelando Agentes com habilidades únicas
            </p>

            <button>
                JOGUE GRÁTIS
            </button>
        </div>
    </div>

    <div class="ultimas-noticias">
        <h1>ULTIMAS NOTICIAS</h1>

        <div class="container-noticias">
            <?php
            
                include("../../backend/database/dbFunctions.php");

                $dados = listarPostsFiltrado(3, [3], null, null, null);

                foreach ($dados as $post) {
                    // CORTAR AS STRINGS
                    $titulo = $post['titulo'];
                    $subtitulo = $post['subtitulo'];
                    $data = $post['data_criacao'];
                    $tamanhoTitulo = 38;
                    $tamanhoSubtitulo = 93;

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
                Diversos agentes <br> para você escolher
            </h2>
            <p>
                Mais do que armas e munição, VALORANT inclui agentes com habilidades adaptativas, rápidas e letais, que criam oportunidades para você exibir sua mecânica de tiro.
            </p>
            <div class="container-btns">
                <button class="btn-1">ver todos os agentes</button>
            </div>
        </div>
        
        <div class="personagens-img">
            <img src="../../utils/img/vava_Omen.jpeg">
        </div>
    </div>

    <div class="mapas">
        <div class="mapas-img">
            
        </div>
        <div class="mapas-texto">
            <h2>
                OS MAPAS
            </h2>
            <p>
                Cada mapa serve como um palco para mostrar sua criatividade.
            </p>
            <div class="container-btns">
                <button class="btn-2">Jogue agora</button>
            </div>
        </div>
    </div>

    <?php
        include("../../includes/footer.html")
    ?>
    
</body>
</html>