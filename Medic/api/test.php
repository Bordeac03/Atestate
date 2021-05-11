<?php
require 'SQL.php';

$_POST = json_decode(file_get_contents('php://input'), true);
echo $_POST['api'];
if ($_POST['api'] == 'adaugaProgramare') {
    $sql = "INSERT INTO programari(ID_Pacient,ID_Doctor,data,ID_Consultatie) VALUES((SELECT ID FROM pacient WHERE nume='" . $_POST['nume'] . "' AND prenume='" . $_POST['prenume'] . "' AND cnp='" . $_POST['cnp'] . "'),(SELECT ID FROM doctor WHERE nume='" . $_POST['Dnume'] . "' AND prenume='" . $_POST['Dprenume'] . "' AND specializare='" . $_POST['specializare'] . "'),'" . $_POST['data'] . "',(SELECT ID FROM consultatii WHERE tip='" . $_POST['tip'] . "' AND specializare='" . $_POST['specializare'] . "'));";
    echo $sql;
    $result = mysqli_query($conn, $sql);
}

mysqli_close($conn);
