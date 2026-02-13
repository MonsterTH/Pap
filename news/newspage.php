<html>
<head>
      <title>Noticias - Identity Fraud</title>
      <meta charset="UTF-8">
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

<section>
    <h1 class="newsh1" style="margin-top:-5px;">Mais Vistos:</h1>
    <div class="newsrow">
        <?php
                include("../scripts/logindb.php");
                $Query="select * from news where Genre='MV'";
                $List=mysqli_query($sql,$Query);
                $NumReg=mysqli_num_rows($List);
                $firstPlayerId = null;
                For($i=0;$i<$NumReg;$i++) //Passar registo linha a linha
                {
                    $Registo = mysqli_fetch_array($List);

                    echo'<div class="newscard"> 
                            <img></img>
                            <div class="textslot"> 
                                <h1>',$Registo['Title'],'</h1>
                                <p>',$Registo['Description'],'</p>
                            </div> 
                            <!-- <div class="continuebutton"><p>><p></div> -->
                         </div>';
                }
        ?>
        <!--<div class="newscard"> 
            <img></img>
            <div class="textslot"> 
                <h1>Titolo</h1>
                <p>Texto TextoTextoTextoTextoTextoTextoTextoTextoTextoTextoTextoTextoTextoTextoTextoTexto TextoTextoTextoTextoTextoTextoTextoTextoTextoTextoTextoTextoTextoTextoTextoTexto TextoTextoTextoTextoTextoTextoTextoTextoTextoTextoTextoTextoTextoTextoTextoTexto TextoTextoTextoTextoTextoTextoTextoTextoTextoTextoTextoTextoTextoTextoTextoTexto</p> </div> 
             
        </div>-->

    </div>
    <hr class="newshr">

    <div class="bignew">
        <h1>Em Destaque:</h1>
        <?php
                include("../scripts/logindb.php");
                $Query="select * from news where Genre='DE'";
                $List=mysqli_query($sql,$Query);
                $NumReg=mysqli_num_rows($List);
                $firstPlayerId = null;
                For($i=0;$i<$NumReg;$i++) //Passar registo linha a linha
                {
                    $Registo = mysqli_fetch_array($List);

                    echo'<img></img>
                        <div class="textarea">
                        <h1>',$Registo['Title'],'</h1>
                        <p>',$Registo['Description'],'</p>
                            </div>';
                }
        ?>
    </div>

    <hr class="newshr">
    <h1 class="newsh1">Drama:</h1>
    <div class="newsrow">
        <?php
                include("../scripts/logindb.php");
                $Query="select * from news where Genre='DR'";
                $List=mysqli_query($sql,$Query);
                $NumReg=mysqli_num_rows($List);
                $firstPlayerId = null;
                For($i=0;$i<$NumReg;$i++) //Passar registo linha a linha
                {
                    $Registo = mysqli_fetch_array($List);

                    echo'<div class="newscard"> 
                            <img></img>
                            <div class="textslot"> 
                                <h1>',$Registo['Title'],'</h1>
                                <p>',$Registo['Description'],'</p>
                            </div> 
                            <!-- <div class="continuebutton"><p>><p></div> -->
                         </div>';
                }
        ?>
    </div>

    <hr class="newshr">
    <h1 class="newsh1">Noticias Da Casa:</h1>

    <div class="newsrow">

    <?php
                include("../scripts/logindb.php");
                $Query="select * from news where Genre='NC'";
                $List=mysqli_query($sql,$Query);
                $NumReg=mysqli_num_rows($List);
                $firstPlayerId = null;
                For($i=0;$i<$NumReg;$i++) //Passar registo linha a linha
                {
                    $Registo = mysqli_fetch_array($List);

                    echo'<div class="newscard"> 
                            <img></img>
                            <div class="textslot"> 
                                <h1>',$Registo['Title'],'</h1>
                                <p>',$Registo['Description'],'</p>
                            </div> 
                            <!-- <div class="continuebutton"><p>><p></div> -->
                         </div>';
                }
        ?>

    </div>

    <hr class="newshr">

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