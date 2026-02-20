<?php
      include("../scripts/logindb.php");


      $nome = $_POST['nome'];
      $email = $_POST['email'];
      $pass = $_POST['pass'];    
      $rep_pass = $_POST['pass_rep'];

      if ($pass !== $rep_pass) {
            echo "As senhas não coincidem";
            exit();
      }

      $pass_hashed = password_hash($pass, PASSWORD_BCRYPT); 

      
      //verifica se já existe o utilizador
      $comando = "SELECT * FROM users WHERE Email = '$email' 
      UNION ALL
      SELECT * FROM administrador WHERE Email = '$email'";
      $query = mysqli_query($sql, $comando);
      $num_rows = mysqli_num_rows($query);

      //se não existir, insere na base de dados
      if ($num_rows == 0)
      {
            $Date = date("Y-m-d");
            $comando = "INSERT INTO users (Username, Email, Password, Creation, Photo)
                  VALUES ('$nome', '$email', '$pass_hashed', '$Date', 'Imagem.png')";
                  
            $query = mysqli_query($sql, $comando);

            echo "ok";

            exit();
      }
      else
      {
            echo $msg = "Já existe um utilizador com este email.";
            exit();
      }
   
      mysqli_close($sql);
?>