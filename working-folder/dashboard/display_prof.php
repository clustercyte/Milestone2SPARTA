<?php 

include "../assets/includes/functions.php";

$sess = new Session;

$user = new Users;
$userData = $user->getUserData($_SESSION['loggedInId']);
echo '<img src="../../assets/images/avatar-1.jpg" alt="" class="user-avatar-md rounded-circle"> ';
echo $userData['user_name'];

?>