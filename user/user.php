<html>
<head>
      <title>Perfil do Utilizador</title>
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
            
    <main>
        <fieldset>
            <h2>Bem-vindo, <?php echo $username; ?></h2>  

            <form id="user_form" onsubmit="erro_user(event)" method="POST">
                <div>
                    <input class="loginInput" type="text" id="user" name="user" maxlength="30" value="<?php echo $username ?>">
                </div>

                <div>
                    <input class="loginInput" type="password" id="pass_old" name="pass_old" maxlength="20" placeholder="Digite a sua password atual">
                </div>

                <div>
                    <input class="loginInput" type="password" id="pass_new" name="pass_new" maxlength="20" placeholder="Digite uma nova password">
                </div>

                <div>
                    <input class="loginInput" type="password" id="pass_rep" name="pass_rep" maxlength="20" placeholder="Confirme a sua password">
                </div>

                <span id="erro"></span><br>

                <div>
                    <button type="submit" class="loginButton">Atualizar Perfil</button>
                </div>

            </form>
            <hr>
            <a href="del_confirmation.php"><button type="" style="margin-left: 62px" class="DelButton">Apagar Perfil</button></a>
           <hr> 
        </fieldset>
    </main>
    
   <?php if ($isadmin): ?>
    <a href="../adminPanel/adminHome.php" style="margin-left:35%; margin-top:-75px; margin-bottom:15px">
        <button class="loginButton">Painel De Gestao</button>
    </a>
<?php endif; ?>

    <footer>
         <div class="footer-links">
                  <p><b>Useful Links</b></p>
                  <a href="index.html" style="float:left;"><b>Início</b></a> <a href="register/register.html" style="float:right; margin-right: 75px;"><b>Login/Registar</b></a> <br>
                  <a href="person.html" style="float:left;"><b>Jogadores</b></a><br>
                  <a href="noticias.html" style="float:left;"><b>Notícias</b></a><br>
                  <a href="votos.html"style="float:left;"><b>Votos</b></a><br>
                  <a href="about/about.html" style="float:left;"><b>Sobre</b></a>
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