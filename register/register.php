<?php
      include("../scripts/logindb.php");


      $user = $_POST['user'];
      $email = $_POST['email'];
      $pass = $_POST['pass'];    
      $rep_pass = $_POST['pass_rep'];

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

      $default_image = "default.png";
      $target_path = $default_image;

      if (!empty($_FILES["nome_imagem"]["name"]))
      {
            $file_name = $_FILES["nome_imagem"]["name"];
            $temp_name = $_FILES["nome_imagem"]["tmp_name"];
            $imgtype = $_FILES["nome_imagem"]["type"];    
            $ext = GetImageExtension($imgtype);
            $imagename = date("d-m-Y")."-".time().$ext;
            $target_path = $imagename;

            $upload_dir = "../../html/utilizador/imagens/"; 
            if(!move_uploaded_file($temp_name, $upload_dir.$imagename))
            {
                  die("Erro ao mover o arquivo.");
            }
      }


      //Tratamento do resto
      if($pass != $rep_pass)
      {
            echo(
                  "<script>
                        alert('As senhas não coincidem.');
                        window.history.back();
                  </script>"
            );
            exit();
      }


      $pass_hashed = password_hash($pass, PASSWORD_BCRYPT); 

      
      //verifica se já existe o utilizador
      $comando = "SELECT * FROM users WHERE Email = '$email'";
      $query = mysqli_query($sql, $comando);
      $num_rows = mysqli_num_rows($query);

      //se não existir, insere na base de dados
      if ($num_rows == 0)
      {
            $comando = "INSERT INTO users (Username, Email, Password, Photo)
                  VALUES ('$user', '$email', '$pass_hashed', '$target_path')";
                  
            $query = mysqli_query($sql, $comando);

            echo(
                  "<script>
                        alert('Utilizador registado com sucesso!');
                        window.location.href = '../login/login.html';
                        
                  </script>"
            );
            exit();
      }
      else
      {
            echo(
                  "<script>
                        alert('Email já registrado. Escolha outro.'); 
                        window.history.back();
                        
                  </script>"
            );
      }
   
      mysqli_close($sql);
?>