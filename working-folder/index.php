<?php 

include "assets/includes/functions.php"; 

session_start();

$user = new Users;
$userData = $user->getUserData($_SESSION['loggedInId']);

if ($userData['user_id'] == 0) {
    header("Location: dashboard/admin/");
} else {
    header("Location: dashboard/customer/");
}

?>