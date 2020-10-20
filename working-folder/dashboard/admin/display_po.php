<?php 
define ('__POS__',str_repeat('../',substr_count(dirname(__FILE__),'\\')-substr_count('C:\xampp\htdocs\Milestone2SPARTA\working-folder','\\')));
include "../../assets/includes/functions.php"; 
?>
<?php 

$po = new Po;
$poData = $po->getPoData("belum_lunas");

if ($poData->num_rows > 0) {

	$i = 1;
	while($row = $poData->fetch_assoc()) {

		$user_id = $row['user_id'];
		$cs_name = $row['cs_name'];
		$cs_email = $row['cs_email'];
		$confirm = "Apakah anda yakin ingin menghapus ?";

		echo "<tr>";
		echo "<td>$i</td>";
		echo "<td>$cs_name</td>";
		echo "<td>$cs_email</td>";
		echo "<td><a href='index.php?confirm=$user_id' class='btn btn-primary' target='_blank'>Lihat</a></td>";
		echo "<td><a href='index.php?showData=belum_lunas&delete=$cs_id' class='btn btn-primary' onclick='return confirm($confirm);'>Delete</a></td>";
		echo "</tr>";

		$i++;
	}
} else {
	echo "<td></td>";
	echo "<td>Belum ada data yang diterima</td>";
}

?>