<?php
require 'SQL.php';
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $_POST = json_decode(file_get_contents('php://input'), true);
    $sql = "INSERT INTO carti(titlul,autor,categorie,anul_publicarii) VALUES('".$_POST['titlul']."','".$_POST['autor']."','".$_POST['categorie']."','".$_POST['an']."');";
    $result = mysqli_query($conn, $sql);
}
?>