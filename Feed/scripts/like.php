<?php
 session_start();
 $UserId = $_SESSION['Email'];

    include("../../scripts/logindb.php");

    $PostId  = $_POST['PostId'];

    $comando = "SELECT * FROM post_likes WHERE Id_Post = '$PostId' and Email_User = '$UserId' ";
    $query = mysqli_query($sql, $comando);
    $num_rows = mysqli_num_rows($query);

    if ($num_rows >= 1)
        {
             $comando = "DELETE FROM post_likes WHERE Id_Post = '$PostId' and Email_User = '$UserId'";
             $query = mysqli_query($sql, $comando);
        }
    else{
        $comando = "INSERT INTO post_likes (Id_Post, Email_User)
                  VALUES ('$PostId', '$UserId')";
                  $query = mysqli_query($sql, $comando);
    }

    $comando = "SELECT COUNT(*) as total 
            FROM post_likes 
            WHERE Id_Post = '$PostId'";

    $query = mysqli_query($sql, $comando);
    $row = mysqli_fetch_assoc($query);

    echo $row['total'];
?>  

