<html>
<head>
      <meta charset="UTF-8">
      <link rel="stylesheet" type="text/css" href="../scripts/moderno.css">
      <?php

      $isadmin = false;

      include("../scripts/logindb.php");
            session_start();
            if (!isset($_SESSION['Username'])) 
            {
                  header('Location: ../index.html'); 
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
        $creation = htmlspecialchars($_SESSION['Creation']);    
        $PostCountQuery = "SELECT count(*) FROM posts WHERE Email_User='". $email ."'";
        $PostCount2 = mysqli_query($sql, $PostCountQuery);
        $PostCount3 = mysqli_fetch_array($PostCount2);
        $PostCount = $PostCount3["count(*)"];
    ?>

    <div class="fundo">
        <div class="logo"> 
                <center><img class="img_logo" src="../imgs/LogoTipo.png"></center>
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
            
    <main>
        <div class="userinforow">
            <img></img>
            <h1><?php echo $username; ?></h1>
            <h2>Join Date | Posts</h2>
            <h3><?php echo $creation; ?> | <?php echo $PostCount; ?></h3>

            <div class="dropdown">
                <button class="dropdownbutton">≡</button>
                <div class="dropdown-content">
                    <a href="userupdate.php">Editar Perfil</a>
                    <a href="logout.php">Sair</a>

                    <?php if ($isadmin): ?>
                        <a href="/scripts/Pap/adminPanel/Players/PlayersPanel.php">Admin</a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </main>  
    <section class="sectionuser">  
    <div class="usersection"></div>
    <div class="userPostInput">
        <img></img><p><?php echo $username; ?></p>
        <form enctype="multipart/form-data" method="post" action="Post.php">
        <textarea name="Content" class="PostInput"  style='resize: none;' maxlength="500" placeholder="Whats going on your mind?"></textarea>
        <hr>
        <label for="file-upload" class="AddAttachment">
            <img src="../imgs/ImageAttach.png"></img></label>
        <input id="file-upload" type="file" name="Image" value="Null"/>
        <input class="PostButton" type="submit" value="Post">
        </form>
    </div>
    </section>
    

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
<head>
    <title><?php echo $username ?> - IdentityFraud</title>
 </head>
</html>