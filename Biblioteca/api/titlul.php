<?php
require 'SQL.php';
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $_POST = json_decode(file_get_contents('php://input'), true);
    if($_POST['autor'] != "ALL" && $_POST['categorie'] != "ALL")
        $sql = "SELECT titlul FROM carti WHERE autor ='".$_POST['autor']."' AND categorie = '".$_POST['categorie']."';";
    if ($_POST['autor'] == "ALL" && $_POST['categorie'] != "ALL")
        $sql = "SELECT titlul FROM carti WHERE categorie = '".$_POST['categorie']."';";
    if ($_POST['autor'] != "ALL" && $_POST['categorie'] == "ALL")
        $sql = "SELECT titlul FROM carti WHERE autor = '".$_POST['autor']."';";
    if ($_POST['autor'] == "ALL" && $_POST['categorie'] == "ALL")
        $sql = "SELECT titlul FROM carti;";
    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) > 0) {
        $rows = array();
        while($row = mysqli_fetch_assoc($result)) {
            $rows[] = $row;
        }
        echo json_encode($rows);
    } else echo "";
}
?>