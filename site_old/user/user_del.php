<?php
      session_start();
      include("../scripts/logindb.php");

      $email = $_POST["email"];
      $pass = $_POST["pass"];

      $email_session = $_SESSION['Email'];

      if ($email !== $email_session)
      {
            echo "O email não corresponde ao da sessão.";
            exit();
      }

      $query = "SELECT Password FROM users WHERE Email = '$email_session'";
      $result = mysqli_query($sql, $query);
      $user = mysqli_fetch_assoc($result);

      if (!$user) 
      {
            echo "Utilizador não encontrado.";
            exit();
      }
 
      if (!password_verify($pass, $user['Password'])) 
      {
            echo "Password incorreta!";
            exit();
      }


      $delete = "DELETE FROM users WHERE Email = '$email_session'";
      $result_delete = mysqli_query($sql, $delete);

      if ($result_delete)
      {
            session_unset();
            session_destroy();

            echo "ok";
            exit();
      }
      else
      {
            echo "
                  <script>
                        alert('Erro ao apagar o utilizador. Tente novamente.');
                        window.history.back();
                  </script>";
            exit();
      }

      mysqli_close($sql);
?>