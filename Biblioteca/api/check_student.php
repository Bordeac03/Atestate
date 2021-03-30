<?php
require 'SQL.php';
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $_POST = json_decode(file_get_contents('php://input'), true);
    $sql = "SELECT * FROM student WHERE cnp='".$_POST['cnp']."' AND nume='".$_POST['nume']."' AND prenume='".$_POST['prenume']."';";
    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) > 0) {
        echo "OLD";
    } else 
        echo "NEW";
    }
?>