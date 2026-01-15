<html>
<head>
      <title>Identity Fraud</title>
      <meta charset="UTF-8">
      <link rel="stylesheet" href="../scripts/moderno.css">    
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
                  <center><img class="img_logo" src="../imgs/LogoTipo.png"></center>
            </div>
      </div>
      
      <nav class="bar">
            <ul>
                  <li><a href="../home.php"><b>Início</b></a></li>
                  <li><a href="#"><b>Personagens</b></a></li>
                  <li><a href="#"><b>Notícias</b></a></li>
                  <li><a href="#"><b>Votos</b></a></li>
                  <li><a href=""><b>Sobre</b></a></li>
                  <li><a href="user/user.php"><b>Bem-vindo, <?php echo $username; ?></b></a></li>
            </ul>
      </nav>
      <div>
            <img class="aboutimg" src="../imgs/AboutImg.png">
            <div class="about">
            </div>
      </div>

      <footer>
            <p>Copyright © 2026 Identity Fraud. All rights reserved.</p>
      </footer>
</body>
</html>