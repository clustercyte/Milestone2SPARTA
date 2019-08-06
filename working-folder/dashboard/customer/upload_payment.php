<?php 
ini_set('display_errors',1);
error_reporting(E_ALL);
var_dump($_FILES);
define ('__POS__',str_repeat('../',substr_count(dirname(__FILE__),'\\')-substr_count('C:\xampp\htdocs\Milestone2SPARTA\working-folder','\\')));
include __POS__."assets/includes/functions.php"; 
include __POS__."assets/includes/connection.php";
?>
<?php

$sess = new Session;

$user = new Users;
$userData = $user->getUserData($_SESSION['loggedInId']);

if (($userData['user_auth'] != 1)or(!isset($_SESSION['loggedInId']))) {
	unset($sess->name);
    header("Location: ".__POS__);
}
?>
<?php 

if (isset($_POST['submit_payment'])) {

	$target_dir = __POS__."assets/images/payments/";
	$uploadOk = 1;
	$imageFileType = strtolower(pathinfo(basename($_FILES["cs_payment"]["name"]), PATHINFO_EXTENSION));
	$newFileName = md5(uniqid(rand(), true))  . "." . $imageFileType;
	$target_file = $target_dir . $newFileName;

	$check = getimagesize($_FILES["cs_payment"]["tmp_name"]);
	if($check === false) {
		// echo "File is an image - " . $check["mime"] . ".";
		$uploadOk = 0;
	} 

	// Allow certain file formats
	if($imageFileType != "jpg"  && $imageFileType != "jpeg") {
		$uploadOk = 0;
	}

	// Check if $uploadOk is set to 0 by an error
	if ($uploadOk == 0) {
		$pop = "Upload error";
		// header("Location: index.php?pop=$pop");
	// if everything is ok, try to upload file
	} else {
		if (move_uploaded_file($_FILES["cs_payment"]["tmp_name"], $target_file)) {

			$query = "UPDATE preorders SET cs_payment = ? WHERE user_id = ?";
			$stmt = $conn->prepare($query);
			$stmt->bind_param('si', $payment_query, $id_query);
			$payment_query = $newFileName;
			$id_query = $_SESSION['loggedInId'];
			$stmt->execute();
			$stmt->close();
			$conn->close();

			$pop = "Upload berhasil";
			// header("Location: index.php?pop=$pop");
		} else {
			$pop = "Upload gagal";
			// header("Location: index.php?pop=$pop");
		}
	}
}

?>