<?php
require 'SQL.php';

function getData($result){
    if(mysqli_num_rows($result) > 0) {
        $data = array();
        while($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }
        return json_encode($data);
    }
    return "NULL";
}


$RETURN = "NULL";

($_SERVER['REQUEST_METHOD'] === 'POST') ? (
    $_POST = json_decode(file_get_contents('php://input'), true) AND
    ($_POST['api'] == 'doctori') ? (
        $sql = "SELECT nume,prenume FROM doctor WHERE specializare='".$_POST['specializare']."' DISTINCT;" AND
        $result = mysqli_query($conn, $sql) AND
        $RETURN = getData($result) 
    ) : (($_POST['api'] == 'specializari') ? (
        $sql = "SELECT specializare from doctor DISTINCT;" AND
        $result = mysqli_query($conn, $sql) AND
        $RETURN = getData($result) 
    ) : (($_POST['api'] == 'consultatii') ? (
        $sql = "SELECT tip FROM doctor WHERE pecializare='".$_POST['specializare']."';" AND
        $result = mysqli_query($conn, $sql) AND
        $RETURN = getData($result) 
    ) : (($_POST['api'] == 'pacient') ? (
        $sql = "SELECT * FROM pacient WHERE nume='".$_POST['nume']."' AND prenume='".$_POST['prenume']."' AND cnp='".$_POST['cnp']."';" AND
        $result = mysqli_query($conn, $sql) AND
        $RETURN = getData($result) 
    ) : (($_POST['api'] == 'programari') ? (
        $sql = "SELECT * FROM programari WHERE ID_Pacient=(SELECT ID FROM pacient WHERE nume='".$_POST['nume']."' AND prenume='".$_POST['prenume']."' AND cnp='".$_POST['cnp']."');" AND
        $result = mysqli_query($conn, $sql) AND
        $RETURN = getData($result) 
    ) : (($_POST['api'] == 'adaugaPacient') ? (
        $sql = "INSERT INTO pacient(nume,prenume,cnp,data_n,istoric) VALUES('".$_POST['nume']."','".$_POST['prenume']."','".$_POST['cnp']."','".$_POST['data_n']."','');" AND
        $result = mysqli_query($conn, $sql)
    ) : (($_POST['api'] == 'adaugaProgramare') ? (
        $sql = "INSERT INTO programari(ID_Pacient,data,ID_Consulatatie) VALUES((SELECT ID FROM pacient WHERE nume='".$_POST['nume']."' AND prenume='".$_POST['prenume']."' AND cnp='".$_POST['cnp']."'),'".$_POST['data']."',(SELECT ID FROM consultatii WHERE tip='".$_POST['tip']."' AND specializare='".$_POST['specializare']."'));" AND
        $result = mysqli_query($conn, $sql)
    ) : (($_POST['api'] == 'istoric') ? (
        $sql = "UPDATE pacient SET istoric='".$_POST['istoric']."' WHERE ID='".$_POST['ID']."';" AND
        $result = mysqli_query($conn, $sql)
    ) : (NULL)))))))) 
) : (NULL);

mysqli_close($conn);
?>