<?php
    session_start();

    require('database/dbFunctions.php');

    $conteudo_comentario = $_POST['comentario'];
    $id_usuario = $_SESSION['id'];
    $id_post = $_POST['id_post'];

    if(isset($_POST['id_comentario_pai'])){
        $comentario_pai = $_POST['id_comentario_pai'];

        // Cria o comentário filho e pega o ID
        $id_comentario = salvaComentario($conteudo_comentario, $id_usuario, $id_post, FALSE);

        // Associa o comentário filho com o comentário pai
        associaComentarios($id_comentario, $comentario_pai);

        header('Location: ../frontend/php/Post.php?id_post=' . $id_post);
        exit();
    }

    // Salva comentário pai
    salvaComentario($conteudo_comentario, $id_usuario, $id_post);

    header('Location: ../frontend/php/Post.php?id_post=' . $id_post);
    exit();

?>