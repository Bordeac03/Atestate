<?php

function console_log($output, $with_script_tags = true) {
  $js_code = 'console.log(' . json_encode($output, JSON_HEX_TAG) . 
'\n);';
  if ($with_script_tags) {
      $js_code = '<script>' . $js_code . '</script>';
  }
  echo $output;
}

function alert_log($output, $with_script_tags = true) {
  $js_code = 'alert(' . json_encode($output, JSON_HEX_TAG) . 
'\n);';
  if ($with_script_tags) {
      $js_code = '<script>' . $js_code . '</script>';
  }
  echo $output;
}


$servername = "localhost";
$username = "biblioteca";
$password = "biblioteca2021";
$dbname = "biblioteca";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
  die("Connection failed: ".mysqli_connect_error());
}

// Check tables

$sql = "SHOW TABLES LIKE 'carti';";
$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result) <= 0) {
  $sql = "CREATE TABLE carti (titlul varchar(100) not null,autor varchar(50) not null, categorie varchar(12) not null, anul_publicarii year not null, ID int not null AUTO_INCREMENT, PRIMARY KEY (ID));";
  if(!mysqli_query($conn,$sql))
      console_log("Eroare carti ".mysqli_error($conn));
}


$sql = "SHOW TABLES LIKE 'student';";
$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result) <= 0) {
  $sql = "CREATE TABLE student (nume varchar(20) not null,prenume varchar(20) not null, cnp varchar(13) not null, ID int not null AUTO_INCREMENT, PRIMARY KEY (ID));";
  if(!mysqli_query($conn,$sql))
     console_log("Eroare student ".mysqli_error($conn));
}


$sql = "SHOW TABLES LIKE 'monitor';";
$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result) <= 0) {
  $sql = "CREATE TABLE monitor (ID_student int not null,ID_carte int not null, data_primire date not null, data_predare date not null, activ boolean not null , ID int not null AUTO_INCREMENT, PRIMARY KEY (ID), FOREIGN KEY (ID_student) REFERENCES student(ID),FOREIGN KEY (ID_carte) REFERENCES carti(ID));";
  if(!mysqli_query($conn,$sql))
      console_log("Eroare monitor " + mysqli_error($conn));
}

?>