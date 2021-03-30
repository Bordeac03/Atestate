<?php
require 'SQL.php';
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $_POST = json_decode(file_get_contents('php://input'), true);
    $sql = "INSERT INTO monitor(ID_student,ID_carte,data_predare) VALUES((SELECT ID FROM student WHERE cnp='".$_POST['cnp']."' AND nume='".$_POST['nume']."' AND prenume='".$_POST['prenume']."'),(SELECT ID FROM carti WHERE titlul='".$_POST['titlul']."'),'null');";
    $result = mysqli_query($conn, $sql);
}
?>