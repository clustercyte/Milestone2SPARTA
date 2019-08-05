<?php 

if (isset($_POST['submit_newpo'])) {

    include "../../assets/includes/functions.php"; 
    require_once("../../assets/includes/connection.php");

    $po_name = $_POST['po_name'];
    $po_closed = $_POST['po_closed'];

    $query = "UPDATE systems SET po_name = ?, po_closed = ?, po_status = ? WHERE sys_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ssii", $name_query, $closed_query, $status_query, $id_query);
    $name_query = $po_name;
    $closed_query = $po_closed;
    $status_query = 1;
    $id_query = 1;
    $stmt->execute();
    $stmt->close();

    header("Location: index.php");
}

?>