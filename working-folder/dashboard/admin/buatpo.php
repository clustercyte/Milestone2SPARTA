<?php 

if (isset($_POST['submit_buatpo'])) {

    include "../assets/includes/functions.php"; 
    require_once("../assets/includes/connection.php");

    $query = "UPDATE systems SET po_status = 1 WHERE sys_id = 1";
    mysqli_query($conn, $query);
    header("Location: index.php");
}

?>