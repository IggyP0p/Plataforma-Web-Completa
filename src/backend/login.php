<?php
  session_start();
  
  // Defina aqui suas credenciais válidas
  $usuario_valido = "admin";
  $senha_valida = "2345a";
  
  if (isset($_POST['usuario']) && isset($_POST['senha'])) {
    if ($_POST['usuario'] == $usuario_valido && $_POST['senha'] == $senha_valida) {
      
      $_SESSION['nome'] = "igor";
      $_SESSION['admin'] = 'true';
      header("Location: " . $_SERVER['HTTP_REFERER']);
      exit();
      
    } else if ($_POST['usuario'] == "usuario" && $_POST['senha'] == $senha_valida) {
      
      $_SESSION['nome'] = "igor";
      header("Location: " . $_SERVER['HTTP_REFERER']);
      exit();
      
    } else {
      
      header("Location: " . $_SERVER['HTTP_REFERER']);
      exit();
      
    }
    
  } else {
    
    header("Location: " . $_SERVER['HTTP_REFERER']);
    exit();
    
  }
?>