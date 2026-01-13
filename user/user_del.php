<?php
      session_start();
      include("../scripts/logindb.php");


      $username_form = $_POST["user"];
      $password_form = $_POST["pass"];

      $username_session = $_SESSION['Username'];


      if ($username_form !== $username_session) 
            {
      echo "
            <script>
                  alert('O username não corresponde ao da sessão!');
                  window.history.back();
            </script>";
            exit();
      }


      $query = "SELECT Password FROM users WHERE Username = '$username_session'";
      $result = mysqli_query($sql, $query);
      $user = mysqli_fetch_assoc($result);


      if (!$user) 
      {
            echo "
                  <script>
                        alert('Utilizador não encontrado.');
                        window.history.back();
                  </script>";
            exit();
      }

 
      if (!password_verify($password_form, $user["Password"])) 
      {
            echo "
                        <script>
                              alert('Password incorreta!');
                              window.history.back();
                        </script>
                  ";
                  exit();
      }


      $delete = "DELETE FROM users WHERE Username = '$username_session'";
      $result_delete = mysqli_query($sql, $delete);

      if ($result_delete)
      {
            session_unset();
            session_destroy();

            echo "
                  <script>
                        alert('Utilizador apagado com sucesso!');
                        window.location.href = '../../html/utilizador/login.html';
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