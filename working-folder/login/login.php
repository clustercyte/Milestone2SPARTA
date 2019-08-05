<?php 
define ('__POS__',str_repeat('../',substr_count(dirname(__FILE__),'\\')-substr_count('C:\xampp\htdocs\Milestone2SPARTA\working-folder','\\')));
include __POS__."/assets/includes/functions.php"; 
include __POS__."/assets/includes/connection.php";
?>
<?php 


if (isset($_POST['submit_login'])) {

	// echo "<script>alert('Submit berhasil')</script>";
	$user_uname = $_POST['user_uname'];
	$user_pass = $_POST['user_pass'];

		if ($user_uname && $user_pass && !empty($user_uname) && !empty($user_pass)) {
			$query = "SELECT user_id FROM users WHERE (user_uname = ? AND user_pass = ?)";
			$stmt = $conn->prepare($query);
			$stmt->bind_param('ss', $uname_query, $pass_query);
			$uname_query = $user_uname;
			$pass_query = $user_pass;
			$stmt->execute();
			$select_user = $stmt->get_result();
			$row_count = $select_user->num_rows;
			$stmt->close();
			if ($row_count > 0) {
			// echo "<script>alert('Login Berhasil')</script>";

			// Membuat session
			$sess = new Session;
			$row = $select_user->fetch_assoc();
			$_SESSION['loggedInId'] = $row['user_id'];

			// Redirect
			header("Location: ../index.php");
			} else {
				$pop = "Email atau Password salah";
				header("Location: index.php?pop=$pop");
			}
		}
								
}

?>