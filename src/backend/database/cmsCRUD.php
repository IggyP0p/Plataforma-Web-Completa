<?php

    function criaPost($conteudo, $data, $id_autor, $titulo, $subtitulo, $id_categoria, $bytes, array $tagsSelecionadas, $id_jogo=null, $id_evento=null){

        require("conexao.php");

        $stringDeTags = implode(',', $tagsSelecionadas);
        $tagsFormatadas = '{' . $stringDeTags . '}';

        // INSERE DADOS E CRIA POST
        try{
            $sql = "CALL cria_post(:data::DATE, :id_autor, :titulo, :subtitulo, :id_categoria, :imagem, :tagsSelecionadas::VARCHAR(20)[], :conteudo, :id_jogo::INT[], :id_evento::INT[])";

            $query = $conn->prepare($sql);

            $query->bindParam(':data', $data);
            $query->bindParam(':id_autor', $id_autor);
            $query->bindParam(':titulo', $titulo);
            $query->bindParam(':subtitulo', $subtitulo);
            $query->bindParam(':id_categoria', $id_categoria);
            $query->bindParam(':imagem', $bytes, PDO::PARAM_LOB);
            $query->bindParam(':tagsSelecionadas', $tagsFormatadas);
            $query->bindParam(':conteudo', $conteudo);
            $query->bindParam(':id_jogo', $id_jogo);
            $query->bindParam(':id_evento', $id_evento);
            
            $query ->execute();


        }   catch (PDOException $e) {
            // Se ocorrer um erro, exibe a mensagem de erro
            file_put_contents("logs.txt", "Erro na consulta: " . $e->getMessage() . "\n", FILE_APPEND);

        }
        
    }

    // Utilizando procedure para eliminar uma imagem do banco de dados e depois o post
    function removePost($identifier){

        require("conexao.php");

        try {

            $query = $conn->prepare("CALL delete_post(:identificador);");

            $query->bindParam(':identificador', $identifier, PDO::PARAM_INT);

            $query ->execute();
            
            // Excluido com sucesso

        } catch (PDOException $e) {
            // Se ocorrer um erro, exibe a mensagem de erro
            file_put_contents("../../backend/logs.txt", "Erro na consulta: " . $e->getMessage() . "\n", FILE_APPEND);

        }
    }

    function resgataPost($identifier){

        require("conexao.php");

        try {
            // Devolve arquivo JSON
            $sql = "SELECT resgata_post(:id_post) AS post_completo";
            $query = $conn->prepare($sql);

            $query->bindValue(':id_post', $identifier, PDO::PARAM_INT);

            $query->execute();

            $resultado = $query->fetch(PDO::FETCH_ASSOC);

            $dados_do_post = json_decode($resultado['post_completo'], true);

            return $dados_do_post;

        } catch (PDOException $e) {
            // Se ocorrer um erro, exibe a mensagem de erro
            file_put_contents("logs.txt", "Erro na consulta: " . $e->getMessage() . "\n", FILE_APPEND);

        }

    }

    function atualizaPost($id_post, $conteudo, $data, $id_autor, $titulo, $subtitulo, $id_categoria, $bytes, array $tagsSelecionadas, $id_jogo=null, $id_evento=null){

        require("conexao.php");

        $stringDeTags = implode(',', $tagsSelecionadas);
        $tagsFormatadas = '{' . $stringDeTags . '}';

        // Faz a atualização do post existente
        try {
            $sql = "CALL atualiza_post(:id, :data::DATE, :id_autor, :titulo, :subtitulo, :id_categoria, :imagem, :tagsSelecionadas::VARCHAR(20)[], :conteudo, :id_jogo::INT[], :id_evento::INT[])";

            $query = $conn->prepare($sql);

            $query->bindParam(':id', $id_post);
            $query->bindParam(':data', $data);
            $query->bindParam(':id_autor', $id_autor);
            $query->bindParam(':titulo', $titulo);
            $query->bindParam(':subtitulo', $subtitulo);
            $query->bindParam(':id_categoria', $id_categoria);
            $query->bindParam(':imagem', $bytes, PDO::PARAM_LOB);
            $query->bindParam(':tagsSelecionadas', $tagsFormatadas);
            $query->bindParam(':conteudo', $conteudo);
            $query->bindParam(':id_jogo', $id_jogo);
            $query->bindParam(':id_evento', $id_evento);

            $query ->execute();

        } catch (PDOException $e) {
            // Se ocorrer um erro, exibe a mensagem de erro
            file_put_contents("logs.txt", "Erro na consulta: " . $e->getMessage() . "\n", FILE_APPEND);

        }


    }

    function resgataCategoria($id_categoria){
        require("conexao.php");

        try{
            $sql = "SELECT nome_categoria FROM categoria WHERE id_categoria = :categoria";

            $query = $conn->prepare($sql);

            $query->bindParam(':categoria', $id_categoria);

            $query ->execute();

            $resultado = $query->fetch(PDO::FETCH_ASSOC);

            return $resultado;

        } catch (PDOException $e) {
            // Se ocorrer um erro, exibe a mensagem de erro
            file_put_contents("logs.txt", "Erro na consulta: " . $e->getMessage() . "\n", FILE_APPEND);

        }
    }

    function resgataImagem($id_post){
        require("conexao.php");

        try{

            $sql = "SELECT imagem FROM midia WHERE id_post = :id_post";

            $query = $conn->prepare($sql);

            $query->bindParam(':id_post', $id_post);

            $query ->execute();

            $resultado = $query->fetch(PDO::FETCH_ASSOC);

            // Tratando a Imagem
            $imagem_stream = $resultado['imagem'];
            $conteudo_binario = stream_get_contents($imagem_stream);
            $tipo_mime = 'image/jpeg';
            $dados_base64 = base64_encode($conteudo_binario);
            $data_url = "data:$tipo_mime;base64," . $dados_base64;
            $resultado['imagem'] = $data_url;

            return $resultado;

        } catch (PDOException $e) {
            // Se ocorrer um erro, exibe a mensagem de erro
            file_put_contents("logs.txt", "Erro na consulta: " . $e->getMessage() . "\n", FILE_APPEND);

        }
    }

?>