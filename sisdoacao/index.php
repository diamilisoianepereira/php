<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Sisaluno</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Roboto', sans-serif;
        }

        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 16px;
            background-color: #f1f1f1;
            position: relative; /* Para garantir que o menu sobreponha outros conteúdos */
            z-index: 1000; /* Alta prioridade para sobreposição */
        }

        .logo {
            width: 100px;
        }

        .menu-icon {
            display: inline-block;
            cursor: pointer;
            padding: 16px;
        }

        .menu-icon div {
            width: 35px;
            height: 4px;
            background-color: black;
            margin: 6px 0;
            transition: 0.4s;
        }

        .change .bar1 {
            transform: rotate(-45deg) translate(-5px, 6px);
        }

        .change .bar2 {
            opacity: 0;
        }

        .change .bar3 {
            transform: rotate(45deg) translate(-5px, -6px);
        }

        .menu {
            display: none;
            padding: 16px;
            background-color: #f1f1f1;
            position: absolute;
            top: 90px; /* Ajustado para garantir que o menu fique mais baixo */
            right: 16px;
            width: 200px;
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
            z-index: 2000; /* Alta prioridade para sobreposição */
        }

        .menu a {
            text-decoration: none;
            color: black;
            padding: 12px;
            display: block;
            transition: background-color 0.3s;
        }

        .menu a:hover, .menu a.active {
            background-color: #ddd;
        }

        .overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.8);
            z-index: 1500; /* Menor prioridade que o menu */
        }

        .overlay.active {
            display: block;
        }

        .content {
            display: none;
            padding: 16px;
            border-top: 1px solid #ddd;
            position: absolute;
            background-color: #f9f9f9;
            color: black;
            width: 100%;
            box-sizing: border-box;
            z-index: 2000; /* Alta prioridade para sobreposição */
        }

        .content.active {
            display: block;
        }

        .closebtn {
            position: absolute;
            top: 10px;
            right: 10px;
            font-size: 50px;
            color: black;
            cursor: pointer;
        }

        .closebtn:hover {
            color: red;
        }

        h2 {
            font-family: 'Roboto', sans-serif;
            font-weight: 700;
        }

        p {
            font-family: 'Roboto', sans-serif;
            font-weight: 400;
            margin: 0;
        }

        aside {
            display: flex;
            align-items: flex-start;
            padding: 16px;
            margin-top: 80px;
            position: relative;
            flex-wrap: wrap;
        }

        .conteudo {
            flex: 1;
            margin-right: 20px;
        }

        .texto p {
            margin: 0;
            font-size: 2vw; /* Ajusta o tamanho do texto com base na largura da viewport */
        }

        .barra {
            margin-top: 20px;
        }

        .botao {
            display: block;
            padding: 15px;
            margin: 5px 0;
            background-color: black;
            color: white;
            text-align: center;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .botao:hover {
            background-color: #333;
        }

        .imagem {
            max-width: 100%;
            position: relative; /* Para garantir que o menu fique acima da imagem */
            z-index: 1;
        }

        .imagem img {
            width: 400px; /* Ajuste conforme necessário */
            height: auto;
        }

        .mobile-container {
            display: flex;
            justify-content: flex-end;
            padding: 16px;
        }
    </style>
</head>
<body>
<header>
    <a href="index.php">
        <img src="logo.png" alt="logo" class="logo">
    </a>
    <div class="menu-icon" onclick="toggleMenu(this)">
        <div class="bar1"></div>
        <div class="bar2"></div>
        <div class="bar3"></div>
    </div>
</header>

<div class="menu" id="menu">
    <a href="#quemsomos" onclick="showContent('quemsomos'); setActive(this)">Quem Somos</a>
    <a href="#comofunciona" onclick="showContent('comofunciona'); setActive(this)">Como Funciona</a>
    <a href="#sobre" onclick="showContent('sobre'); setActive(this)">Sobre o Site</a>
    <a href="#desenvolvimento" onclick="showContent('desenvolvimento'); setActive(this)">Desenvolvimento</a>
    <a href="login.html" onclick="setActive(this)">Entrar como Administrador</a>
</div>

<!-- Overlay -->
<div id="overlay" class="overlay"></div>

<div id="quemsomos" class="content">
    <span class="closebtn" onclick="closeContent('quemsomos')">&times;</span>
    <h2>Quem Somos</h2>
    <p>
        A ONG Esperança e Futuro nasceu do desejo de fazer a diferença na vida das pessoas por meio da solidariedade e do apoio financeiro. Nossa missão é transformar vidas e criar um futuro mais promissor através de doações que viabilizam projetos e iniciativas voltados para a inclusão social e o desenvolvimento sustentável.
        <br><br>
        Nosso trabalho é guiado pelo compromisso com a transparência e a eficácia na aplicação dos recursos. Utilizamos cada doação com responsabilidade para implementar programas que atendem às necessidades mais urgentes das comunidades que apoiamos, oferecendo oportunidades em áreas como educação, saúde e capacitação profissional.
        <br><br>
        Com a generosidade de nossos doadores, conseguimos proporcionar esperança e construir um caminho de progresso para aqueles que enfrentam desafios. Convidamos você a se unir a nós nessa causa e a fazer parte de um movimento que promove mudanças significativas e duradouras.
    </p>
</div>

<div id="comofunciona" class="content">
    <span class="closebtn" onclick="closeContent('comofunciona')">&times;</span>
    <h2>Como Funciona</h2>
    <p>
        Na ONG Esperança e Futuro, nosso trabalho é sustentado por uma rede de doadores, donatários e voluntários que compartilham o compromisso com a transformação social. Aqui está como cada parte do nosso processo contribui para o sucesso de nossa missão:
        <br><br>
        <strong>1. Doador</strong>
        <br>
        Os doadores são a força vital da nossa ONG. Com sua generosidade, possibilitam a realização de nossos projetos e programas. Seja através de doações financeiras, bens materiais ou apoio em eventos, cada contribuição faz uma grande diferença. Para se tornar um doador, você pode fazer uma doação única ou se inscrever para contribuições regulares em nosso site.
        <br><br>
        <strong>2. Donatário</strong>
        <br>
        Os donatários são os beneficiários de nossos programas e iniciativas. Identificamos e apoiamos indivíduos e comunidades que enfrentam desafios e necessitam de assistência. Nossos projetos são desenvolvidos para atender às suas necessidades específicas, promovendo oportunidades de educação, saúde e capacitação.
        <br><br>
        <strong>3. Voluntário</strong>
        <br>
        Voluntários são fundamentais para o funcionamento da ONG. Eles dedicam seu tempo e habilidades para apoiar nossas atividades e expandir nosso alcance. Se você deseja se envolver ativamente, pode se inscrever para participar de nossos eventos, apoiar na organização de campanhas, ou oferecer sua expertise em áreas como comunicação, logística e mais.
        <br><br>
        Cada um desses papéis é essencial para a realização de nossa missão. Trabalhando juntos, podemos criar um impacto positivo e duradouro. Junte-se a nós e faça parte desta rede de solidariedade e transformação.
    </p>
</div>

<div id="sobre" class="content">
    <span class="closebtn" onclick="closeContent('sobre')">&times;</span>
    <h2>Sobre o Site</h2>
    <p>
        Este site foi desenvolvido para fornecer informações sobre a ONG Esperança e Futuro, incluindo nossa missão, projetos e como você pode se envolver e contribuir.
        <br><br>
        <strong>Como Funciona:</strong>
        <br>
        O site é projetado para facilitar o acesso a informações sobre a ONG e suas atividades. A navegação é intuitiva, permitindo que os visitantes acessem seções sobre a organização, nossos projetos, e como colaborar com nossa causa. O menu principal no canto superior direito oferece acesso rápido às principais seções, enquanto a interface é otimizada para fornecer uma experiência de usuário clara e eficiente.
    </p>
</div>

<div id="desenvolvimento" class="content">
    <span class="closebtn" onclick="closeContent('desenvolvimento')">&times;</span>
    <h2>Desenvolvimento</h2>
    <p>
        Esta seção detalha as etapas de desenvolvimento do nosso site e dos sistemas que suportam a ONG. Descreve a tecnologia utilizada, os desafios enfrentados e as soluções implementadas para garantir uma experiência de usuário eficiente e segura.
    </p>
</div>

<div id="admin" class="content">
    <span class="closebtn" onclick="closeContent('admin')">&times;</span>
    <h2>Entrar como Administrador</h2>
    <p>
        Se você é um administrador e deseja acessar o painel de controle, por favor, faça login com suas credenciais aqui. Esta área é reservada para gerenciar e monitorar os aspectos administrativos da ONG, incluindo doações, voluntários e muito mais.
    </p>
</div>

<aside>
    <div class="conteudo">
        <div class="texto">
            <p style="font-weight: bold;">Sistema de Gerenciamento de Doações</p>
        </div>
        <div class="barra">
            <a href="doacoes/listadoacoes.php">
                <div class="botao">Gerenciar Doações</div>
            </a>
            <a href="voluntario/listavoluntarios.php">
                <div class="botao">Gerenciar Voluntários</div>
            </a>
            <a href="doadores/listadoadores.php">
                <div class="botao">Gerenciar Doadores</div>
            </a>
            <a href="donatario/listadonatario.php">
                <div class="botao">Gerenciar Donatários</div>
            </a>
            <a href="executar/listaexecutar.php">
                <div class="botao">Executar Doações</div>
            </a>
        </div>
    </div>
    <div class="imagem">
        <img src="img.png" alt="Imagem">
    </div>
</aside>
<footer>
    ©2024 HILÁRIA SARAIVA PEREIRA & DIAMILI SOIANE PEREIRA DA SILVA. TODOS OS DIREITOS RESERVADOS.
    </footer>

<script>
    function toggleMenu(x) {
        x.classList.toggle("change");
        var menu = document.getElementById("menu");
        if (menu.style.display === "block") {
            menu.style.display = "none";
        } else {
            menu.style.display = "block";
        }
    }

    function showContent(id) {
        var contents = document.querySelectorAll('.content');
        contents.forEach(content => content.classList.remove('active'));
        document.getElementById(id).classList.add('active');
        document.getElementById("overlay").classList.add("active"); // Mostra o overlay
    }

    function closeContent(id) {
        document.getElementById(id).classList.remove('active');
        document.getElementById("overlay").classList.remove("active"); // Esconde o overlay
    }

    function setActive(element) {
        var links = document.querySelectorAll('.menu a');
        links.forEach(link => link.classList.remove('active'));
        element.classList.add('active');
    }
</script>
</body>
</html>