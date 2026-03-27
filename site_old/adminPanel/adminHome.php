<?php
    session_start();
    if (!isset($_SESSION['Username'])) 
    {
        header('Location: ../utilizador/login.html');
        exit();
    }
    $username = htmlspecialchars($_SESSION['Username']);
?>

<div class="navbar">
    <img src="/scripts/Pap/imgs/LogoTipo.png">
    <hr>
    <h3>Jogadores</h3>
    <hr style="width:50%">
    <a href="/scripts/Pap/adminPanel/Players/PlayersPanel.php">- Gerenciar</a><br>
    <a href="/scripts/Pap/adminPanel/Players/PlayersPanel.php">- Adicionar</a><br>
    <a href="/scripts/Pap/adminPanel/Players/PlayersPanel.php">- Remover</a><br>
    <a href="/scripts/Pap/adminPanel/Players/PlayersPanel.php">- Consulta</a>
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
    <a href="/scripts/Pap/adminPanel/Misc/NewsPanel.php">- Noticias</a><br>
    <a href="/scripts/Pap/adminPanel/Misc/AdminCreate.php">- Create Admin Account</a><br>
    <a href="/scripts/Pap/home.php">- Go To Main Page</a>
    <hr>
    <p>Bem-vindo, <?php echo $username; ?></p>
</div>