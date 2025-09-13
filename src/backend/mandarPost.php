<?php
    session_start();

    require('database/cmsCRUD.php');

    // Colunas que ja vem no formato desejado
    $id_autor = $_SESSION['id'];
    $titulo = $_POST['titulo'];
    $subtitulo = $_POST['subtitulo'];
    $data = $_POST['data'];
    $conteudo = $_POST["conteudo"];
    $id_categoria = $_POST['categoria'];

    // os jogos e eventos chegam como arquivo JSON, então é necessário decodificar o JSON
    // Após decodificar ele ficara em formato de array => Array[0] = "1", Array[1] = "2"
    // Dai é utilizado o implode para juntar esses indexes => {1,2}
    $array_jogos = json_decode($_POST['jogos'], true) ?? [];
    $jogos_formatados = '{' . implode(',', $array_jogos) . '}';

    $array_eventos = json_decode($_POST['eventos'], true) ?? [];
    $eventos_formatados = '{' . implode(',', $array_eventos) . '}';

    // Processando as tags para uso
    // Divide a string em um array usando a vírgula como delimitador
    $tags = explode(',', $_POST['tags']);


    // Tratando imagem caso tenha sido enviada
    if(isset($_FILES["imagemPrincipal"])){

        // Pegando o diretorio temporario
        $local_arquivo_original = $_FILES["imagemPrincipal"]['tmp_name'];


        // salvado largura e altura da imagem para redimensionamento
        list($largura, $altura) = getimagesize($local_arquivo_original);
        // Forçando o tamanho da imagem para o desejado. É bom que seja enviado somente imagens horizontais ex: fomato paisagem
        $nova_largura = 1000;
        $nova_altura = 560;


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
    }
    


    // Checa se deve atualizar ou criar o post
    if (isset($_POST['post'])){
        $id_post = $_POST['post'];

        atualizaPost($id_post, $conteudo, $data, $id_autor, $titulo, $subtitulo, $id_categoria, $bytes, $tags, $jogos_formatados, $eventos_formatados);

        header('Location: ../frontend/php/cms.php');
        exit();

    } else {
        // Salvando o id do post para posteriormente salvar a imagem no banco de dados.
        criaPost($conteudo, $data, $id_autor, $titulo, $subtitulo, $id_categoria, $bytes, $tags, $jogos_formatados, $eventos_formatados);

        header('Location: src/frontend/php/cms.php');
        exit();

    }

    
?>