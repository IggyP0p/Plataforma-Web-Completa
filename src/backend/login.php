<?php
  session_start();

  require("database/conexao.php");

  if (isset($_POST['usuario']) && isset($_POST['senha'])) {
    $usuario = $_POST['usuario'];
    $senha = $_POST['senha'];

    $query = $conn->prepare("SELECT id_usuario, nome, senha, isAdmin FROM usuario
                              WHERE (nome = ? AND senha = ?)
                              union SELECT id_funcionario, usuario, senha, isAdmin FROM funcionario
                              WHERE (usuario = ? AND senha = ?);"
                              );
    $query->execute([$usuario, $senha, $usuario, $senha]);
    $resultado = $query->fetch(PDO::FETCH_ASSOC);

    if($resultado){
      // O Usuario ainda não existe no banco de dados
      $_SESSION['nome'] = $resultado['nome'];
      $_SESSION['id'] = $resultado['id_usuario'];
      $_SESSION['admin'] = $resultado['isadmin'];

      header("Location: " . $_SERVER['HTTP_REFERER']);
      exit();

    } else {
      //Senha e Usuario incorretos
      header("Location: " . $_SERVER['HTTP_REFERER']);
      exit();

    }
  } else {
    
    header("Location: " . $_SERVER['HTTP_REFERER']);
    exit();
    
  }
?>