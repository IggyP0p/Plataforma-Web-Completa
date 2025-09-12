<?php
    session_start();

    require('database/cmsCRUD.php');

    // Pegando o id do autor do post
    $id_autor = $_SESSION['id'];

    // Salvando os dados do post
    $titulo = $_POST['titulo'];
    $subtitulo = $_POST['subtitulo'];
    $data = $_POST['data'];
    $conteudo = $_POST["conteudo"];

    // Tabelas separadas
    $id_categoria = $_POST['categoria'];
    $id_jogo = $_POST['jogos'];
    $id_evento = $_POST['eventos'];
    $tags = $_POST['tags'];

    // 1. Converte a string de jogos em um array PHP
    $array_jogos = explode(',', $id_jogo);

    // 2. Formata o array de jogos para o formato de string do PostgreSQL
    //    O resultado será "{1,2}"
    $jogos_formatados = '{' . implode(',', $array_jogos) . '}';

    // 3. Converte a string de eventos em um array PHP
    $array_eventos = explode(',', $id_evento);

    // 4. Formata o array de eventos para o formato de string do PostgreSQL
    //    O resultado será "{1,2}"
    $eventos_formatados = '{' . implode(',', $array_eventos) . '}';

    // Processando as tags para uso
    // 1. Dividir a string em um array usando a vírgula como delimitador
    $arrayTemporario = explode(',', $tags);

    // 2. Remover espaços em branco de cada item e criar o array final
    $tagsLimpos = array_map('trim', $arrayTemporario);

    // 3. Pegar apenas os dois primeiros elementos
    $tagsSelecionadas = array_slice($tagsLimpos, 0, 2);

    // Processando imagem para uso
    // Salvado a imagem do post
    $image_file = $_FILES["imagemPrincipal"];
    $local_arquivo_original = $_FILES["imagemPrincipal"]['tmp_name'];

    list($largura, $altura) = getimagesize($local_arquivo_original, $image_file);

    // Setando dimensionamento desejado
    $max_largura = 1000;
    $max_altura = 560;

    $nova_altura = $max_altura;
    $nova_largura = $max_largura;

    // cria uma imagem em branco
    $imagem_redimensionada = imagecreatetruecolor($nova_largura, $nova_altura);

    // carrega imagem original
    switch(exif_imagetype($local_arquivo_original)){
        case IMAGETYPE_JPEG:
            $imagem_original = imagecreatefromjpeg($local_arquivo_original);
            break;
        case IMAGETYPE_PNG:
            $imagem_original = imagecreatefrompng($local_arquivo_original);
            break;
        case IMAGETYPE_WEBP:
            $imagem_original = imagecreatefromwebp($local_arquivo_original);
            break;
        default:
            die("tipo não suportado.");

    }

    // copia e redimensiona
    imagecopyresampled(
        $imagem_redimensionada, 
        $imagem_original, 
        0, 0, 0, 0, 
        $nova_largura, $nova_altura, 
        $largura, $altura
    );

    // Salvando imagem - padronizando como jpeg -
    $temp_file = tempnam(sys_get_temp_dir(), 'redimensionada_') . '.jpg';
    imagejpeg($imagem_redimensionada, $temp_file);
    $bytes = file_get_contents($temp_file);
    unlink($temp_file);

    //file_put_contents("logs.txt", "ARQUIVO LIDO COM SUCESSO" . "\n", FILE_APPEND);


    // Checa se deve atualizar ou criar o post
    if (isset($_POST['post'])){
        $id_post = $_POST['post'];

        atualizaPost($id_post, $conteudo, $data, $id_autor, $titulo, $subtitulo, $id_categoria, $jogos_formatados, $eventos_formatados, $bytes, $tagsSelecionadas);

        header('Location: ../../frontend/php/cms.php');
        exit();

    } else {
        // Salvando o id do post para posteriormente salvar a imagem no banco de dados.
        criaPost($conteudo, $data, $id_autor, $titulo, $subtitulo, $id_categoria, $jogos_formatados, $eventos_formatados, $bytes, $tagsSelecionadas);

        header('Location: ../frontend/php/cms.php');
        exit();

    }

    
?>