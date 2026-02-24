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

        function GetLikeCount($PostId)
        {
            include("../scripts/logindb.php");
                $LikeCountQuery = "SELECT count(*) FROM post_likes WHERE Id_Post='". $PostId ."'";
                $LikeCount2 = mysqli_query($sql, $LikeCountQuery);
                $LikeCount3 = mysqli_fetch_array($LikeCount2);
                $LikeCount = $LikeCount3["count(*)"];
                return $LikeCount;
        }

        function GetCommentCount($PostId)
        {
            include("../scripts/logindb.php");
                $CommentCountQuery = "SELECT count(*) FROM post_coments WHERE Id_Post='". $PostId ."'";
                $CommentCount2 = mysqli_query($sql, $CommentCountQuery);
                $CommentCount3 = mysqli_fetch_array($CommentCount2);
                $CommentCount = $CommentCount3["count(*)"];
                return $CommentCount;
        }
      ?>    
      <script src="../scripts/functions.js"></script>
</head>
<body>
    <?php
        $username = htmlspecialchars($_SESSION['Username']);
        $Email = htmlspecialchars($_SESSION['Email']);
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


    <div class="onefourth" style="background-color: rgba(255, 255, 255, 0); width: 26%; margin-left:-22vw;">
        <div class="SideInfo1" style="margin-left: 1vw;">
            <?php 
                    $PostCountQuery = "SELECT count(*) FROM posts WHERE Email_User='". $Email ."'";
                    $PostCount2 = mysqli_query($sql, $PostCountQuery);
                    $PostCount3 = mysqli_fetch_array($PostCount2);
                    $PostCount = $PostCount3["count(*)"];
            ?>
            <img></img>
            <h1><?php echo $username; ?></h1>
            <p>Posts: <?php echo $PostCount; ?>| Likes: 0</p>
            <hr>
        </div>
    </div>
    <div class="onefourth" style="background-color: rgba(255, 255, 255, 0);; width: 50%;">
         <div class="FocusedPostBar" style="margin-bottom:1vw;">
                <img src="../imgs/back.png" style="background-color:rgb(255,255,255, 0); float: left;"></img>
                <div class="FocusedPostBarContent">
                    <img></img>
                    <p>Nome</p>
                    <pre>date</pre>
                </div>
         </div>
         <div class="PostInterface" style="width: 100%; max-height: 475px; min-height: 215px;">
                        <p style="margin-top:3vw;">ContDeepwoken Deepwoken Deepwoken Deepwoken Deepwoken Deepwoken Deepwoken Deepwoken Deepwoken Deepwoken Deepwoken Deepwoken Deepwoken Deepwoken Deepwoken Deepwoken Deepwoken Deepwoken Deepwoken Deepwoken Deepwoken Deepwoken Deepwoken Deepwoken Deepwoken Deepwoken Deepwoken Deepwoken Deepwoken Deepwoken Deepwoken Deepwoken Deepwoken Deepwoken Deepwoken Deepwoken Deepwoken Deepwoken Deepwoken Deepwoken Deepwoken Deepwoken Deepwoken Deepwoken Deepwoken Deepwoken Deepwoken Deepwoken Deepwoken Deepwoken ent</p>
                        <hr>
                        <div class="PostInteraction" style="width:100%">
                             <div class="box"> <button><img src="../imgs/Like.png"></img><p>0</p></button></div>
                            <div class="box"> <button><img src="../imgs/Comment.png"></img><p>0</p></button></div>
                            <div class="box"> <button><img src="../imgs/Share.png"></img><p>Share</p></button> </div>
                        </div>
                    </div>

         <div class="PostBox">
            <div class="PostInterface">
                        <img></img>
                        <p>Nome</p>
                        <pre>Date</pre><br><br>
                        <p>Content</p>
                        <hr>
                        <div class="PostInteraction">
                             <div class="box"> <button><img src="../imgs/Like.png"></img><p>0</p></button></div>
                            <a href="#"><div class="box"> <button><img src="../imgs/Comment.png"></img><p>0</p></button></div></a>
                            <div class="box"> <button><img src="../imgs/Share.png"></img><p>Share</p></button> </div>
                        </div>
                    </div>
         </div>

    <div class="onefourth" style="background-color: rgba(255, 255, 255, 0);width: 26%;">
    </div>

    </main>
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