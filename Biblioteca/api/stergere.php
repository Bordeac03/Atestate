<?php
require 'SQL.php';
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $_POST = json_decode(file_get_contents('php://input'), true);
    $sql = "DELETE FROM carti WHERE ID=".$_POST['ID'].";";
    $result = mysqli_query($conn, $sql);
}
?>