<?php
      include("../scripts/logindb.php");

      $id = (int)$_GET['id'];

      $query = "SELECT * FROM players WHERE id = '$id'";
      $result = mysqli_query($sql, $query);

      if($row = mysqli_fetch_assoc($result)) 
      {
            echo json_encode($row);
      }
?>