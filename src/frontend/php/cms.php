<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <title>CMS | Rito Gomes</title>

    <link rel="stylesheet" href="../css/root.css">
    <link rel="stylesheet" href="../css/cms.css">

    <script src="../js/cmsAddTopico.js"></script>
    <script src="../js/cmsProcessamento.js"></script>
    <script src="../js/cmsBotoes.js"></script>
    
</head>
<body>

    <main> 
        <div class="menu-botoes">
            <button type="button" onclick="voltarHome('home.php')">
                Voltar
            </button>
            <button type="button" onclick="telaListar()">
                Listar
            </button>
            <button type="button" onclick="telaCriar()">
                Criar
            </button>
        </div>
        <section class="painel">
            <div class="tela-listar" id="tela-listar">
                <h2>Posts criados: </h2>
                <?php

                    include('../../backend/mostrarPost.php');
                
                ?>
            </div>
            <form class="tela-criar" id="tela-criar">
                <div class="cabecalho">
                    <h1>Criar novo post</h1>
                    <button 
                        class="btn-submit" 
                        type="button" 
                        onclick="ProcessarDados()"
                    >
                        ENVIAR
                    </button>
                </div>
                <section class="info-obrigatoria">
                    <h2>Informações principais</h2>
                    <hr>

                    <label for="imagem-principal">Imagem principal:</label>
                    <input type="file" name="imagem-principal" id="imagem-principal">
                    <p>Prefira imagens com proporção de 0.5625. (ex: "1280x720")</p>
                    
                    <label for="titulo">Titulo:</label>
                    <input type="text" name="titulo" id="titulo" maxlength="50">
                    
                    <label for="subtitulo">Subtitulo:</label>
                    <input type="text" name="subtitulo" id="subtitulo" maxlength="128">
                    
                    <label for="categoria">Categoria:</label>
                    <select name="categoria" id="categoria" onchange="tiraOpcao(this)">
                        <option value="">-- SELECIONE --</option>
                        <option value="1">ESPORTS</option>
                        <option value="2">ATUALIZAÇÃO DE JOGO</option>
                        <option value="3">BLOG</option>
                    </select>

                    <!--      DESCONTINUADO
                    <button 
                        class="btn-add" 
                        type="button" 
                        onclick="adicionaSubcategoria(this)"
                    >
                        Subcategoria
                    </button>
                    -->

                    <label for="tags">Tags:</label>
                    <input type="text" id="tags">
                    <p>Separe as tags por virgulas. (ex: "Freljord, Lore, Ashe")</p>
                    
                    <label for="data">Data:</label>
                    <input type="date" name="data" id="data">

                    <div class="jogo-evento">
                        <div class="jogo">
                            <h3>Jogo:</h3>
                            <div class="container">
                                <input type="checkbox" name="Jogo" id="LOL" value="1">
                                <label for="LOL">Liga das lendas</label>
                            </div>
                            <div class="container">
                                <input type="checkbox" name="Jogo" id="TFT" value="2">
                                <label for="TFT">Taticas de luta</label>
                            </div>
                            <div class="container">
                                <input type="checkbox" name="Jogo" id="VALOROSO" value="3">
                                <label for="VALOROSO">Valoroso</label>
                            </div>
                        </div>
                        <div class="evento">
                            <h3>Evento:</h3>
                            <div class="container">
                                <input type="checkbox" name="evento" id="Worlds" value="1">
                                <label for="Worlds">Worlds</label>
                            </div>
                            <div class="container">
                                <input type="checkbox" name="evento" id="Golden Spatula" value="2">
                                <label for="Golden Spatula">Golden Spatula</label>
                            </div>
                            <div class="container">
                                <input type="checkbox" name="evento" id="Champions" value="3">
                                <label for="Champions">Champions</label>
                            </div>
                            
                        </div>
                    </div>

                </section>
                <section class="info-opcional">
                    
                    <section class="btns-add">
                        <button 
                            class="btn-add" 
                            type="button" 
                            onclick="adicionaTitulo()"
                        >
                            Titulo
                        </button>
                        <button 
                            class="btn-add" 
                            type="button" 
                            onclick="adicionaTexto()"
                        >
                            Texto
                        </button>
                        <!--      DESCONTINUADO
                        <button 
                            class="btn-add" 
                            type="button" 
                            onclick="adicionaImagem()"
                        >
                            Imagem
                        </button>
                        -->
                    </section>
                </section>
            </form>
        </section>
    </main>
    
</body>
</html>