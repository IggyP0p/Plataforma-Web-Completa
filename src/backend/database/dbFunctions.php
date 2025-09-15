<?php


    function listarPosts($limit){

        require("conexao.php");

        if($limit == 0){
            $qtdPosts = 'order by id_post desc';

        } else {
            $qtdPosts = "order by id_post desc limit " . $limit;
            
        }

        try {

            $query = $conn->prepare("SELECT post.id_post, nome_completo, titulo, subtitulo, nome_categoria, imagem 
                                    FROM post
                                    inner join
                                    gaveta_categoria on gaveta_categoria.id_post = post.id_post
                                    inner join 
                                    categoria on gaveta_categoria.id_categoria = categoria.id_categoria
                                    inner join
                                    funcionario on post.id_autor = funcionario.id_funcionario
                                    inner join
                                    midia on post.id_post = midia.id_post
                                    $qtdPosts;
                                    ");

            $query ->execute();
            
            while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
                // A coluna 'imagem' é um recurso (stream), não uma string.
                $imagem_stream = $row['imagem'];

                // Lemos o conteúdo do stream para obter a string binária
                $conteudo_binario = stream_get_contents($imagem_stream);

                // Define o tipo MIME diretamente, pois a imagem sempre será convertida para JPEG
                $tipo_mime = 'image/jpeg';

                // Codifica os dados binários para Base64
                $dados_base64 = base64_encode($conteudo_binario);

                // Cria o Data URI
                $data_url = "data:$tipo_mime;base64," . $dados_base64;
                
                // Atualiza o valor da imagem no array $row antes de adicioná-lo
                $row['imagem'] = $data_url;

                // Adiciona o post com a imagem atualizada ao array de posts
                $posts[] = $row;

            }

            return $posts;

        } catch (PDOException $e) {
            // Se ocorrer um erro, exibe a mensagem de erro
            file_put_contents("../../backend/logs.txt", "Erro na consulta: " . $e->getMessage() . "\n", FILE_APPEND);

        }
    }


    function listarPostsFiltrado($limit, $id_jogos, $id_categoria, $id_tags, $id_eventos){
        
        require('conexao.php');

        $consulta = "SELECT DISTINCT p.id_post, m.imagem, c.nome_categoria, p.data_criacao, p.titulo, p.subtitulo
        FROM post p
        LEFT JOIN midia m ON p.id_post = m.id_post
        LEFT JOIN vincula_jogo vj ON p.id_post = vj.id_post
        LEFT JOIN jogo j ON vj.id_jogo = j.id_jogo
        LEFT JOIN gaveta_categoria gc ON p.id_post = gc.id_post
        LEFT JOIN categoria c ON gc.id_categoria = c.id_categoria
        LEFT JOIN relaciona_tags rt ON p.id_post = rt.id_post
        LEFT JOIN tags t ON rt.id_tag = t.id_tag
        LEFT JOIN divulga_evento de ON p.id_post = de.id_post
        LEFT JOIN evento e ON de.id_evento = e.id_evento";

        // Array para armazenar as cláusulas WHERE
        $condicoes = [];
        // Array para armazenar os valores para os placeholders
        $valores = [];

        if (!empty($id_jogos)) {
            $placeholders = [];
            foreach ($id_jogos as $key => $id_jogo) {
                $placeholder = ":jogo_id_{$key}";
                $placeholders[] = $placeholder;
                $valores[$placeholder] = $id_jogo;
            }
            $condicoes[] = "j.id_jogo = (" . implode(', ', $placeholders) . ")";
        }

        if (!empty($id_categoria)) {
            $placeholders = [];
            foreach ($id_categoria as $key => $id_cat) {
                $placeholder = ":cat_id_{$key}";
                $placeholders[] = $placeholder;
                $valores[$placeholder] = $id_cat;
            }
            $condicoes[] = "c.id_categoria = (" . implode(', ', $placeholders) . ")";
        }

        if (!empty($id_tags)) {
            $placeholders = [];
            foreach ($id_tags as $key => $id_tag) {
                $placeholder = ":tag_id_{$key}";
                $placeholders[] = $placeholder;
                $valores[$placeholder] = $id_tag;
            }
            $condicoes[] = "t.id_tag = (" . implode(', ', $placeholders) . ")";
        }

        if (!empty($id_eventos)) {
            $placeholders = [];
            foreach ($id_eventos as $key => $id_evento) {
                $placeholder = ":evento_id_{$key}";
                $placeholders[] = $placeholder;
                $valores[$placeholder] = $id_evento;
            }
            $condicoes[] = "e.id_evento = (" . implode(', ', $placeholders) . ")";
        }

        // Constrói a consulta final com as condições
        if (!empty($condicoes)) {
            $consulta .= " WHERE " . implode(' AND ', $condicoes);
        }

        if($limit > 0){
            $consulta .= " order by p.id_post desc limit " . $limit;
        }

        try {

            // Prepara e executa a consulta de forma segura sql
            $query = $conn->prepare($consulta);


            foreach ($valores as $placeholder => $valor) {
                $query->bindValue($placeholder, $valor, PDO::PARAM_INT);
            }

            $query->execute();
            
            while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
                // A coluna 'imagem' é um recurso (stream), não uma string.
                $imagem_stream = $row['imagem'];

                // Lemos o conteúdo do stream para obter a string binária
                $conteudo_binario = stream_get_contents($imagem_stream);

                // Define o tipo MIME diretamente, pois a imagem sempre será convertida para JPEG
                $tipo_mime = 'image/jpeg';

                // Codifica os dados binários para Base64
                $dados_base64 = base64_encode($conteudo_binario);

                // Cria o Data URI
                $data_url = "data:$tipo_mime;base64," . $dados_base64;
                
                // Atualiza o valor da imagem no array $row antes de adicioná-lo
                $row['imagem'] = $data_url;

                // Adiciona o post com a imagem atualizada ao array de posts
                $posts[] = $row;

            }

            return $posts;

        } catch (PDOException $e) {
            // Se ocorrer um erro, exibe a mensagem de erro
            file_put_contents("../../backend/logs.txt", "Erro na consulta: " . $e->getMessage() . "\n", FILE_APPEND);

        }
    }


    function salvaComentario($conteudo, $usuario, $post, $id_comentario_pai=null){
        require('conexao.php');

        try {

            $sql = 'INSERT INTO comentarios (conteudo, id_usuario, id_post, isFather) 
                    VALUES (:comentario, :usuario, :post, :father)
                    RETURNING id_comentario'
            ;

            $query = $conn->prepare($sql);

            $query->bindParam(':comentario', $conteudo);
            $query->bindParam(':usuario', $usuario);
            $query->bindParam(':post', $post);

            // Define se é pai ou filho
            $isFather = ($id_comentario_pai === null);

            $query->bindParam(':father', $isFather, PDO::PARAM_BOOL);

            $query ->execute();
            // Comentario salvo com sucesso

            $id_comentario = $query->fetch(PDO::FETCH_ASSOC);
            return $id_comentario['id_comentario'];

        } catch (PDOException $e) {
            // Se ocorrer um erro, exibe a mensagem de erro
            file_put_contents("../../backend/logs.txt", "Erro na consulta: " . $e->getMessage() . "\n", FILE_APPEND);

        }
    }


    function associaComentarios($id_comentario_filho, $id_comentario_pai){
        require('conexao.php');

        try {

            $sql = 'INSERT INTO responde (id_comentario_pai, id_comentario_filho) 
                    VALUES (:pai, :filho)'
            ;

            $query = $conn->prepare($sql);

            $query->bindParam(':pai', $id_comentario_pai);
            $query->bindParam(':filho', $id_comentario_filho);

            $query ->execute();
            // Comentarios salvos com sucesso


        } catch (PDOException $e) {
            // Se ocorrer um erro, exibe a mensagem de erro
            file_put_contents("../../backend/logs.txt", "Erro na consulta: " . $e->getMessage() . "\n", FILE_APPEND);

        }
    }


    function catarComentariosPais($id_post){
        require('conexao.php');

        try {

            $sql = 'SELECT id_comentario, conteudo, nome FROM comentarios 
                    INNER JOIN usuario ON comentarios.id_usuario = usuario.id_usuario
                    WHERE isFather = TRUE AND id_post = :id_post;'
            ;

            $query = $conn->prepare($sql);

            $query->bindParam(':id_post', $id_post);

            $query ->execute();
            // Comentarios salvos com sucesso

            $resultado = $query->fetchAll(PDO::FETCH_ASSOC);

            return $resultado;

        } catch (PDOException $e) {
            // Se ocorrer um erro, exibe a mensagem de erro
            file_put_contents("../../backend/logs.txt", "Erro na consulta: " . $e->getMessage() . "\n", FILE_APPEND);

        }
    }


    function catarComentariosFilhos($id_post , $id_comentario_pai){
        require('conexao.php');

        try {

            $sql = 'SELECT conteudo, nome FROM comentarios 
                    INNER JOIN usuario ON comentarios.id_usuario = usuario.id_usuario
                    INNER JOIN responde ON responde.id_comentario_filho = comentarios.id_comentario
                    WHERE id_post = :id_post AND responde.id_comentario_pai = :id_comentario_pai;'
            ;

            $query = $conn->prepare($sql);

            $query->bindParam(':id_post', $id_post);
            $query->bindParam(':id_comentario_pai', $id_comentario_pai);

            $query ->execute();
            // Comentarios salvos com sucesso

            $resultado = $query->fetchAll(PDO::FETCH_ASSOC);

            return $resultado;

        } catch (PDOException $e) {
            // Se ocorrer um erro, exibe a mensagem de erro
            file_put_contents("../../backend/logs.txt", "Erro na consulta: " . $e->getMessage() . "\n", FILE_APPEND);

        }
    }


    function cataTags(){
        require('conexao.php');

        try {

            $sql = 'SELECT * FROM tags';

            $query = $conn->prepare($sql);

            $query->execute();

            $resultado = $query->fetchAll(PDO::FETCH_ASSOC);

            return $resultado;

        } catch (PDOException $e) {
            // Se ocorrer um erro, exibe a mensagem de erro
            file_put_contents("../../backend/logs.txt", "Erro na consulta: " . $e->getMessage() . "\n", FILE_APPEND);

        }
    }


    function filtrandoVIEW(string $consulta, $limit){
        require('conexao.php');

        $limite = ' LIMIT ' . $limit;

        try {

            $sql = 'SELECT *
                    FROM posts_para_filtro'
                    . $consulta . $limite;
            ;

            $query = $conn->prepare($sql);

            $query->execute();

            while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
                // A coluna 'imagem' é um recurso (stream), não uma string.
                $imagem_stream = $row['imagem'];

                // Lemos o conteúdo do stream para obter a string binária
                $conteudo_binario = stream_get_contents($imagem_stream);

                // Define o tipo MIME diretamente, pois a imagem sempre será convertida para JPEG
                $tipo_mime = 'image/jpeg';

                // Codifica os dados binários para Base64
                $dados_base64 = base64_encode($conteudo_binario);

                // Cria o Data URI
                $data_url = "data:$tipo_mime;base64," . $dados_base64;
                
                // Atualiza o valor da imagem no array $row antes de adicioná-lo
                $row['imagem'] = $data_url;

                // Adiciona o post com a imagem atualizada ao array de posts
                $posts[] = $row;

            }            

            return $posts;

        } catch (PDOException $e) {
            // Se ocorrer um erro, exibe a mensagem de erro
            file_put_contents("logs.txt", "Erro na consulta: " . $e->getMessage() . "\n", FILE_APPEND);

        }
    }

?>