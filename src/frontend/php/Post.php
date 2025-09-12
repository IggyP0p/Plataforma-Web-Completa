<?php
    session_start();
    $id_post = $_GET['id_post'];

    require('../../backend/database/cmsCRUD.php');
    require('../../backend/database/dbFunctions.php');

    $dados = resgataPost($id_post);

    // Pegando o nome da categoria
    $id_categoria = $dados['post']['id_categoria'];
    $nome_categoria = resgataCategoria($id_categoria);

    // Formatando a data para uso
    $data = substr($dados['post']['data_criacao'], 0, 10);

    // Pegando imagem para uso
    $imagem = resgataImagem($id_post);

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <title>Noticias</title>

    <link rel="stylesheet" href="../css/root.css">
    <link rel="stylesheet" href="../css/post.css">

    <style>
        
        .fundo-blur {
            background-image: url("<?=$imagem['imagem']?>");
        }

    </style>
    
</head>
<body>
    <?php
        include("../../includes/navbar.php");
    ?>

    <div class="fundo-blur">
        
    </div>

    <main>
            
        <div class="imagem-moldura">
            <img src="<?=$imagem['imagem']?>">
        </div>

        <h1>
            <?= $dados['post']['titulo']?>
        </h1>

        <div class="subtitulo">
            <?= $dados['post']['subtitulo']?>
        </div>

        <hr>

        <span>
            <?= $nome_categoria['nome_categoria'] ?> | <?= $data ?>
        </span>

        <div class="conteudo">
            <?php

                $conteudo = $dados['post']['conteudo'];

                foreach($conteudo as $topico){

                    if(str_contains($topico, 'Titulo')){
                        echo <<<html
                            <h2>
                                {$topico}
                            </h2>
                        html;
                    }

                    if(str_contains($topico, 'Texto')){
                        echo <<<html
                            <p>{$topico}</p>
                        html;
                    }
                }
            ?>
            
        </div>

        <div class="comentarios">
            <h2>Deixe um comentário</h2>
            <form class="container-comentario" method="post" action="../../backend/salvarComentario.php">
                <textarea name="comentario"></textarea>
                <button type="submit">Responder</button>
                <input name="id_post" value="<?= $id_post ?>">
            </form>
            <?php
            
                $comentarios_pais = catarComentariosPais($id_post);

                foreach($comentarios_pais as $comentarios){

                    $comentarios_filhos = catarComentariosFilhos($id_post, $comentarios['id_comentario']);

                    echo<<<html
                        <form class="container-comentario" method="post" action="../../backend/salvarComentario.php">
                        
                            <span class="nome-usuario">{$comentarios['nome']}</span>
                            <textarea readonly>{$comentarios['conteudo']}</textarea>
                            <input name="id_comentario_pai" value="{$comentarios['id_comentario']}">
                        html;
                            foreach($comentarios_filhos as $subcomentarios){
                                echo<<<html
                                <div class="container-comentario filho">
                                    <span class="nome-usuario">{$subcomentarios['nome']}</span>
                                    <textarea readonly>{$subcomentarios['conteudo']}</textarea>
                                </div>
                                html;
                            }
                            echo<<<html
                                <div class="container-comentario filho">
                                    <textarea name="comentario"></textarea>
                                    <button type="submit">Responder</button>
                                    <input name="id_post" value="{$id_post}">
                                </div>
                        </form>
                html;
                }

            ?>
        </div>

    </main>

    <?php
        include("../../includes/footer.html")
    ?>

</body>
</html>