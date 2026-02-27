<?php
include("../../scripts/logindb.php");

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

$query = "SELECT * FROM posts WHERE Id = $id";
$result = mysqli_query($sql, $query);

if ($row = mysqli_fetch_assoc($result)) {
    echo json_encode($row);
} else {
    echo json_encode(["error" => "Post not found"]);
}
?>