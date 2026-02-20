<html>
<head>
      <title>Identity Fraud</title>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="scripts/moderno.css">    
      <link href="https://fonts.googleapis.com/css2?family=EB+Garamond:ital,wght@0,400..800;1,400..800&family=Oxygen:wght@300;400;700&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
      <?php
            session_start();
            if (!isset($_SESSION['Username'])) {
            header('Location: ../utilizador/login.html');
            exit();
            }
      ?>
</head>
<body>

      <?php
            $username = htmlspecialchars($_SESSION['Username']);
      ?>

      <div class="fundo">
            <div class="logo"> 
                  <center><img class="img_logo" src="imgs/LogoTipo.png"></center>
            </div>
      </div>
      
      <nav class="bar">
            <ul>
                  <li><a href="home.php"><b>Início</b></a></li>
                  <li><a href="Players/players.php"><b>Jogadores</b></a></li>
                  <li><a href="news/newspage.php"><b>Notícias</b></a></li>
                  <li><a href="Players/voting.php"><b>Votos</b></a></li>
                  <li><a href="Feed/feed.php"><b>Feed</b></a></li>
                  <li><a href="about/about.php"><b>Sobre</b></a></li>
                  <li><a href="user/user.php"><b>Bem-vindo, <?php echo $username; ?></b></a></li>
            </ul>
      </nav>

      <div class="noti">
            <div class="conteudo">
                  <div style="margin-top: -5px; flex: 1;">
                        <h1> O que é o Identity Fraud? </h1>
                        <p> Identity Fraud torna todos os competidores em investigadores, 16 Pessoas, todas com identidades falsas competem para descobrir a identidade dos outros enquanto protegem a sua. <br>Ajuda o teu investigador favorito a vencer ao votar na competição enquanto juntas-te a investigação.<br> 
                        <a href="about/about.php"><button>Descubrir Mais</button></a> </p>
                  </div>
                  <img class="img_noti" src="imgs/ns2.jpg">
            </div>
      </div>

      <div class="container_pesso">
            <div class="pesso">
                  <h1> Competidores </h1>
                  <p> Conhece os competidores da nova temporada de Identity Fraud! </p>
                  <br>
                  <div class="imgcarrosel" id="carroselComp">
                        <ul>
                              <li data-accName="Item 1">
                                    <img src="imgs/ns.jpg"></img>
                              </li>
                              <li data-accName="Item 2">
                                    <img src="imgs/ns2.jpg"></img>
                              </li>
                              <li data-accName="Item 3">
                                    <img src="imgs/ns3.jpg" ></img>
                              </li>
                              <li data-accName="Item 4">
                                    <img src="imgs/ns4.jpg"></img>
                              </li>
                        </ul>
                  </div>
            </div>
            <div class="pesso">
                  <h1> Noticias </h1>
                  <p> Mantem-te Informado no que acontece em Identity Fraud </p>
                  <br>
                  <div class="imgcarrosel" id="carroselNew">
                        <ul>
                              <li data-accName="Item 1">
                                    <img></img>
                              </li>
                              <li data-accName="Item 2">
                                    <img></img>
                              </li>
                              <li data-accName="Item 3">
                                    <img></img>
                              </li>
                              <li data-accName="Item 4">
                                    <img></img>
                              </li>
                        </ul>
                  </div>
            </div>
      </div>

      <footer>
            <div class="footer-container">
                  <div class="footer-links">
                        <p><b>Useful Links</b></p>
                        <a href="index.html"><b>Início</b></a>
                        <a href="register/register.html"><b>Login/Registar</b></a>
                        <a href="person.html"><b>Jogadores</b></a>
                        <a href="noticias.html"><b>Notícias</b></a>
                        <a href="votos.html"><b>Votos</b></a>
                        <a href="about/about.html"><b>Sobre</b></a>
                  </div>

                  <div class="footer-links">
                        <p><b>Contacts</b></p>
                        <p><img src="imgs/telephone.png" alt="Telefone"> +351-933441581</p>
                        <p><img src="imgs/envelope.png" alt="Email"> Support@IdentityFraud.com</p>
                  </div>

                  <div class="footer-links">
                        <p><b>Identity Fraud</b></p>
                        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quia veniam expedita quod odit quaerat maiores.</p>
                        <div class="social-icons">
                        <a href="#"><img src="imgs/facebook.png" alt="Facebook"></a>
                        <a href="#"><img src="imgs/youtube.png" alt="YouTube"></a>
                        <a href="#"><img src="imgs/insta.png" alt="Instagram"></a>
                        <a href="#"><img src="imgs/tiktok.png" alt="TikTok"></a>
                        </div>
                  </div>
            </div>

            <hr>
            <p class="copyright">Ⓒ Copyright 2026. Todos os direitos reservados.</p>
      </footer>

            <script>
                  function autoCarousel(selector, speed) {
                        const track = document.querySelector(selector + " ul");
                        const slides = track.children;

                        let index = 0;

                        setInterval(() => {
                              index = (index + 1) % slides.length;

                              track.scrollTo({
                                    left: slides[index].offsetLeft - track.offsetLeft,
                                    behavior: "smooth"
                              });

                        }, speed);
                  }

                  autoCarousel("#carroselComp", 5000);
                  autoCarousel("#carroselNew", 5000);
            </script>
</body>
</html>