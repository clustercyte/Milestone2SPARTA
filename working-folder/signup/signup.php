<?php 
define ('__POS__',str_repeat('../',substr_count(dirname(__FILE__),'\\')-substr_count('C:\xampp\htdocs\Milestone2SPARTA\working-folder','\\')));
include __POS__."assets/includes/functions.php"; 
include __POS__."assets/includes/connection.php";
?>
<?php

$sess = new Session;

if (isset($_SESSION['loggedInId'])) {
	header("Location: ".__POS__);
}
?>
<?php 

if (isset($_POST['submit_register'])) {

	$user_uname = $_POST['user_uname'];
	$user_pass = $_POST['user_pass'];
	$user_pass_c = $_POST['user_pass_c'];

		if ($user_pass != $user_pass_c) {
			$pop = "Konfirmasi password salah";
			header("Location: index.php?pop=$pop");
		} else {
			// echo "<script>alert('Konfirmasi password sudah benar')</script>";

		$query = "SELECT * FROM users WHERE user_uname = ?";
		$stmt = $conn->prepare($query);
		$stmt->bind_param('s', $uname_query);
		$uname_query = $user_uname;
		$stmt->execute();
		$select_user = $stmt->get_result();
		$row_count = $select_user->num_rows;
		$stmt->close();

		if ($row_count > 0) {
			$pop = "Username sudah terdaftar";
			header("Location: index.php?pop=$pop");
		} else {

		// Insert query
		$query = "INSERT INTO users (user_uname, user_pass) VALUE (?, ?)";
		$stmt = $conn->prepare($query);
		$stmt->bind_param('ss', $uname_query, $pass_query);
		$user_query = $user_uname;
		$pass_query = $user_pass;
		$stmt->execute();
		$stmt->close();
	
		header("Location: ../login/");
									
		}
	}
}
                            
?>