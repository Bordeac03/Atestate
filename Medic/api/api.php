<?php
require 'SQL.php';

function getData($result, $sql, $TEST = false)
{
    if ($TEST)
        return $sql;
    if (mysqli_num_rows($result) > 0) {
        $data = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }
        return json_encode($data);
    }
    return "NULL";
}


$RETURN = "NULL";

($_SERVER['REQUEST_METHOD'] === 'POST') ? ($_POST = json_decode(file_get_contents('php://input'), true) and
    ($_POST['api'] == 'doctori') ? ($sql = "SELECT DISTINCT nume,prenume FROM doctor WHERE specializare='" . $_POST['specializare'] . "';" and
        $result = mysqli_query($conn, $sql) and
        $RETURN = getData($result, $sql)) : (
        ($_POST['api'] == 'specializari') ? ($sql = "SELECT DISTINCT specializare from doctor ;" and
            $result = mysqli_query($conn, $sql) and
            $RETURN = getData($result, $sql)) : (
            ($_POST['api'] == 'consultatii') ? ($sql = "SELECT tip FROM consultatii WHERE specializare='" . $_POST['specializare'] . "';" and
                $result = mysqli_query($conn, $sql) and
                $RETURN = getData($result, $sql)) : (
                ($_POST['api'] == 'pacient') ? ($sql = "SELECT * FROM pacient WHERE nume='" . $_POST['nume'] . "' AND prenume='" . $_POST['prenume'] . "' AND cnp='" . $_POST['cnp'] . "';" and
                    $result = mysqli_query($conn, $sql) and
                    $RETURN = getData($result, $sql)) : (
                    ($_POST['api'] == 'programari') ? ($sql = "SELECT * FROM programari WHERE ID_Pacient=(SELECT ID FROM pacient WHERE nume='" . $_POST['nume'] . "' AND prenume='" . $_POST['prenume'] . "' AND cnp='" . $_POST['cnp'] . "');" and
                        $result = mysqli_query($conn, $sql) and
                        $RETURN = getData($result, $sql,)) : (
                        ($_POST['api'] == 'adaugaPacient') ? ($sql = "INSERT INTO pacient(nume,prenume,cnp) VALUES('" . $_POST['nume'] . "','" . $_POST['prenume'] . "','" . $_POST['cnp'] . "');" and
                            $result = mysqli_query($conn, $sql)) : (
                            ($_POST['api'] == 'adaugaProgramare') ? ($sql = "INSERT INTO programari(ID_Pacient,ID_Doctor,data,ID_Consultatie) VALUES((SELECT ID FROM pacient WHERE nume='" . $_POST['nume'] . "' AND prenume='" . $_POST['prenume'] . "' AND cnp='" . $_POST['cnp'] . "'),(SELECT ID FROM doctor WHERE nume='" . $_POST['Dnume'] . "' AND prenume='" . $_POST['Dprenume'] . "' AND specializare='" . $_POST['specializare'] . "'),'" . $_POST['data'] . "',(SELECT ID FROM consultatii WHERE tip='" . $_POST['tip'] . "' AND specializare='" . $_POST['specializare'] . "'));" and
                                $result = mysqli_query($conn, $sql))  : (
                                ($_POST['api'] == 'istoric') ? ($sql = "UPDATE pacient SET istoric='" . $_POST['istoric'] . "' WHERE ID='" . $_POST['ID'] . "';" and
                                    $result = mysqli_query($conn, $sql)) : (NULL))))))))) : (NULL);


echo $RETURN;
mysqli_close($conn);
