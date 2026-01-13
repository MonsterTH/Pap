<?php
      session_start();
      include("../scripts/logindb.php");

      $email = $_POST['email'];
      $pass = $_POST['pass'];

      // Verificar se o utilizador existe
      $comando = "SELECT * FROM users WHERE Email = '$email'";
      $query = mysqli_query($sql, $comando);
      $num_rows = mysqli_num_rows($query);

      if ($num_rows == 1) 
      {
            $dados = mysqli_fetch_assoc($query);
            $pass_hashed = $dados['Password'];

            // Verifica password
            if (password_verify($pass, $pass_hashed)) 
            {
                  $_SESSION['Username'] = $dados['Username'];
                  $_SESSION['Email'] = $dados['Email'];

                  header("Location: ../index.html");
                  exit();
            } 

            else 
            {
                  echo("<script>
                        alert('As senhas não coincidem.');
                        window.history.back();
                  </script>");
            }
      }

      else 
      {
            header("Location: ../../html/utilizador/falha.html");
      }

      mysqli_close($sql);
?>
