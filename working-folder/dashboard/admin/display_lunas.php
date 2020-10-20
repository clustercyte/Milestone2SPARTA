<?php 
define ('__POS__',str_repeat('../',substr_count(dirname(__FILE__),'\\')-substr_count('C:\xampp\htdocs\Milestone2SPARTA\working-folder','\\')));
include "../../assets/includes/functions.php"; 
?>
<?php 

$po = new Po;
$poData = $po->getPoData("lunas");
if ($poData->num_rows > 0) {

	$i = 1;
	while($row = $poData->fetch_assoc()) {

		$cs_id = $row['user_id'];
		$cs_name = $row['cs_name'];
		$cs_email = $row['cs_email'];
		$confirm = "Apakah anda yakin ingin menghapus ?";

		echo "<tr>";
		echo "<td>$i</td>";
		echo "<td>$cs_name</td>";
		echo "<td>$cs_email</td>";
		echo "<td><a href='index.php?confirm=$cs_id' target='__blank' class='btn btn-primary'>Lihat</a></td>";
		echo "<td><a href='index.php?showData=lunas&delete=$cs_id' class='btn btn-primary' onclick='return confirm($confirm);'>Delete</a></td>";
		echo "</tr>";

		$i++;
	}
} else {
	echo "<td></td>";
	echo "<td>Belum ada data yang diterima</td>";
}

?>