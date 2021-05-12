<?php
$servername = "localhost";
$username = "firma";
$password = "firma2002";
$dbname = "firma";


$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $_POST = json_decode(file_get_contents('php://input'), true);
  $sql = "INSERT INTO salariat(Nume,Prenume,CNP,Data_Nasterii,`Salariu(Euro)`,Specializare) VALUES('" . $_POST['nume'] . "','" . $_POST['prenume'] . "','" . $_POST['cnp'] . "','" . $_POST['datan'] . "','" . $_POST['salariu'] . "','" . $_POST['functie'] . "');";
  $result = mysqli_query($conn, $sql);
  echo $sql;
}
