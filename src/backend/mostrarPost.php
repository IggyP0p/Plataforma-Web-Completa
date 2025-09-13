<?php

    require('database/dbFunctions.php');

    $dados = listarPosts(0);
    
    foreach ($dados as $post) {
        // CORTAR AS STRINGS
        $titulo = $post['titulo'];
        $subtitulo = $post['subtitulo'];
        $tamanho = 30;

        if(strlen($titulo) > $tamanho){
            $titulo = substr($titulo, 0, $tamanho - 3);
            $titulo = str_pad($titulo, $tamanho, ".", STR_PAD_RIGHT);
        }

        if(strlen($subtitulo) > $tamanho){
            $subtitulo = substr($subtitulo, 0, $tamanho - 3);
            $subtitulo = str_pad($subtitulo, $tamanho, ".", STR_PAD_RIGHT);
        }

        echo <<<html
                    <form method="POST" action="../../backend/mudarPost.php" class="container-post">
                        <input type="text" class="id_post" name="id_post" value="{$post['id_post']}">
                        <img src="{$post['imagem']}">
                        <div class="container-texto">
                            <div class="texto">
                                <h3>Autor: </h3><p>{$post['nome_completo']}</p>
                            </div>
                            <div class="texto">
                                <h3>Titulo: </h3><p>{$titulo}</p>
                            </div>
                            <div class="texto">
                                <h3>Subtitulo: </h3><p>{$subtitulo}</p>
                            </div>
                            <div class="texto">
                                <h3>Categoria: </h3><p>{$post['nome_categoria']}</p>
                            </div>
                        </div>
                        <button class="alterar" type="button" value="{$post['id_post']}"></button>
                        <button class="excluir" type="button" value="{$post['id_post']}"></button>
                    </form>
                html;
    }
    
?>