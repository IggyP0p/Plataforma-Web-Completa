<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <title>Suporte | Rito Gomes</title>
    <link rel="stylesheet" href="../css/root.css">
    <link rel="stylesheet" href="../css/suporte.css">

</head>
<body>

    <?php
        include("../../includes/navbar.php")
    ?>

    <section class="introducao">
        <div class="container">
            <h1>
                Suporte da Rito
            </h1>
            <div class="login">
                <div class="texto">
                    <h2>
                        Faça login na sua conta Rito.
                    </h2>
                    <p>
                        Veja seus tickets, gerencie sua conta e receba ajuda rápido.
                    </p>
                </div>
                <button onclick="openModal()">
                    FAZER LOGIN
                </button>
            </div>
        </div>
        <img src="../../utils/img/suporte_pinguim.png">
    </section>

    <section class="ferramentas-de-suporte">
        <div class="container">
            <h2>
                Ferramentas de suporte
            </h2>
            <p>
                Nosso catálogo de opções de autoatendimento permite que você tome medidas agora mesmo.
            </p>
            <hr>
            <div class="fundo">
                <div class="catalogos">
                    <div class="catalogo">
                        <h2>
                            Gerenciamento da Conta
                            <span class="icone"></span>
                        </h2>
                        <a>
                            Recuperar sua Conta
                            <span class="icone"></span>
                        </a>
                        <a>
                            Esqueci meu nome de usuário
                            <span class="icone"></span>
                        </a>
                        <a>
                            Esqueci minha senha
                            <span class="icone"></span>
                        </a>
                        <a>
                            Transferência de região
                            <span class="icone"></span>
                        </a>
                    </div>
                    <div class="catalogo">
                        <h2>
                            Pagamentos
                            <span class="icone"></span>
                        </h2>
                        <a>
                            Reembolso de compra dentro do jogo
                            <span class="icone"></span>
                        </a>
                        <a>
                            Resolver estornos
                            <span class="icone"></span>
                        </a>
                    </div>
                    <div class="catalogo">
                        <h2>
                            Privacidade e Proteção de Dados
                            <span class="icone"></span>
                        </h2>
                        <a>
                            Solicitar dados da conta
                            <span class="icone"></span>
                        </a>
                        <a>
                            Exclusão de conta
                            <span class="icone"></span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="abra-um-ticket">
        <div class="container">
            <h2>
                Precisa de mais ajuda? <br>
                Entre em contato!
            </h2>
            <p>
                Este site nem é nossa forma final! <br>
                Entre em contato diretamente se tiver alguma pergunta difícil de ser respondida.
            </p>
            <button>
                ENVIAR UM TICKET
            </button>
        </div>
    </section>

    <?php
        include("../../includes/footer.html")
    ?>
    
</body>
</html>