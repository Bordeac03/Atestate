<?php
$servername = "localhost";
$username = "agenda";
$password = "agendaenv";
$dbname = "agenda";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
  die("Connection failed: ".mysqli_connect_error());
}

if($_SERVER['REQUEST_METHOD'] === 'GET') {
    $sql = "SELECT * from eveniment;";
    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) > 0) {
      $data = array();
      while($row = mysqli_fetch_assoc($result)) {
          $data[] = $row;
      }
      echo json_encode($data);    
  } else 
      echo "NULL";
}

mysqli_close($conn);
?>