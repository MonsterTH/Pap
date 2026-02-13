<html>

<head>
    <title>Admin Panel - Identity Fraud</title>
      <meta charset="UTF-8">
      <link rel="stylesheet" href="../Admin.css">    
      <link href="https://fonts.googleapis.com/css2?family=EB+Garamond:ital,wght@0,400..800;1,400..800&family=Oxygen:wght@300;400;700&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    </head>

<body>
    <?php include("../adminHome.php"); ?>
    <div class="admininfo">
        <h1>Add Player</h1>
        <form action="scripts/PlayerRegister.php" method="POST" enctype="multipart/form-data" style="height: auto;">
      <h5>
        <p>
          <input type="text" name="Name" class="inputtext" size="50" max="20" placeholder="Name" required> | <input type="date" name="birthDate" class="inputtext" style="width: 150px" required><br>
        </p>
        <p>
        <input type="text" name="About" size="50" class="inputtext" max="500" placeholder="About" required> |  <label for="file-upload" class="custom-file-upload"> <i class="fa fa-cloud-upload"></i> Add FaceCard</label><input id="file-upload" type="file" name="FaceCard"/>
        </p>
       <input class="actionbutton" type="submit" value="Add">
      </h5>
    </form>
    <hr>
    <h1>Consulta</h1>
    <div style="overflow-y: scroll; height:200px;">
    <?php
    include("../../scripts/logindb.php");
    $Query="select * from players";
            $List=mysqli_query($sql,$Query);
            $NumReg=mysqli_num_rows($List);
            If ($NumReg==0)
            {
            echo "<script>alert('Não existem registos para listar')
            window.location.href = 'Estagiario.html';";exit;
            }
            
            echo'<table><br>
            <tr style="height:50px; color:#dd84b6;">
                <th style="height: 50px;">Photo</th>
                <th style="height: 50px;">Id</th>
                <th style="height: 50px;">Name</th>
                <th style="height: 50px;">Birth_date</th>
                <th style="height: 50px;">About</th>
            </tr>';
            For($i=0;$i<$NumReg;$i++) //Passar registo linha a linha
            {
            $Registo=mysqli_fetch_array($List);
            echo'<tr style="height=50px">
            <td style="height: 50px;">'.$Registo['Photo'].'</td>
                <td style="height: 50px;">'.$Registo['Id'].'</td>
                <td style="height: 50px;">'.$Registo['Name'].'</td>
                <td style="height: 50px;">'.$Registo['Birth_date'].'</td>
                <td style="height: 50px; max-width:100px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis">'.$Registo['About'].'</td>
                <td style="height: 50px;">'.'<button class="apagarcontent";>Apagar'.'</td>
                <td style="height: 50px;">'.'<button class="editarcontent";>Editar'.'</td>
            </tr>';
            }
            echo'</table>';
    ?>
    </div>
</div>
</body>

</html>