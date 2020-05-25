<!DOCTYPE html>
<html lang="Pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ff0000">
    <title>Mural da Turma</title>
    <link rel="apple-touch-icon" sizes="180x180" href="img/icon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="img/icon//favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="img/icon//favicon-16x16.png">
    <link rel="manifest" href="img/icon//site.webmanifest">
    <link rel="mask-icon" href="img/icon//safari-pinned-tab.svg" color="#5bbad5">
    <link rel="stylesheet" href="css/home.css">
    <link rel="stylesheet" href="css/menu.css">
    <link rel="stylesheet" href="css/rodape.css">
</head>
<body>
    <!--Chamando menu-->
    <?php
        include("html/menu.html"); 
    ?>

    <!--Parte Principal-->
    <main>
        <!--Seção da apresentação-->
        <section class="apresentacao">
            <!--Lista de contatos-->
            <aside>
                <ul>
                    <li><a target="_blank" href="https://www.facebook.com/groups/SIUNEBALAGOINHAS"><img src="img/facebook_ícone.png" alt="facebook"></a></li>
                    <li><a href=""><img src="img/youtube._ícone.png" alt="youtube"></a></li>
                    <li><a target="_blank" href="https://www.instagram.com/siunebcampus2/"><img src="img/instagram_ícone.png" alt="instagram"></a></li>
                    <li><a target="_blank" href="https://github.com/almerindopaixao/Mural-Si"><img src="img/github_ícone.png" alt="github"></a></li>
                </ul>       
            </aside>
            <!--Apresentação do site-->
            <div class="boas-vindas">
                <div>
                    <h1>Seja Bem-Vindo(a)</h1>
                    <a href="#conteudo" class="ver-mais">Ver Mais</a>
                </div>
            </div>
        </section>
        <!--Seção do conteúdo-->
        <section id="conteudo">
            <!--conteúdo-->
            <div id="informacoes">
                <article>
                    <h2>Sistemas de informação - 2019.2</h2>
                    <p>Esse site foi criado com o intuito de disponibilizar para os alunos ingressos na turma 2019.2 de Sistemas de Informação – Uneb (campus II – Alagoinhas) uma plataforma que tenha a função de cadastrar eventos relacionados ao curso, upload de fotos e vídeos da turma, slideshow web, proporcionar pastas de arquivos das aulas para download, oferecer um calendário com todos os lembretes de aulas, trabalhos, provas, atividades, e que possam ser editados por qualquer aluno da turma.</p>
                </article>
            </div>
            <!--Lista de Alunos-->
            <aside id="lista-alunos">
                <div>
                    <h2>Lista de alunos Sistemas de Informação 2019.2 - UNEB</h2>
                    <ul>
                        <li>Almerindo</li>
                        <li>Angélica</li>
                        <li>João Gabriel</li>
                        <li>Ana Lívia</li>
                        <li>Luan</li>
                        <li>Alandelon</li>
                        <li>Joilson</li>
                        <li>Kevin</li>
                        <li>Sander</li>
                    </ul>
                </div>
            </aside>
        </section>
    </main>

    <!--Rodapé-->
   <?php
        include("html/rodape.html");
   ?>
   
   <script src="js/script.js"></script>
   <script src="js/home.js"></script>
</body>
</html>