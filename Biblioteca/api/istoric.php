<?php
require 'SQL.php';
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $_POST = json_decode(file_get_contents('php://input'), true);
    $sql = "SELECT * FROM student WHERE cnp='".$_POST['cnp']."' AND nume='".$_POST['nume']."' AND prenume='".$_POST['prenume']."';";
    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $sql = "SELECT student.nume,student.prenume,carti.titlul,carti.autor,monitor.data_primire,monitor.data_predare FROM monitor INNER JOIN student ON (student.ID=monitor.ID_student) INNER JOIN carti on (monitor.ID_carte=carti.ID) WHERE monitor.ID_student=". $row['ID'].";";
        $result = mysqli_query($conn, $sql);
        $rows = array();
        if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
                $rows[] = $row;
            }
            echo json_encode($rows);
          }

    } else {
        $sql = "INSERT INTO student (nume,prenume,cnp) VALUES('".$_POST['nume']."','".$_POST['prenume']."','".$_POST['cnp']."');";
        if(!mysqli_query($conn,$sql))
            console_log("Eroare student ".mysqli_error($conn));
    }
}
?>