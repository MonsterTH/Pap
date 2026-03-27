<html>
<head>
      <title>Identity Fraud</title>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="../scripts/moderno.css">    
      <link href="https://fonts.googleapis.com/css2?family=EB+Garamond:ital,wght@0,400..800;1,400..800&family=Oxygen:wght@300;400;700&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
      <?php
            include("../scripts/logindb.php");
            session_start();
            $isLogged = isset($_SESSION['Username']);
      ?> 
</head>
<body>

      <?php
            $username = $isLogged ? htmlspecialchars($_SESSION['Username']) : '';
      ?>

      <div class="fundo">
            <div class="logo"> 
                  <img class="img_logo" src="../imgs/LogoTipo.png">
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

      <div class="about-container">
            <img class="aboutimg" src="../imgs/Aboutimg.png" alt="Imagem do Identity Fraud">
            <div class="about">
                  <h1>Sobre o Identity Fraud</h1>
                  <p>
                        Identity Fraud é um reality show de competição onde 16 competidores com identidades falsas tentam descobrir as identidades uns dos outros enquanto protegem as suas. Cada competidor assume o papel de um investigador, tentando desvendar os segredos dos outros participantes para vencer a competição. <br><br>

                        O programa combina elementos de mistério, estratégia e interação social, criando uma experiência envolvente tanto para os competidores quanto para os espectadores. Ao longo da temporada, os competidores participam em desafios e votações que influenciam o andamento do jogo, enquanto o público tem a oportunidade de votar no seu investigador favorito para apoiar na sua jornada.
                  </p>
            </div>
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