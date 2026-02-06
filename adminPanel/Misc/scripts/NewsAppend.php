<?php
      include("../../../scripts/logindb.php");


      $Title = $_POST['Title'];
      $Description = $_POST['Description'];
      $DateOfCreation = $_POST['DateOfCreation'];    
      $Image = $_POST['Image'];

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


      $pass_hashed = password_hash($pass, PASSWORD_BCRYPT); 

      
      if ($num_rows == 0)
      {
            $comando = "INSERT INTO players (Name, Birth_date, About, Photo)
                  VALUES ('$Title', '$Description', '$DateOfCreation', 'Imagem.png')";
                  
            $query = mysqli_query($sql, $comando);

            echo(
                  "<script>
                        window.history.back();
                  </script>"
            );
            exit();
      }
      else
      {
            echo(
                  "<script>
                        alert('Erro'); 
                        window.history.back();
                  </script>"
            );
      }
   
      mysqli_close($sql);
?>