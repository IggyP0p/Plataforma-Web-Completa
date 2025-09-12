<?php

    session_start();

    require('database/cmsCRUD.php');

    $id_post = $_POST["id_post"];

    if(isset($_POST["acao"])){
        $oqueFazer = $_POST["acao"];

        if($oqueFazer === 'excluir'){

            removePost($id_post);

            header("Location: ../frontend/php/cms.php");
            exit();

        } else {

            // Resgata os dados necessários para serem alterados.
            $dados = resgataPost($id_post);

            // Recuperando a string das tags
            $tags = implode(", ", $dados['tags']);

            // Recuperando a data
            $data = substr($dados['post']['data_criacao'], 0, 10);


?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <title>CMS | Rito Gomes</title>

    <link rel="stylesheet" href="../frontend/css/root.css">
    <link rel="stylesheet" href="../frontend/css/cms.css">

    <script src="../frontend/js/cmsAddTopico.js"></script>
    <script src="../frontend/js/cmsProcessamento.js"></script>
    <script src="../frontend/js/cmsBotoes.js"></script>
    
</head>
<body>

    <main> 
        <div class="menu-botoes">
            <button type="button" onclick="voltarHome('../frontend/php/cms.php')">
                Voltar
            </button>
        </div>
        <section class="painel">
            <div class="tela-listar" id="tela-listar">
                <div class="cabecalho">
                    <h1>Criar novo post</h1>
                    <button 
                        class="btn-submit" 
                        type="button" 
                        onclick="ProcessarDados(<?=$id_post?>)"
                        id="atualizar"
                    >
                        ATUALIZAR
                    </button>
                </div>
                <section class="info-obrigatoria">
                    <h2>Informações principais</h2>
                    <hr>

                    <label for="imagem-principal">Imagem principal:</label>
                    <span class="warning">Escolha uma Imagem</span>
                    <input type="file" name="imagem-principal" id="imagem-principal">
                    <p>Prefira imagens com proporção de 0.5625. (ex: "1280x720")</p>
                    
                    <label for="titulo">Titulo:</label>
                    <span class="warning">Escreva um titulo</span>
                    <input type="text" name="titulo" id="titulo" value="<?= $dados['post']['titulo']?>">
                    
                    <label for="subtitulo">Subtitulo:</label>
                    <span class="warning">Escreva um subtitulo</span>
                    <input type="text" name="subtitulo" id="subtitulo" value="<?= $dados['post']['subtitulo']?>">
                    
                    <label for="categoria">Categoria:</label>
                    <span class="warning">Escolha uma categoria</span>
                    <select name="categoria" id="categoria" onchange="tiraOpcao(this)">
                        <?php
                        if ($dados['post']['id_categoria'] == 1){
                            echo
                                '<option value="">-- SELECIONE --</option>
                                <option value="1" selected>ESPORTS</option>
                                <option value="2">ATUALIZAÇÃO DE JOGO</option>
                                <option value="3">BLOG</option>'
                            ;
                        } else if($dados['post']['id_categoria'] == 2) {
                            echo
                                '<option value="">-- SELECIONE --</option>
                                <option value="1">ESPORTS</option>
                                <option value="2" selected>ATUALIZAÇÃO DE JOGO</option>
                                <option value="3">BLOG</option>'
                            ;
                        } else {
                            echo
                                '<option value="">-- SELECIONE --</option>
                                <option value="1">ESPORTS</option>
                                <option value="2">ATUALIZAÇÃO DE JOGO</option>
                                <option value="3" selected>BLOG</option>'
                            ;
                        }
                        
                        ?>
                    </select>

                    <label for="tags">Tags:</label>
                    <span class="warning">Coloque pelo menos 1 tag</span>
                    <input type="text" id="tags" value="<?= $tags ?>">
                    <p>Separe as tags por virgulas. (ex: "Freljord, Lore, Ashe")</p>
                    
                    <label for="data">Data:</label>
                    <span class="warning">Escolha uma data</span>
                    <input type="date" name="data" id="data" value="<?= $data ?>">

                    <div class="jogo-evento">
                        <div class="jogo">
                            <h3>Jogo:</h3>
                            <div class="container">
                                <input type="checkbox" name="Jogo" id="LOL" value="1"
                                <?= in_array(1, $dados['jogos']) ? 'checked' : '' ?>>
                                <label for="LOL">Liga das lendas</label>
                            </div>
                            <div class="container">
                                <input type="checkbox" name="Jogo" id="TFT" value="2"
                                <?= in_array(2, $dados['jogos']) ? 'checked' : '' ?>>
                                <label for="TFT">Taticas de luta</label>
                            </div>
                            <div class="container">
                                <input type="checkbox" name="Jogo" id="VALOROSO" value="3"
                                <?= in_array(3, $dados['jogos']) ? 'checked' : '' ?>>
                                <label for="VALOROSO">Valoroso</label>
                            </div>
                        </div>
                        <div class="evento">
                            <h3>Evento:</h3>
                            <div class="container">
                                <input type="checkbox" name="evento" id="Worlds" value="1"
                                <?= in_array(1, $dados['eventos']) ? 'checked' : '' ?>>
                                <label for="Worlds">Worlds</label>
                            </div>
                            <div class="container">
                                <input type="checkbox" name="evento" id="Golden Spatula" value="2"
                                <?= in_array(2, $dados['eventos']) ? 'checked' : '' ?>>
                                <label for="Golden Spatula">Golden Spatula</label>
                            </div>
                            <div class="container">
                                <input type="checkbox" name="evento" id="Champions" value="3"
                                <?= in_array(3, $dados['eventos']) ? 'checked' : '' ?>>
                                <label for="Champions">Champions</label>
                            </div>
                            
                        </div>
                    </div>

                </section>
                <section class="info-opcional">
                    <?php
                        foreach ($dados['post']['conteudo'] as $chave => $valor) {
                            if(str_contains($chave, 'Titulo')){
                                echo    
                                    "<div class='cabecalho'>
                                        <label>Titulo:</label>
                                        <span onclick='cancelaTopico(this)'>&times;</span>
                                    </div>
                                    <input type='text' value='{$valor}'>"
                                    ;
                            } else if (str_contains($chave, 'Texto')){
                                echo    
                                    "<div class='cabecalho'>
                                        <label>Conteúdo:</label>
                                        <span onclick='cancelaTopico(this)'>&times;</span>
                                    </div>
                                    <textarea>{$valor}</textarea>"
                                    ;
                            }
                        }
                    ?>
                    
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
                    </section>
                </section>
            </div>
        </section>
    </main>
    
</body>
</html>

<?php

        }

    }


?>