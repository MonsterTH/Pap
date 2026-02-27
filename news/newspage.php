<html>
<head>
      <title>Noticias - Identity Fraud</title>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" type="text/css" href="../scripts/moderno.css">
      <?php
            include("../scripts/logindb.php");
            session_start();
            $isLogged = isset($_SESSION['Username']);
      ?>    
      <script src="../../scripts/js/functions.js"></script>
</head>
<body>
    <?php
        $username = $isLogged ? htmlspecialchars($_SESSION['Username']) : '';
    ?>

    <div class="fundo">
        <div class="logo"> 
                <center><img class="img_logo" src="../imgs/LogoTipo.png"></center>
        </div>
    </div>
    <nav class="bar">
            <?php if ($isLogged): ?>
                <ul>
                    <li><a href="../home.php"><b>Início</b></a></li>
                    <li><a href="../Players/players.php"><b>Jogadores</b></a></li>
                    <li><a href="../news/newspage.php"><b>Notícias</b></a></li>
                    <li><a href="../Players/voting.php"><b>Votos</b></a></li>
                    <li><a href="../Feed/feed.php"><b>Feed</b></a></li>
                    <li><a href="../about/about.php"><b>Sobre</b></a></li>
                    <li><a href="../user/user.php"><b>Bem-vindo, <?php echo $username; ?></b></a></li>
                </ul>
            <?php else: ?>
                <ul>
                    <li><a href="../index.html"><b>Início</b></a></li>
                    <li><a href="../Players/players.php"><b>Jogadores</b></a></li>
                    <li><a href="../news/newspage.php"><b>Notícias</b></a></li>
                    <li><a href="../login/login.html"><b>Votos</b></a></li>
                    <li><a href="../login/login.html"><b>Feed</b></a></li>
                    <li><a href="../about/about.php"><b>Sobre</b></a></li>
                    <li><a href="../login/login.html"><b>Login/Registar</b></a></li>
                </ul>
            <?php endif; ?>
    </nav>
        <h1 style="color: #bf687f;">Trending: </h1>
        <div class="onefourthvertical" style="height:35vw">
            <div class="TrendingPost1"></div>
            <div class="TrendingPost2"></div>
            <div class="TrendingPost2"></div>
        </div>
      <footer>
            <div class="footer-container">
                  <div class="footer-links">
                        <p><b>Useful Links</b></p>
                        <a href="../index.html"><b>Início</b></a>
                        <a href="../register/register.html"><b>Login/Registar</b></a>
                        <a href="../Players/players.php"><b>Jogadores</b></a>
                        <a href="../news/newspage.php"><b>Notícias</b></a>
                        <a href="../Players/voting.php"><b>Votos</b></a>
                        <a href="../about/about.php"><b>Sobre</b></a>
                  </div>

                  <div class="footer-links">
                        <p><b>Contacts</b></p>
                        <p><img src="../imgs/telephone.png" alt="Telefone"> +351-933441581</p>
                        <p><img src="../imgs/envelope.png" alt="Email"> Support@IdentityFraud.com</p>
                  </div>

                  <div class="footer-links">
                        <p><b>Identity Fraud</b></p>
                        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quia veniam expedita quod odit quaerat maiores.</p>
                        <div class="social-icons">
                        <a href="#"><img src="../imgs/facebook.png" alt="Facebook"></a>
                        <a href="#"><img src="../imgs/youtube.png" alt="YouTube"></a>
                        <a href="#"><img src="../imgs/insta.png" alt="Instagram"></a>
                        <a href="#"><img src="../imgs/tiktok.png" alt="TikTok"></a>
                        </div>
                  </div>
            </div>

            <hr>
            <p class="copyright">Ⓒ Copyright 2026. Todos os direitos reservados.</p>
      </footer>
</body>
</html>