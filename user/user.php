<html>
<head>
      <title>Your Profile - IdentityFraud</title>
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
            <h2>Date Of Creation</h2>
            <h3><?php echo $creation; ?></h3>

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
        <textarea class="PostInput"  style='resize: none;' max="500" placeholder="Whats going on your mind?"></textarea>
        <hr>
        <label for="file-upload" class="AddAttachment">
            ^</label>
        <input id="file-upload" type="file" />
        <input class="PostButton" type="submit" value="Post">
        </form>
    </div>
    </section>
    

    <footer>
         <div class="footer-links">
                  <p><b>Useful Links</b></p>
                  <a href="../home.php" style="float:left;"><b>Início</b></a> <a href="../register/register.html" style="float:right; margin-right: 75px;"><b>Login/Registar</b></a> <br>
                  <a href="../Players/players.php" style="float:left;"><b>Jogadores</b></a><br>
                  <a href="../news/newspage.php" style="float:left;"><b>Notícias</b></a><br>
                  <a href="../Players/voting.php"style="float:left;"><b>Votos</b></a><br>
                  <a href="../about/about.php" style="float:left;"><b>Sobre</b></a>
            </div>
            <div class="footer-links">
                  <p><b>Contacts</b></p>
                  <div style="float: left;"><img style="float: left; margin-left: 125px;" src="../imgs/telephone.png"><p style="float: left; margin-top: -13px;">+351-933441581</p></div>
                  <div style="float: left;"><img src="../imgs/envelope.png" style="float: left; margin-left: 85px;"><p style="float: left; margin-top: -13px;">Support@IdentityFraud.com </p></div>
            </div>
            <div class="footer-links">
                  <p><b>Identity Fraud</b></p>
                  <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quia veniam expedita quod odit quaerat maiores.</p>
            </div><br><br><br>
            <p>.</p>
            <hr>
            <p style="float: left; margin-left: 150px;">Ⓒ Copyright 2026. Todos os direitos reservados.</p>
            <div style="float: right;margin-top: 20px; margin-right: 165px;"><a href="#"><img src="../imgs/facebook.png" style="float: left; margin-left: 5px;"></a><a href="#"><img src="../imgs/youtube.png" style="float: left; margin-left: 5px;"></a><a href="#"><img src="../imgs/insta.png" style="float: left; margin-left: 5px;"></a><a href="#"><img src="../imgs/tiktok.png" style="float: left; margin-left: 5px;"></a></div>
    </footer>
</body>
</html>