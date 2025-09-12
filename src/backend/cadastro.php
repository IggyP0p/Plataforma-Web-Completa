<?php

    session_start();

    require("database/conexao.php");

    // Checagem se não há nada de errado com as variaveis
    if (isset($_POST['usuario']) && isset($_POST['senha1']) && isset($_POST['email'])) {
        $usuario = $_POST['usuario'];
        $senha = $_POST['senha1'];
        $email = $_POST['email'];

        //Conferir se o usuário ja existe
        $query = $conn->prepare("SELECT nome, email FROM usuario
                                WHERE (nome = ? OR email = ?)
                                union SELECT usuario, senha from funcionario
                                WHERE (usuario = ? OR senha = ?)"
                                );
        $query->execute([$usuario, $email, $usuario, $email]);
        $resultado = $query->fetch(PDO::FETCH_ASSOC);

        if(!$resultado){
            //Usuario ainda não existe, criando novo usuario
            $query = $conn->prepare("INSERT INTO usuario(nome, senha, email, data_criacao, telefone)
                                    VALUES (?, ?, ?, CURRENT_TIMESTAMP, '');"
                                    );
            $query->execute([$usuario, $senha, $email]);

            //file_put_contents("logs.txt", 'USUARIO CADASTRADO COM SUCESSO' . "\n", FILE_APPEND);
            echo '<script>alert("SISTEMA: USUARIO CADASTRADO COM SUCESSO");</script>';

            header("Location: " . $_SERVER['HTTP_REFERER']);
            exit();

        } else {

            //file_put_contents("logs.txt", 'ERRO: USUARIO JA EXISTENTE' . "\n", FILE_APPEND);
            header("Location: " . $_SERVER['HTTP_REFERER']);
            exit();

        }
    } else {
        
        //file_put_contents("logs.txt", 'ERRO: ALGUMA VARIÁVEL NÃO FOI ENVIADA PARA O LOGIN' . "\n", FILE_APPEND);
        header("Location: " . $_SERVER['HTTP_REFERER']);
        exit();
        
    }
?>