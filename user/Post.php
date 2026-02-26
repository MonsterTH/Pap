<?php
      include("../scripts/logindb.php");
      session_start();

      $Email = htmlspecialchars($_SESSION['Email']);
      $Content = $_POST['Content'];  

      //---------------------------------------------------

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

            $imagename = date("Y-m-d")."-".time().$ext;
            $target_path = $imagename;

            $upload_dir = "../imgs/imgs_saves/"; 

            if(!move_uploaded_file($temp_name, $upload_dir.$imagename))
            {
                  echo("Erro ao mover o arquivo.");
                  exit();
            }
      }

      //---------------------------------------------------
      
      //verifica se já existe o utilizador

      $Date = date("Y-m-d");
            $comando = "INSERT INTO posts (Email_User, Content, Image, Date)
                  VALUES ('$Email', '$Content', '$target_path', '$Date')";
                  
            $query = mysqli_query($sql, $comando);

            echo "ok";

      mysqli_close($sql);
?>