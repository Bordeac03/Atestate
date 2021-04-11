<?php
$servername = "localhost";
$username = "secretariat";
$password = "advsecretariat";
$dbname = "secretariat";;

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
  die("Connection failed: ".mysqli_connect_error());
}

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $_POST = json_decode(file_get_contents('php://input'), true);
    $sql = "SELECT * FROM adeverinta WHERE ID_student=(SELECT ID FROM elev WHERE nume='".$_POST['nume']."' AND prenume='".$_POST['prenume']."' AND cnp = '".$_POST['cnp']."');";
    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) > 0) {
      $data = array();
      while($row = mysqli_fetch_assoc($result)) {
          $row['nume'] = $_POST['nume'];
          $row['prenume'] = $_POST['prenume'];
          $data[] = $row;
      }
      echo json_encode($data);    
  } else 
      echo "NULL";
}

mysqli_close($conn);
?>