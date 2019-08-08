<?php 
define ('__POS__',str_repeat('../',substr_count(dirname(__FILE__),'\\')-substr_count('C:\xampp\htdocs\Milestone2SPARTA\working-folder','\\')));
include __POS__."assets/includes/functions.php";
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

$unique = $_POST['result'];
$id = substr($unique,0,1);
$uid = substr($unique,1);

$hasTaken = $po->hasTaken($id);
if (!$hasTaken) {
	$row = $po->getUntakenPoData($id,$uid);
	if (isset($row)) {
		echo '
			<thead>
				<tr>
					<th scope="col">#</th>
					<th scope="col">Nama</th>
					<th scope="col">Email</th>
					<th scope="col">Fakultas</th>
					<th scope="col">Jumlah Order</th>
					<th scope="col">Line</th>
				</tr>
			</thead>
			<tbody>
				<tr>
			';
		echo "<td>1</td>";
		echo "<td>".$row["cs_name"]."</td>";
		echo "<td>".$row["cs_email"]."</td>";
		echo "<td>".$row["cs_faculty"]."</td>";
		echo "<td>".$row["cs_order_amount"]."</td>";
		echo "<td>".$row["cs_line"]."</td>";
		echo '
				</tr>
			</tbody>
			';
		echo "<div>PO berhasil diambil!</div>";
		$po->changeUserPoData($id,$uid);
	} else {
		echo "QRCode tidak valid!";
	};
} else {
	echo "PO ini sudah diambil!";
}
?>