<?php
    session_start();

    ini_set('display_errors', 0);
    ini_set('log_errors', 1);
    error_reporting(E_ALL);

    require('database/dbFunctions.php');

    // transforma arquivo JSON de volta em Array
    $categoriaQuery = json_decode($_POST['categorias'], true);
    $jogoQuery = json_decode($_POST['jogos'], true);
    $eventoQuery = json_decode($_POST['eventos'], true);
    $tagQuery = json_decode($_POST['tags'], true);

    // Criando string para consulta na VIEW
    if(!empty($categoriaQuery)){
 
        // quebra a array fazendo uma string 1,2,3
        $categoriaQuery = implode(',', $categoriaQuery);

        $categoriaSql = 'ids_categorias @> ARRAY[' . $categoriaQuery . '] AND ';

        if(!$where)$where = ' WHERE ';
    }

    if(!empty($jogoQuery)){

        $jogoQuery = implode(',', $jogoQuery);

        $jogoSql = 'ids_jogos @> ARRAY[' . $jogoQuery . '] AND ';

        if(!$where)$where = ' WHERE ';
    }

    if(!empty($eventoQuery)){
        
        $eventoQuery = implode(',', $eventoQuery);
        
        $eventoSql = 'ids_eventos @> ARRAY[' . $eventoQuery . '] AND ';

        if(!$where)$where = ' WHERE ';
    }

    if(!empty($tagQuery)){

        $tagQuery = implode(',', $tagQuery);

        $tagSql = 'ids_tags @> ARRAY[' . $tagQuery . '] ';

        if(!$where)$where = ' WHERE ';
    }

    
    $sql = $where . $categoriaSql . $jogoSql . $eventoSql . $tagSql;

    $testeAND = substr($sql, strlen($sql) - 4, strlen($sql));

    if($testeAND === 'AND '){
        $sql = substr($sql, 0, strlen($sql) - 4);
    }

    $consulta = filtrandoVIEW($sql, $_POST['limite']);

    header('Content-Type: application/json; charset=utf-8');
    echo json_encode($consulta, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    exit();

?>
