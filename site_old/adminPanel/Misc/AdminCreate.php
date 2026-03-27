<html>

<head>
    <title>Admin Panel - Identity Fraud</title>
      <meta charset="UTF-8">
      <link rel="stylesheet" href="../Admin.css">    
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

<body>
<?php include("../adminHome.php"); ?>
    <div class="admininfo">
        <fieldset>
        <form action="AdminRegister.php" method="POST">
                <h2>Registo</h2>  

                <div>
                    <input type="text" class="inputtext" id="nome" name="nome" maxlength="30" placeholder="Nome" required>
                </div>

                <div>
                    <input type="email" class="inputtext" id="email" name="email" maxlength="30" placeholder="Email" required>
                </div>

                <div>
                    <input type="password" class="inputtext" id="pass" name="pass" minlength="5" maxlength="20" placeholder="Palavra-passe" required>
                </div>

                <div>
                    <input type="password" class="inputtext" id="pass_rep" name="pass_rep" minlength="5" maxlength="20" placeholder="Confirme Palavra-passe" required><br>
                </div>

                <span id="erro"></span><br>

                <div>
                    <button class="actionbutton2" onclick="erro_pass(event)">Registar</button>
                </div>
</form>
            </fieldset>
    </div>
</div>
</body>

</html>