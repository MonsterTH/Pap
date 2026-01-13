<html>
<head>
      <title>Perfil do Utilizador</title>
      <meta charset="UTF-8">
      <link rel="stylesheet" type="text/css" href="../scripts/moderno.css">
      <?php
            session_start();
            if (!isset($_SESSION['Username'])) 
            {
                  header('Location: login.html');
                  exit();
            }
      ?>    
      <script src="../../scripts/js/functions.js"></script>
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
                  <li><a href="#"><b>Sobre</b></a></li>
                  <li><a href="user.php"><b>Bem-vindo, <?php echo $username; ?></b></a></li>
            </ul>
      </nav>
            
        <div>
                <h2>Bem-vindo, <?php echo $username; ?></h2>  

                <form action="user_update.php" method="POST" enctype="multipart/form-data">

                    <div>
                            <input class="login" type="email" id="user" name="user" maxlength="30" value="<?php echo $email ?>">
                    </div>

                    <div>
                            <input class="login" type="password" id="pass_old" name="pass" maxlength="20" placeholder="Digite a sua password atual">
                    </div>

                    <div>
                            <input class="login" type="password" id="pass_new" name="pass_new" maxlength="20" placeholder="Digite uma nova password">
                    </div>

                    <div>
                            <input class="login" type="password" id="pass_rep" name="pass_rep" maxlength="20" placeholder="Confirme a sua password">
                    </div>

                    <div>
                            <button type="submit" class="btn-submit">Atualizar Perfil</button>
                            <button type="button" class="btn-submit" onclick="window.location='confirmacao.php'">Apagar Conta</button>
                    </div>
                </form>
        </div>

      <footer>
            <p>Copyright © 2026 Identity Fraud. All rights reserved.</p>
      </footer>
</body>
</html>
