<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <title>Cadastro | Rito Gomes</title>

    <!-- folhas de estilo -->
    <link rel="stylesheet" href="../css/navbar.css">
    <link rel="stylesheet" href="../css/cadastro.css" >
</head>
<body>

    <!-- Barra de navegação do site -->
    <nav>
        <!-- Logo imagem 90x72 -->
        <a class="link-logo" href="../index.html">
            <img class="nav-logo" src="/img/logo.png">
        </a>
        
        <!-- barra de navegação -->
        <ul>
            <li>
                <a href="/jogos.html" class="nav-item">JOGOS</a>
            </li>
            <li>
                <a href="/personagens.html" class="nav-item">PERSONAGENS</a>
            </li>
            <li>
                <a href="/noticias.html" class="nav-item">NOTICIAS</a>
            </li>
            <li>
                <a href="/mais.html" class="nav-item icon">MAIS</a>
                <!-- sub-menu de mais informações -->
                <div class="dropdown-content">
                    <ul>
                        <li>
                            <a href="#" class="nav-item">Torneios</a>
                        </li>
                        <li>
                            <a href="#" class="nav-item">Comunidade</a>
                        </li>
                        <li>
                            <a href="#" class="nav-item">Suporte</a>
                        </li>
                    </ul>
                </div>
            </li>
        </ul>

        <a href="#" class="btn-login">JOGUE AGORA</a>
    </nav>

    <!-- formulario para cadastro -->
    <form>
        <h1>Cadastre-se</h1>

        <div class="campo-forms">
            <label>Usuario:</label>
            <input class="inserir" type="text">
        </div>

        <div class="campo-forms">
            <label>Senha:</label>
            <input class="inserir" type="password">
        </div>

        <div class="campo-forms">
            <label>Repita sua senha:</label>
            <input class="inserir" type="password">
        </div>

        <div class="campo-forms">
            <label>E-mail:</label>
            <input class="inserir" type="text">
        </div>

        <div class="campo-forms">
            <input class="termos" type="checkbox" name="termos"> Sim, eu aceito e concordo com os <a href="#">Termos de Uso</a>
        </div>

        <div class="campo-forms">
            <span>OBS: Não coloque informações reais, esse site é fake</span>
        </div>

        <a href="#" class="btn-forms">ENVIAR</a>
    </form>

</body>
</html>