<?php

// Configurações de conexão com o banco de dados
$host = 'localhost';
$port = '5432';
$dbname = 'Rito_Gomes';
$user = 'postgres';
$password = 'root';

try {
    // Cria um novo objeto PDO
    $conn = new PDO("pgsql:
        host=$host;
        port=$port;
        dbname=$dbname;
        user=$user;
        password=$password"
    );

} catch (PDOException $e) {
    // Se ocorrer um erro na conexão, a exceção é capturada aqui
    //file_put_contents("logs.txt", "Erro na conexão: " . $e->getMessage() . "\n", FILE_APPEND);
}

?>