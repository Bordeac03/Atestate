<?php
require '../SQL.php';
$data = json_decode(file_get_contents('php://input'), true);
$sql = "SELECT * FROM pacient WHERE nume=" + $data['Nume'] + ", prenume=" + $data['Prenume'] + ", cnp=" + $data['Cnp'] + ";";
/*$result = mysqli_query($conn, $sql);
if(mysqli_num_rows($result) > 0) {
    console_log("exista pacient");
  }*/
?>