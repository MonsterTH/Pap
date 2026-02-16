<?php
      include("../scripts/logindb.php");


      $Email = htmlspecialchars($_SESSION['Email']);
      $email = $_POST['email'];
      $pass = $_POST['pass'];    
      $rep_pass = $_POST['pass_rep'];
      $Date = date("Y-m-d"); 
      
      //verifica se já existe o utilizador
      $query = mysqli_query($sql, $comando);
      $num_rows = mysqli_num_rows($query);

      //se não existir, insere na base de dados
      if ($num_rows == 0)
      {
            $Date = date("Y-m-d");
            $comando = "INSERT INTO posts (Email_User, Content, Image, Date)
                  VALUES ('$nome', '$email', '$pass_hashed', '$Date', 'Image.png')";
                  
            $query = mysqli_query($sql, $comando);

            echo "ok";

            exit();
      }
      else
      {
            echo $msg = "Já existe um utilizador com este email.";
            exit();
      }
   
      mysqli_close($sql);
?>