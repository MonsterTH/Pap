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
            echo "
                  <script>
                        alert('As passwords não coincidem.');
                        window.history.back();
                  </script>";
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
                  echo "
                        <script>
                              alert('Perfil atualizado com sucesso!');
                              window.location.href='../home.php';
                        </script>";
            } 

            else 
            {
                  echo "
                        <script>
                              alert('Erro ao atualizar o perfil. Tente novamente.');
                              window.history.back();
                        </script>";
                  exit();
            }
      }

      else
      {
            echo "
                  <script>
                        alert('Password atual incorreta.');
                        window.history.back();
                  </script>";
            exit();
      }

      mysqli_close($sql);
?>
