<?php
      include("../../scripts/logindb.php");
      session_start();

      $Email = htmlspecialchars($_SESSION['Email']);
      $Content = $_POST['Content']; 
      $postId = $_POST['PostId'];

      //---------------------------------------------------

      
      //verifica se já existe o utilizador

      $Date = date("Y-m-d");
            $comando = "INSERT INTO post_coments (Email_User, Id_Post, Content, Date)
                  VALUES ('$Email', '$postId', '$Content', '$Date')";
                  
            $query = mysqli_query($sql, $comando);

            echo "ok";

      mysqli_close($sql);
?>