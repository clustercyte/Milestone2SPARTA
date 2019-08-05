<?php 

include "assets/includes/functions.php"; 

session_start();

$user = new Users;
$userData = $user->getUserData($_SESSION['loggedInId']);

if ($userData['user_auth'] == 0) {
    header("Location: dashboard/admin/");
} elseif ($userData['user_auth'] == 1) {
    header("Location: dashboard/customer/");
} else {
    header("Location: login/");
}

?>