<?php
      include("../../../scripts/logindb.php");


      $nome = $_POST['Name'];
      $about = $_POST['About'];
      $birthdate = $_POST['birthDate'];

      //Tratamento da imagem
      function GetImageExtension($imagetype)
      {
            if (empty($imagetype)) return false;
            {
            switch($imagetype)
            {
                  case 'image/bmp': 
                        return '.bmp';

                  case 'image/gif': 
                        return '.gif';

                  case 'image/jpeg': 
                        return '.jpg';

                  case 'image/png': 
                        return '.png';
                        
                  default: 
                        return false;
            }
            }
      }

      $default_image = "Imagem.png";
      $target_path = $default_image;

      if (!empty($_FILES["FaceCard"]["name"]))
      {
            $file_name = $_FILES["FaceCard"]["name"];
            $temp_name = $_FILES["FaceCard"]["tmp_name"];
            $imgtype = $_FILES["FaceCard"]["type"];    
            $ext = GetImageExtension($imgtype);

            if ($ext === false) 
            {
                  echo("Formato de imagem inválido.");
                  exit();
            }

            $imagename = date("Y-m-d")."-".time().$ext;
            $target_path = $imagename;

            $upload_dir = "../../../imgs/imgs_saves/"; 

            if(!move_uploaded_file($temp_name, $upload_dir.$imagename))
            {
                  echo("Erro ao mover o arquivo.");
                  exit();
            }
      }

      // Verificar se o jogador já existe
      $comando = "SELECT * FROM players WHERE Name = '$nome'";
      $query = mysqli_query($sql, $comando);
      $num_rows = mysqli_num_rows($query);
      
      if($birthdate < "1900-01-01")
      {
            echo("Data de nascimento inválida. Verifique a data.");
            exit();
      }

      if ($num_rows == 0)
      {
            $comando = "INSERT INTO players (Name, Birth_date, About, Photo)
                  VALUES ('$nome', '$birthdate', '$about', '$target_path')";
                  
            $query = mysqli_query($sql, $comando);

            echo("ok");
            exit();
      }
      else
      {
            echo("Jogador já existe.");
      }
   
      mysqli_close($sql);
?>