<?php 
define ('__POS__',str_repeat('../',substr_count(dirname(__FILE__),'\\')-substr_count('C:\xampp\htdocs\Milestone2SPARTA\working-folder','\\')));
include "assets/includes/functions.php";
?>
<?php 

$sess = new Session;

$user = new Users;
$userData = $user->getUserData($_SESSION['loggedInId']);

if (!isset($_SESSION['loggedInId'])) {
    header("Location: login/");
} else if ($userData['user_auth'] == 0) {
    header("Location: dashboard/admin/");
} else {
    header("Location: dashboard/customer/");
}

?>