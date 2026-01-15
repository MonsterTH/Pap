<html>
<head>
      <title>Identity Fraud</title>
      <meta charset="UTF-8">
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
                  <li><a href="index.html"><b>Início</b></a></li>
                  <li><a href="person.html"><b>Personagens</b></a></li>
                  <li><a href="noticias.html"><b>Notícias</b></a></li>
                  <li><a href="votos.html"><b>Votos</b></a></li>
                  <li><a href="about.html"><b>Sobre</b></a></li>
                  <li><a href="user/user.php"><b>Bem-vindo, <?php echo $username; ?></b></a></li>
            </ul>
      </nav>

      <div class="noti">
            <img class="img_noti" src="imgs/ns2.jpg">
            <h1> Notícia em Destaque </h1>
            <p> Lorem, ipsum dolor sit amet consectetur adipisicing elit. Deleniti nobis pariatur magnam itaque aliquam neque at iusto tenetur commodi nostrum dolore fugiat quidem odio maxime, debitis praesentium consectetur vel velit. </p>
      </div>

      <div>
            <div class="pesso">
                  <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Consequuntur iure omnis excepturi exercitationem corrupti quisquam vel voluptatibus a quam vitae. Ea, atque aliquam! Tempora qui dolorem exercitationem nemo. Laborum, deserunt.</p>
            <div>
                  <img class="img_noti" src="imgs/ns4.jpg" >
            </div>
            <div class="texto_noti">
                  <center><h1>Notícias</h1></center>
                  <p> Lorem ipsum dolor sit amet consectetur, adipisicing elit. Explicabo labore, quasi autem, dolores consequuntur quisquam repellendus maxime totam eveniet praesentium dolorum. Ratione placeat quisquam molestias ea impedit a id minima? </p>
            </div>
      </div>

      <div class="intro">
            <h1>Bem-vindo ao Identity Fraud</h1>
            <p> Lorem ipsum dolor sit amet consectetur adipisicing elit. Laborum iure earum exercitationem expedita delectus ipsa velit praesentium esse aperiam molestiae explicabo modi incidunt, eaque porro voluptatibus maiores libero fugit illo. </p>
      </div>

      <div class="pesso">
            <h1>Personagens</h1>
            <p> Lorem ipsum dolor sit amet consectetur adipisicing elit. Laborum iure earum exercitationem expedita delectus ipsa velit praesentium esse aperiam molestiae explicabo modi incidunt, eaque porro voluptatibus maiores libero fugit illo. </p>
      </div>

      <footer>
            <p>Copyright © 2026 Identity Fraud. All rights reserved.</p>
      </footer>
</body>
</html>