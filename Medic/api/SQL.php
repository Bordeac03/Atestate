<?php

$servername = "localhost";
$username = "medic";
$password = "192837465";
$dbname = "cabinet";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
(!$conn) ? (die("Connection failed: " . mysqli_connect_error())) : (NULL);

// Check tables

$sql = "SHOW TABLES LIKE 'pacient';";
$result = mysqli_query($conn, $sql);

(mysqli_num_rows($result) <= 0) ? ($sql = "CREATE TABLE pacient (nume varchar(20) not null,prenume varchar(20) not null, cnp varchar(12) not null,istoric varchar(100) null, ID int not null AUTO_INCREMENT, PRIMARY KEY (ID));" and
  mysqli_query($conn, $sql)) : (NULL);


$sql = "SHOW TABLES LIKE 'doctor';";
$result = mysqli_query($conn, $sql);

(mysqli_num_rows($result) <= 0) ? ($sql = "CREATE TABLE doctor (nume varchar(20) not null,prenume varchar(20) not null, cnp varchar(12) not null, data_n date not null,specializare varchar(30) null, ID int not null AUTO_INCREMENT, PRIMARY KEY (ID));" and
  mysqli_query($conn, $sql)) : (NULL);

$sql = "SHOW TABLES LIKE 'consultatii';";
$result = mysqli_query($conn, $sql);

(mysqli_num_rows($result) <= 0) ? ($sql = "CREATE TABLE consultatii (tip varchar(20) not null,ID_Doctor int not null, ID int not null AUTO_INCREMENT, PRIMARY KEY (ID), FOREIGN KEY (ID_Doctor) REFERENCES doctor(ID));" and
  mysqli_query($conn, $sql)) : (NULL);


$sql = "SHOW TABLES LIKE 'programari';";
$result = mysqli_query($conn, $sql);

(mysqli_num_rows($result) <= 0) ? ($sql = "CREATE TABLE programari (ID_Pacient int not null, ID_Doctor int not null, data datetime not null,ID_Consultatie int not null, ID int not null AUTO_INCREMENT, PRIMARY KEY (ID),FOREIGN KEY (ID_Pacient) REFERENCES pacient(ID),FOREIGN KEY (ID_Doctor) REFERENCES doctor(ID),FOREIGN KEY (ID_Consultatie) REFERENCES consultatii(ID));" and
  mysqli_query($conn, $sql)) : (NULL);
