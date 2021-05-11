<?php
$servername = "localhost";
$username = "firma";
$password = "12345";
$dbname = "firma";


$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $_POST = json_decode(file_get_contents('php://input'), true);
  $sql = "DELETE FROM angajat WHERE ID=" . $_POST['ID'] . ";";
  $result = mysqli_query($conn, $sql);
}
