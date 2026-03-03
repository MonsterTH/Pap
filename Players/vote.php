<?php
      include("../scripts/logindb.php");
      session_start();

      //Verificar se o utilizador está autenticado (caso ele entra na página manualmente)
      if (!isset($_SESSION['Email'])) { 
            echo("Precisa de estar autenticado.");
            exit();
      }

      $comando = "SELECT * FROM administrador WHERE Email = '".$_SESSION['Email']."'";
      $query = mysqli_query($sql, $comando);
      $num_rows = mysqli_num_rows($query);

      if ($num_rows == 1) 
      {
            echo("Administradores não podem votar.");
            exit();
      }

      if (!isset($_POST['playerId'])) 
      {
            echo("Jogador inválido.");
            exit();
      }

      $comando = "INSERT INTO evictions (Id_player, Email_user) 
      VALUES ('".$_POST['playerId']."', '".$_SESSION['Email']."')";
      $query = mysqli_query($sql, $comando);

      echo("ok");
      exit();
?>