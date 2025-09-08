<?php  
  session_start();

  if (isset($_SESSION['nome'])) {
?>
<!-- Instanciando arquivos css e javascript -->
<link rel="stylesheet" href="../css/navbar.css">
<script src="../js/modal.js"></script>

<header class="principal-header">
    <!-- Logo imagem 90x72 -->
    <a href="home.php">
        <img class="logo" src="../../utils/img/logo.png">
    </a>
    
    <!-- barra de navegação -->
    <nav>
        <ul>
            <li>
                <a href="empresa.php" class="nav-item">QUEM SOMOS</a>
            </li>
            <li>
                <a href="javascript:void(0)" class="nav-item icon">JOGOS</a>
                <div class="dropdown-content">
                    <ul>
                        <li>
                            <a href="jogo_lol.php" class="nav-item">Liga das lendas</a>
                        </li>
                        <li>
                            <a href="jogo_vava.php" class="nav-item">Valoroso</a>
                        </li>
                        <li>
                            <a href="jogo_tft.php" class="nav-item">Taticas de luta de time</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li>
                <a href="noticias.php" class="nav-item">NOTÍCIAS</a>
            </li>
            <li>
                <a href="javascript:void(0)" class="nav-item icon">MAIS</a>
                <div class="dropdown-content">
                    <ul>
                        <li>
                            <a href="comunidade.php" class="nav-item">Comunidade</a>
                        </li>
                        <li>
                            <a href="suporte.php" class="nav-item">Suporte</a>
                        </li>
                    </ul>
                </div>
            </li>
        </ul>
    </nav>

    <?php
        if (isset($_SESSION['admin'])) {
    ?>

    <a 
        href="javascript:void(0)"
        onclick="openMenu()"
        class="btn-login icon" 
        id="login"
    >
        <?= $_SESSION['nome'] ?> 
    </a>

    <!-- modal do menu -->
    <div class="menu">
        <div class="menu-content">
            <ul>
                <li>
                    <a href="#">Configurações</a>
                </li>
                <li>
                    <a href="#">Criar post</a>
                </li>
                <li>
                    <a href="../../backend/logout.php">Sair</a>
                </li>
            </ul>
        </div>
    </div>

    <?php
        } else {
    ?>

    <a 
        href="javascript:void(0)"
        onclick="openMenu()"
        class="btn-login icon" 
        id="login"
    >
        <?= $_SESSION['nome'] ?> 
    </a>

    <!-- modal do menu -->
    <div class="menu">
        <div class="menu-content">
            <ul>
                <li>
                    <a href="#">Configurações</a>
                </li>
                <li>
                    <a href="../../backend/logout.php">Sair</a>
                </li>
            </ul>
        </div>
    </div>

    <?php
        }
    ?>
    
</header>

<?php

  } else {
  
?>

<!-- Instanciando arquivos css e javascript -->
<link rel="stylesheet" href="../css/navbar.css">
<script src="../js/modal.js"></script>
<script src="../js/validaFormulario.js"></script>

<header class="principal-header">
    <!-- Logo imagem 90x72 -->
    <a href="home.php">
        <img class="logo" src="../../utils/img/logo.png">
    </a>
    
    <!-- barra de navegação -->
    <nav>
        <ul>
            <li>
                <a href="empresa.php" class="nav-item">QUEM SOMOS</a>
            </li>
            <li>
                <a href="javascript:void(0)" class="nav-item icon">JOGOS</a>
                <div class="dropdown-content">
                    <ul>
                        <li>
                            <a href="jogo_lol.php" class="nav-item">Liga das lendas</a>
                        </li>
                        <li>
                            <a href="jogo_vava.php" class="nav-item">Valoroso</a>
                        </li>
                        <li>
                            <a href="jogo_tft.php" class="nav-item">Taticas de luta de time</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li>
                <a href="noticias.php" class="nav-item">NOTÍCIAS</a>
            </li>
            <li>
                <a href="javascript:void(0)" class="nav-item icon">MAIS</a>
                <div class="dropdown-content">
                    <ul>
                        <li>
                            <a href="comunidade.php" class="nav-item">Comunidade</a>
                        </li>
                        <li>
                            <a href="suporte.php" class="nav-item">Suporte</a>
                        </li>
                    </ul>
                </div>
            </li>
        </ul>
    </nav>

    <a href="javascript:void(0)" onclick="openModal()" class="btn-login" id="
    login">JOGUE AGORA</a>

    <!-- modal -->
    <div class="modal">
        <div class="modal-content">
            <div class="modal-container">
                <form id="Login" method="post" action="../../backend/login.php">
                    <h2>login</h2>
                    <input 
                        type="text" 
                        id="login-usuario" 
                        name="usuario" 
                        placeholder="Usuário" 
                        maxlength="20"
                    >
                    <span class="warning">Usuário invalido.</span>
                    <input 
                        type="password" 
                        id="login-senha" 
                        name="senha" 
                        placeholder="Senha" 
                        maxlength="10"
                    >
                    <span class="warning">Senha invalida.</span>
                    <button type="button" onclick="validaLogin()">Entrar</button>
                </form>
            </div>
            <hr>
            <div class="modal-container">
                <form id="Cadastro" method="post" action="../../backend/cadastro.php">
                    <h2>Cadastro</h2>
                    <input 
                        type="text" 
                        id="usuario" 
                        name="usuario" 
                        placeholder="Usuário" 
                        maxlength="20"
                    >
                    <span class="warning">Usuário invalido.</span>
                    <input 
                        type="email" 
                        id="email"
                        name="email" 
                        placeholder="E-mail" 
                    >
                    <span class="warning">Email invalido.</span>
                    <input 
                        type="password" 
                        id="senha1" 
                        name="senha1" 
                        placeholder="Senha" 
                        maxlength="10"
                    >
                    <span class="warning">Senha invalida.</span>
                    <input 
                        type="password" 
                        id="senha2" 
                        name="senha2" 
                        placeholder="Confirmar senha" 
                        maxlength="10"
                    >
                    <span class="warning">Senha invalida.</span>
                    
                    <button type="button" onclick="validaCadastro()">Cadastrar</button>
                </form>
            </div>
            <span class="close" onclick="closeModal()">
                &times;
            </span>
        </div>
    </div>

</header>

<?php

  }

?>