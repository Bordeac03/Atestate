<?php
$servername = "localhost";
$username = "secretariat";
$password = "advsecretariat";
$dbname = "secretariat";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
  die("Connection failed: ".mysqli_connect_error());
}

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $_POST = json_decode(file_get_contents('php://input'), true);
    $sql = "INSERT INTO elev (nume,prenume,cnp) (SELECT '".$_POST['nume']."','".$_POST['prenume']."','".$_POST['cnp']."' FROM DUAL WHERE NOT EXISTS(SELECT * FROM elev WHERE nume='".$_POST['nume']."' AND prenume='".$_POST['prenume']."' AND cnp = '".$_POST['cnp']."'));";
    $result = mysqli_query($conn, $sql);
    echo $result;
    $sql = "INSERT INTO adeverinta(data,ID_student,link) VALUES('".$_POST['data']."',(SELECT ID FROM elev WHERE nume='".$_POST['nume']."' AND prenume='".$_POST['prenume']."' AND cnp = '".$_POST['cnp']."'),'".$_POST['link']."');";
    $result = mysqli_query($conn, $sql);
}

mysqli_close($conn);
?>