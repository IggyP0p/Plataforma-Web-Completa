<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <title>Comunidade | Rito Gomes</title>
    <link rel="stylesheet" href="../css/root.css">
    <link rel="stylesheet" href="../css/comunidade.css">
</head>
<body>
    
    <?php
        include("../../includes/navbar.php")
    ?>

    <aside>
        <div class="container-filtro">
            <span>FILTRAR</span>
            <ul>
                <li>Categoria:
                    <a id="opcao">Guias & Tutoriais</a>
                    <a id="opcao">Fanarts</a>
                    <a id="opcao">Discussões Gerais</a>
                </li>
                <li>Jogo:
                    <a id="opcao">Liga das Lendas</a>
                    <a id="opcao">Valoroso</a>
                    <a id="opcao">Táticas de Time</a>
                </li>
                <li>Popularidade:
                    <a id="opcao">Mais Curtidos</a>
                    <a id="opcao">Mais Comentados</a>
                </li>
            </ul>
        </div>
    </aside>

    <main>

        <div class="ultimos-posts">
            <h1>COMUNIDADE</h1>

            <div class="container-posts">
                <div class="post">
                    <div class="post-avatar">
                        <img src="../../utils/img/avatar1.png" alt="Avatar usuário">
                    </div>
                    <div class="post-info">
                        <span class="post-autor">InvocadorX</span>
                        <span class="post-data">10/09/2025</span>
                        <span class="post-categoria">Guia - LOL</span>
                    </div>
                    <div class="post-descricao">
                        <h2 class="post-titulo">
                            Guia de Jinx: Dicas para carregar no bot
                        </h2>
                        <p class="post-conteudo">
                            Compartilhando algumas builds, runas e estratégias que venho usando
                            para subir de elo com a Jinx. 🚀
                        </p>
                    </div>
                </div>

                <div class="post">
                    <div class="post-avatar">
                        <img src="../../utils/img/avatar2.png" alt="Avatar usuário">
                    </div>
                    <div class="post-info">
                        <span class="post-autor">FanArtista123</span>
                        <span class="post-data">09/09/2025</span>
                        <span class="post-categoria">Fanart - Valoroso</span>
                    </div>
                    <div class="post-descricao">
                        <h2 class="post-titulo">
                            Fanart da Jett 💙
                        </h2>
                        <p class="post-conteudo">
                            Fiz essa fanart da Jett em aquarela, espero que gostem!
                        </p>
                        <img src="../../utils/img/fanart_jett.jpg" class="fanart-img">
                    </div>
                </div>
            </div>

            <div class="container-posts">
                <div class="post">
                    <div class="post-avatar">
                        <img src="../../utils/img/avatar3.png" alt="Avatar usuário">
                    </div>
                    <div class="post-info">
                        <span class="post-autor">TFTMaster</span>
                        <span class="post-data">07/09/2025</span>
                        <span class="post-categoria">Discussão - TFT</span>
                    </div>
                    <div class="post-descricao">
                        <h2 class="post-titulo">
                            Qual a comp mais forte do SET 15?
                        </h2>
                        <p class="post-conteudo">
                            Estou testando várias comps no novo patch, mas ainda não decidi qual
                            está mais quebrada. O que vocês acham?
                        </p>
                    </div>
                </div>

                <div class="post">
                    <div class="post-avatar">
                        <img src="../../utils/img/avatar4.png" alt="Avatar usuário">
                    </div>
                    <div class="post-info">
                        <span class="post-autor">Lendário99</span>
                        <span class="post-data">06/09/2025</span>
                        <span class="post-categoria">Discussão - Geral</span>
                    </div>
                    <div class="post-descricao">
                        <h2 class="post-titulo">
                            Faker ainda é o melhor do mundo?
                        </h2>
                        <p class="post-conteudo">
                            Depois de tantas conquistas, será que ainda dá pra considerar o Faker
                            o maior de todos os tempos? Bora debater!
                        </p>
                    </div>
                </div>
            </div>

            <button class="load-btn">Carregar mais</button>
        </div>
    </main>

    <?php
        include("../../includes/footer.html")
    ?>
    
</body>
</html>
