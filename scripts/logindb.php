<?php
      $host = "localhost";
      $user = "root";
      $pass = "mysql";
      $db = "base_show";

      $sql = new mysqli($host, $user, $pass, $db);
      if (!$sql)
      {
            die ("Não ligou a base de dados.");
      }
?>