<?php
require 'SQL.php';
if($_SERVER['REQUEST_METHOD'] === 'GET'){
    $sql = "SELECT DISTINCT autor FROM carti;";
    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) > 0) {
        $rows = array();
        while($row = mysqli_fetch_assoc($result)) {
            $rows[] = $row;
        }
        echo json_encode($rows);
    } else echo "EROARE";
}
?>