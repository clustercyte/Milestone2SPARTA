<?php 
define ('__POS__',str_repeat('../',substr_count(dirname(__FILE__),'\\')-substr_count('C:\xampp\htdocs\Milestone2SPARTA\working-folder','\\')));
include "../../assets/includes/functions.php";
?>
<?php

$sess = new Session;

$user = new Users;
$userData = $user->getUserData($_SESSION['loggedInId']);

if (($userData['user_auth'] != 0)or(!isset($_SESSION['loggedInId']))) {
	unset($sess->name);
    header("Location: ".__POS__);
}

?>
<?php
$po = new Po;

$unique = explode("|",$_POST['result']);
if (count($unique) == 2) {
	$id = $unique[0];
	$uid = $unique[1];
	$hasTaken = $po->hasTaken($id);
	if (!$hasTaken) {
		$row = $po->getUntakenPoData($id,$uid);
		if (isset($row)) {
			date_default_timezone_set("Asia/Jakarta");
			$currentDate = date('Y-m-d H:i:s',time());
			echo '
				<tbody>
					<tr>
				';
			echo "<td>1</td>";
			echo "<td>".$row["cs_name"]."</td>";
			echo "<td>".$row["cs_email"]."</td>";
			echo "<td>".$row["cs_faculty"]."</td>";
			echo "<td>".$row["cs_order_amount"]."</td>";
			echo "<td>".$row["cs_line"]."</td>";
			echo "<td>".$currentDate."</td>";
			echo '
					</tr>
				</tbody>
				';
			echo "<tbody>PO berhasil diambil!</div>";
			$po->changeUserPoData($id,$uid);
		} else {
			echo "<tbody>Jangan coba menipu!</tbody>";
		};
	} else {
		echo "<tbody>PO ini sudah diambil!</tbody>";
	}
} else {
	echo "<tbody>QRCode tidak valid!</tbody>";
};
?>