<?php
      session_start();
      include("../scripts/logindb.php");

      $email = $_SESSION["Email"];
      $pass = $_SESSION["Password"];

      $nome = $_POST["user"];
      $pass_old = $_POST["pass_old"];
      $pass_new = $_POST["pass_new"];
      $pass_rep = $_POST["pass_rep"];

      //Verificação se as passwords coincidem

      if ($pass_new !== $pass_rep) 
      {
            echo "As senhas novas não coincidem";
            exit();
      }

      //Verificação da password antiga

      if (password_verify($pass_old, $pass)) 
      {
            $pass_hashed = password_hash($pass_new, PASSWORD_DEFAULT);

            $query = "UPDATE users SET Username = '$nome', Password = '$pass_hashed' WHERE Email = '$email'";
            $result = mysqli_query($sql, $query);

            if ($result) 
            {
                  $_SESSION['Username'] = $nome;
                  echo "ok";
                  exit();
            } 

            else 
            {
                  echo "Erro ao atualizar o perfil. Tente novamente.";
                  exit();
            }
      }

      else
      {
            echo "Password atual incorreta.";
            exit();
      }

      mysqli_close($sql);
?>
