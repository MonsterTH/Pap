<?php
      include("../scripts/logindb.php");


      $nome = $_POST['nome'];
      $email = $_POST['email'];
      $pass = $_POST['pass'];    
      $rep_pass = $_POST['pass_rep'];

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
            $comando = "INSERT INTO users (Username, Email, Password)
                  VALUES ('$nome', '$email', '$pass_hashed')";
                  
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





?>