<html>
<head>
      <title>Votaçao - Identity Fraud</title>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" type="text/css" href="../scripts/moderno.css">
      <?php

      $isadmin = false;

      include("../scripts/logindb.php");
            session_start();
            if (!isset($_SESSION['Username'])) 
            {
                  header('Location: loginInput.html');
                  exit();
            }

            // CheckIfAdmin

        $email = htmlspecialchars($_SESSION['Email']);

            $comando = "SELECT * FROM administrador WHERE Email = '$email'";
            $query = mysqli_query($sql, $comando);
            $num_rows = mysqli_num_rows($query);

            if ($num_rows == 1) 
            {
                $isadmin = true;
            }
      ?>    
      <script src="../scripts/functions.js"></script>
</head>
<body>
    <?php
        $username = htmlspecialchars($_SESSION['Username']);
    ?>

    <div class="fundo">
        <div class="logo"> 
                <img class="img_logo" src="../imgs/LogoTipo.png">
        </div>  
    </div>
    <nav class="bar">
            <ul>
                <li><a href="../home.php"><b>Início</b></a></li>
                <li><a href="../Players/players.php"><b>Jogadores</b></a></li>
                <li><a href="../news/newspage.php"><b>Notícias</b></a></li>
                <li><a href="../Players/voting.php"><b>Votos</b></a></li>
                <li><a href="../Feed/feed.php"><b>Feed</b></a></li>
                <li><a href="../about/about.php"><b>Sobre</b></a></li>
                <li><a href="../user/user.php"><b>Bem-vindo, <?php echo $username; ?></b></a></li>
            </ul>
    </nav>

      <section class="voting-container">

            <?php
                  include("../scripts/logindb.php");
                  $Query="select * from players";
                  $List=mysqli_query($sql,$Query);
                  $NumReg=mysqli_num_rows($List);
                  $firstPlayerId = null;
                  For($i = 0; $i < 4; $i++) //Passar registo linha a linha
                  {
                        $Registo = mysqli_fetch_array($List);

                        // Guarda o ID do primeiro jogador
                        if ($i == 0) 
                        {
                              $firstPlayerId = $Registo['Id'];
                        }

                        echo'
                              <div class="playervoting">
                                    <img src="../imgs/imgs_saves/'.$Registo['Photo'].'"></img>
                                    <button onclick="vote('.$Registo['Id'].')">
                                          <h1>Votar</h1>
                                    </button>
                                    <p>'.htmlspecialchars($Registo['Name']).'</p>
                              </div>
                              
                              ';
                  }
            ?>

      </section>

      <br>
      <span style="text-align: center; color: red;" id="erro"></span>
      <hr>
      <a href="players.php" class="actionbutton">
            Ver Participantes
      </a>

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