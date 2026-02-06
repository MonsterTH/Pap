<html>

<head>
    <title>Admin Panel - Identity Fraud</title>
      <meta charset="UTF-8">
      <link rel="stylesheet" href="Admin.css">    
      <link href="https://fonts.googleapis.com/css2?family=EB+Garamond:ital,wght@0,400..800;1,400..800&family=Oxygen:wght@300;400;700&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
      <?php
            session_start();
            if (!isset($_SESSION['Username'])) {
            header('Location: ../utilizador/login.html');
            exit();
            }
            $username = htmlspecialchars($_SESSION['Username']);
      ?>
</head>

<div class="navbar">
    <img src="../imgs/LogoTipo.png">
    <hr>
    <h3>Jogadores</h3>
    <hr style="width:50%">
    <a href="Players/PlayersPanel.php">- Gerenciar</a><br>
    <a href="Players/PlayersPanel.php">- Adicionar</a><br>
    <a href="Players/PlayersPanel.php">- Remover</a><br>
    <a href="Players/PlayersPanel.php">- Consulta</a>
    <hr>
    <h3>Eventos</h3>
    <hr style="width:50%">
    <a href="#">- Votações</a><br>
    <a href="#">- Atividades</a><br>
    <a href="#">- Bounty's</a><br>
    <a href="#">- Seasons</a>
    <hr>
    <h3>Misc</h3>
    <hr style="width:50%">
    <a href="#">- Historico de Seasons</a><br>
    <a href="#">- Noticias</a><br>
    <a href="Misc/AdminCreate.php">- Create Admin Account</a><br>
    <a href="../home.php">- Go To Main Page</a>
    <hr>
    <p>Bem-vindo, <?php echo $username; ?></p>
</div>

</html>