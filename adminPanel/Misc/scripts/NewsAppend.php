<?php
      include("../../../scripts/logindb.php");


      $Title = $_POST['Title'];
      $Description = $_POST['Description'];
      $DateOfCreation = $_POST['DateOfCreation'];
      $Genre = $_POST['Cat'];
      //$Image = $_POST['Image'];

      //Tratamento do resto
      /*if($pass != $rep_pass)
      {
            echo(
                  "<script>
                        alert('As senhas não coincidem.');
                        window.history.back();
                  </script>"
            );
            exit();
      }*/

      
            $comando = "INSERT INTO news (Title, Description, Date, Image, Genre)
                  VALUES ('$Title', '$Description', '$DateOfCreation', 'Image.png', '$Genre')";
                  
            $query = mysqli_query($sql, $comando);

            echo(
                  "<script>
                        window.history.back();
                  </script>"
            );
      mysqli_close($sql);
?>