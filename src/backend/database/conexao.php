<?php

// Configurações de conexão com o banco de dados
$host = 'postgres.railway.internal';
$port = '5432';
$dbname = 'railway';
$user = 'postgres';
$password = 'ddouIhEPoyTooNTIOyLkXhkIBIWRsaEu';

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
    file_put_contents("logs.txt", "Erro na conexão: " . $e->getMessage() . "\n", FILE_APPEND);
}

?>