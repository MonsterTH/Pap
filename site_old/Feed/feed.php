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
            
<main>
    <div class="SideInfo1">
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

    <div class="PostBox">

    <?php
            include("../scripts/logindb.php");
            $Query="select * from posts Order by rand()";
            $List=mysqli_query($sql,$Query);
            $NumReg=mysqli_num_rows($List);
            echo'<br>';
            $firstPlayerId = null;
            For($i=0;$i<$NumReg;$i++) //Passar registo linha a linha
            {
                $Registo = mysqli_fetch_array($List);
                $NomeQuery = "SELECT username FROM users WHERE Email='" . $Registo["Email_User"] . "'";
                $Nome2 = mysqli_query($sql, $NomeQuery);
                $User = mysqli_fetch_array($Nome2);
                $Nome = $User["username"];

                if ($Registo["Image"] == "Null") {
                    echo '<div class="PostInterface">
                        <img></img>
                        <p>'. $Nome .'</p>
                        <pre>'. ($Registo["Date"]) .'</pre><br><br>
                        <p>'. ($Registo["Content"]) .'</p>
                        <hr>
                        <div class="PostInteraction">
                             <div class="box"> <button onclick="SendLike('. ($Registo["Id"]).', this)"> <img src="../imgs/Like.png"><p>'. GetLikeCount($Registo["Id"]) .'</p></button> </div>
                            <a href="focusedPost.php?id='. $Registo['Id'] .'"><div class="box"> <button><img src="../imgs/Comment.png"></img><p>'. GetCommentCount($Registo["Id"]) .'</p></button></div></a>
                            <div class="box"> <button><img src="../imgs/Share.png"></img><p>Share</p></button> </div>
                        </div>
                    </div>';  
                }
                else {
                    
                    echo '<div class="PostInterfaceWithImage">
                        <img></img>
                        <p>'. $Nome .'</p>
                        <pre>'. ($Registo["Date"]) .'</pre><br><br>
                        <p>'. ($Registo["Content"]) .'</p>
                        <img class="PostImage" src="../imgs/imgs_saves/'. ($Registo["Image"]).'"></image>
                        <hr>
                        <div class="PostInteraction">
                             <div class="box"> <button onclick="SendLike('. ($Registo["Id"]).', this)"> <img src="../imgs/Like.png"><p>'. GetLikeCount($Registo["Id"]) .'</p></button> </div>
                            <a href="#"><div class="box"> <button><img src="../imgs/Comment.png"></img><p>'. GetCommentCount($Registo["Id"]) .'</p></button></div></a>
                            <div class="box"> <button><img src="../imgs/Share.png"></img><p>Share</p></button> </div>
                        </div>
                    </div>';
                }
            }
        ?>

</div>
</main>

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

<script>

function SendLike(PostId, button) {
    const PostInfo = new FormData();
    PostInfo.append("PostId", PostId);

    fetch("scripts/like.php", {
        method: "POST",
        body: PostInfo
    })
    .then(response => response.text())
    .then(newCount => {
        button.querySelector("p").innerText = newCount;
    });
}
</script>
</html>