<?php 
define ('__POS__',str_repeat('../',substr_count(dirname(__FILE__),'\\')-substr_count('C:\xampp\htdocs\Milestone2SPARTA\working-folder','\\')));
include "../../assets/includes/functions.php"; 
include "../../assets/includes/connection.php";
?>
<?php

$sess = new Session;

$user = new Users;
$userData = $user->getUserData($_SESSION['loggedInId']);

if (($userData['user_auth'] != 0)or(!isset($_SESSION['loggedInId']))) {
	unset($sess->name);
    header("Location: "."../../login");
}
?>
<?php 

if (isset($_POST['submit_newpo'])) {


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