<?php

    session_start();

    require('../../backend/database/dbFunctions.php');

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <title>Noticias | Rito Gomes</title>
    <link rel="stylesheet" href="../css/root.css">
    <link rel="stylesheet" href="../css/noticias.css">
    <link rel="stylesheet" href="../css/navbar.css">
    <link rel="stylesheet" href="../css/footer.css">
    <script src="../js/modal.js" defer></script>
    <script src="../js/botoesFiltro.js" defer></script>

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
                    <a class="default opcao" name="categoria" id="1" onclick="filtrar(this)">ESPORTS</a>
                    <a class="default opcao" name="categoria" id="2" onclick="filtrar(this)">ATUALIZAÇÃO DE JOGO</a>
                    <a class="default opcao" name="categoria" id="3" onclick="filtrar(this)">BLOG</a>
                </li>
                <li>Jogo:
                    <a class="default opcao" name="jogo" id="1" onclick="filtrar(this)">Liga das Lendas</a>
                    <a class="default opcao" name="jogo" id="2" onclick="filtrar(this)">Táticas de Time</a>
                    <a class="default opcao" name="jogo" id="3" onclick="filtrar(this)">Valoroso</a>
                </li>
                <li>Evento:
                    <a class="default opcao" name="evento" id="1" onclick="filtrar(this)">Worlds</a>
                    <a class="default opcao" name="evento" id="2" onclick="filtrar(this)">Champions</a>
                    <a class="default opcao" name="evento" id="3" onclick="filtrar(this)">Golden Spatula</a>
                </li>
                <li>Tags:
                    <?php

                        $nomes_das_tags = cataTags();

                        foreach($nomes_das_tags as $tag){
                            echo "<a class='default opcao' name='tag' id='{$tag['id_tag']}' onclick='filtrar(this)'>{$tag['nome_tag']}</a>";
                        }
                    ?>
                </li>
            </ul>
        </div>
    </aside>

    <main>
        <div class="ultimas-noticias">
            <h1>NOTICIAS</h1>

            <div class="container-noticias" id="container-noticias">
                <?php

                    $dados = listarPostsFiltrado(4, null, null, null, null);

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
                                <div class="noticia" id="{$post['id_post']}">
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

            <button class="load-btn" id="load-btn">Carregar mais</button>
        </div>
    </main>

    <?php
        include("../../includes/footer.html")
    ?>
    
</body>
</html>