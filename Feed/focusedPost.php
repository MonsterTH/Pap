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
        $postId = isset($_GET['id']) ? (int)$_GET['id'] : 0;
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
<?php 
    include("../scripts/logindb.php");
    $Query="select * from posts Where Id= ". $postId ."";
    $List=mysqli_query($sql,$Query);
    $NumReg=mysqli_num_rows($List);
    echo'<br>';

    if ($NumReg > 0)
    {
        $Registo = mysqli_fetch_array($List);
        $NomeQuery = "SELECT username FROM users WHERE Email='" . $Registo["Email_User"] . "'";
        $Nome2 = mysqli_query($sql, $NomeQuery);
        $User = mysqli_fetch_array($Nome2);
        $Nome = $User["username"];
        echo'
        <div class="onefourth" style="background-color: rgba(255, 255, 255, 0);; width: 50%;">
            <div class="FocusedPostBar" style="margin-bottom:1vw;">
                <a href="feed.php"><img src="../imgs/back.png" style="background-color:rgb(255,255,255, 0); float: left;"></img></a>
                <div class="FocusedPostBarContent">
                    <img></img>
                    <p>'. $Nome .'</p>
                    <pre>'. ($Registo["Date"]) .'</pre>
                    <pre style="margin-top:-0.5vw">'. GetCommentCount($Registo["Id"]).' Comentarios</pre>
                </div>
         </div>
         <div class="PostInterface" style="width: 100%; max-height: 475px; min-height: 215px;">
                        <p style="margin-top:-1w;"><p>'. $Registo["Content"].'</p></p>
                        <hr style="margin-top:2vw;">
                        <div class="PostInteraction" style="width:100%;">
                             <div class="box"> <button onclick="SendLike('. ($Registo["Id"]).', this)"> <img src="../imgs/Like.png"><p>'. GetLikeCount($Registo["Id"]) .'</p></button> </div>
                            <div class="box"> <button><img src="../imgs/Share.png"></img><p>Share</p></button> </div>
                        </div>
                    </div>';
    }
?>
 <div class="FocusedPostBar" style="margin-bottom:1vw; border-top: 0px solid #995f6e;border-right: 0px solid #995f6e; background: rgb(22,22,22);">
                <div class="FocusedPostBarContent">
                    <img></img><p><?php echo $username; ?></p>
                    <form enctype="multipart/form-data" method="post" action="scripts/coment.php">
                        <div class="FocusedPostBarContent" style="width: 25vw;">
                        <textarea name="Content" class="CommentBox"  style='resize: none;' maxlength="500" placeholder="Give Us Your Opinion"></textarea>
                        <input type="number" class="hiddeninput" value="<?php echo $postId ?>" name="PostId"></input>
                        <button type="submit" class="CommentPost"><img class="ImgInsideInput" src="../imgs/post.png"></img></button>
                    </form>
                </div>
         </div>
         <div class="PostBox" style="height:55%; ">
         <?php
            $Query="select * from post_coments Where Id_Post= ". $postId ."";
            $List=mysqli_query($sql,$Query);
            $NumReg=mysqli_num_rows($List);
            echo'<br>';

            For($i=0;$i<$NumReg;$i++)
            {
                $Registo = mysqli_fetch_array($List);
                $NomeQuery = "SELECT username FROM users WHERE Email='" . $Registo["Email_User"] . "'";
                $Nome2 = mysqli_query($sql, $NomeQuery);
                $User = mysqli_fetch_array($Nome2);
                $Nome = $User["username"];
                echo'
                        <div class="PostInterface">
                                     <img></img>
                                       <p>'. $Nome .'</p>
                                    <pre>'. ($Registo["Date"]) .'</pre><br><br>
                                     <p>'. ($Registo["Content"]) .'</p>
                                     <hr>
                                        <div class="PostInteraction">
                                        <div class="box"> <button><img src="../imgs/Like.png"></img><p>0</p></button></div>
                                        <div class="box"> <button><img src="../imgs/Share.png"></img><p>Share</p></button> </div>
                                    </div>
                                    </div>';
            }
         ?>
        </div>
    <div class="onefourth" style="background-color: rgba(255, 255, 255, 0);width: 26%;">
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
</body>
<head>
    <title>Post - IdentityFraud</title>
</head>
</html>