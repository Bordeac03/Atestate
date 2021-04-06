<?php
$servername = "localhost";
$username = "agenda";
$password = "agendaenv";
$dbname = "agenda";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
  die("Connection failed: ".mysqli_connect_error());
}

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $DATA = json_decode(file_get_contents('php://input'), true);
    $sql = "INSERT INTO eveniment(nume,locatie,data,detalii,nume_org,prenume_org,cnp_org) VALUES ('".$DATA['nume']."','".$DATA['locatie']."','".$DATA['data']."','".$DATA['detalii']."','".$DATA['nume_org']."','".$DATA['prenume_org']."','".$DATA['cnp']."');";
    $result = mysqli_query($conn, $sql);
   
}

mysqli_close($conn);
?>