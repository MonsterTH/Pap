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
      $comando = "SELECT * FROM users WHERE Email = '$email'";
      $query = mysqli_query($sql, $comando);
      $num_rows = mysqli_num_rows($query);

      //se não existir, insere na base de dados
      if ($num_rows == 0)
      {
            $comando = "INSERT INTO users (Username, Email, Password)
                  VALUES ('$nome', '$email', '$pass_hashed')";
                  
            $query = mysqli_query($sql, $comando);

            echo "ok";

            exit();
      }
      else
      {
            echo $msg = "Já existe um utilizador com este email.";
      }
   
      mysqli_close($sql);
?>