<?php
$servername = "localhost";
$username = "firma";
$password = "firma2002";
$dbname = "firma";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
  die("Connection failed: ".mysqli_connect_error());
}

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $DATA = json_decode(file_get_contents('php://input'), true);
    $sql = "SELECT * FROM salariat WHERE Nume='".$DATA['nume']."' AND Prenume='".$DATA['prenume']."';";
    if($DATA['nume'] == "ALL" && $DATA['prenume'] == "ALL")
        $sql = "SELECT * FROM salariat";
    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) > 0) {
        $all = array();
        while($row = mysqli_fetch_assoc($result)) {
            $all[] = $row;
        }
        echo json_encode($all);    
    } else 
        echo "NULL";
    }
