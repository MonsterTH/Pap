<?php
      include("../../../scripts/logindb.php");


      $Title = $_POST['Title'];
      $Description = $_POST['Description'];
      $DateOfCreation = $_POST['DateOfCreation'];
      $Genre = $_POST['Cat'];

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

      if (!empty($_FILES["Image"]["name"]))
      {
            $file_name = $_FILES["Image"]["name"];
            $temp_name = $_FILES["Image"]["tmp_name"];
            $imgtype = $_FILES["Image"]["type"];    
            $ext = GetImageExtension($imgtype);

            if ($ext === false) 
            {
                  echo "Formato de imagem inválido.";
                  exit();
            }

            $imagename = date("Y-m-d")."-".time().$ext;
            $target_path = $imagename;

            $upload_dir = "../../../imgs/imgs_saves/"; 

            if(!move_uploaded_file($temp_name, $upload_dir.$imagename))
            {
                  echo "Erro ao mover o arquivo.";
                  exit();
            }
      }
      
      $comando = "INSERT INTO news (Title, Description, Date, Image, Genre)
            VALUES ('$Title', '$Description', '$DateOfCreation', '$target_path', '$Genre')";
            
      $query = mysqli_query($sql, $comando);

      echo "ok";

      mysqli_close($sql);
?>