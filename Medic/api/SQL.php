<?php

function console_log($output, $with_script_tags = true) {
  $js_code = 'console.log(' . json_encode($output, JSON_HEX_TAG) . 
');';
  if ($with_script_tags) {
      $js_code = '<script>' . $js_code . '</script>';
  }
  echo $output;
}

function httpPost($url, $data){
    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($data));
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($curl);
    curl_close($curl);
    return $response;
}

$servername = "localhost";
$username = "medic";
$password = "192837465";
$dbname = "cabinet";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}


console_log("Connected successfully");

// Check tables

$sql = "SHOW TABLES LIKE 'pacient';";
$result = mysqli_query($conn, $sql);
 
if(mysqli_num_rows($result) > 0) {
  console_log("exista pacient");
}
else {
  $sql = "CREATE TABLE pacient (nume varchar(20) not null,prenume varchar(20) not null, cnp varchar(12) not null, data_n date not null,istoric varchar(100) null, ID int not null AUTO_INCREMENT, PRIMARY KEY (ID));";
  if(mysqli_query($conn,$sql)){
    console_log("pacient creat");
  } else console_log("Eroare pacient " + mysqli_error($conn));
}


$sql = "SHOW TABLES LIKE 'doctor';";
$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result) > 0) {
  console_log("exista doctor");
}
else {
  $sql = "CREATE TABLE doctor (nume varchar(20) not null,prenume varchar(20) not null, cnp varchar(12) not null, data_n date not null,specializare varchar(30) null, ID int not null AUTO_INCREMENT, PRIMARY KEY (ID));";
  if(mysqli_query($conn,$sql)){
    console_log("doctor creat");
  } else console_log("Eroare doctor " + mysqli_error($conn));
}


$sql = "SHOW TABLES LIKE 'consultatii';";
$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result) > 0) {
  console_log("exista consultatii");
}
else {
  $sql = "CREATE TABLE consultatii (tip varchar(20) not null,ID_Doctor int not null, ID int not null AUTO_INCREMENT, PRIMARY KEY (ID), FOREIGN KEY (ID_Doctor) REFERENCES doctor(ID));";
  if(mysqli_query($conn,$sql)){
    console_log("consultatii creat");
  } else console_log("Eroare consultatii " + mysqli_error($conn));
}


$sql = "SHOW TABLES LIKE 'programari';";
$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result) > 0) {
  console_log("exista programari");
}
else {
  $sql = "CREATE TABLE programari (ID_Pacient int not null, data date not null,ID_Consultatie int not null, ID int not null AUTO_INCREMENT, PRIMARY KEY (ID),FOREIGN KEY (ID_Pacient) REFERENCES pacient(ID),FOREIGN KEY (ID_Consultatie) REFERENCES consultatii(ID));";
  if(mysqli_query($conn,$sql)){
    console_log("programari creat");
  } else console_log("Eroare programari " + mysqli_error($conn));
}
?>