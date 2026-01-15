<?php
      session_start();
      include("../scripts/logindb.php");


      $email = $_POST["email"];
      $pass = $_POST["pass"];

      $pass_session = $_SESSION['Password'];
      $email_session = $_SESSION['Email'];


      if ($email !== $email_session) 
      {
            echo "
                  <script>
                        alert('O email não corresponde ao da sessão!');
                        window.history.back();
                  </script>";
            exit();
      }


      $query = "SELECT Password FROM users WHERE Email = '$email_session'";
      $result = mysqli_query($sql, $query);
      $user = mysqli_fetch_assoc($result);


      if (!$email) 
      {
            echo "
                  <script>
                        alert('Email não encontrado.');
                        window.history.back();
                  </script>";
            exit();
      }

 
      if (!password_verify($pass, $pass_session)) 
      {
            echo "
                        <script>
                              alert('Password incorreta!');
                              window.history.back();
                        </script>
                  ";
                  exit();
      }


      $delete = "DELETE FROM users WHERE Email = '$email_session'";
      $result_delete = mysqli_query($sql, $delete);

      if ($result_delete)
      {
            session_unset();
            session_destroy();

            echo "
                  <script>
                        alert('Utilizador apagado com sucesso!');
                        window.location.href = '../index.html';
                  </script>";
      }
      else
      {
            echo "
                  <script>
                        alert('Erro ao apagar o utilizador. Tente novamente.');
                        window.history.back();
                  </script>";
      }

      mysqli_close($sql);
?>