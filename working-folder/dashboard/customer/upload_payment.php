<?php 
define ('__POS__',str_repeat('../',substr_count(dirname(__FILE__),'\\')-substr_count('C:\xampp\htdocs\Milestone2SPARTA\working-folder','\\')));
include __POS__."assets/includes/functions.php"; 
include __POS__."assets/includes/connection.php";
?>
<?php 

$sess = new Session;

$target_dir = "payments/";
$target_file = $target_dir . basename($_FILES["cs_payment"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["submit_payment"])) {
	$check = getimagesize($_FILES["cs_payment"]["tmp_name"]);
	if($check !== false) {
		$uploadOk = 1;
	} else {
		$uploadOk = 0;
	}
}
// Check if file already exists
if (file_exists($target_file)) {
	$uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
	$uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
	$pop = "Upload error 1";
	header ("Location: index.php?pop=$pop");
// if everything is ok, try to upload file
} else {
	if (move_uploaded_file($_FILES["cs_payment"]["tmp_name"], $target_file)) {
		$pop = "Upload berhasil";
		header ("Location: index.php?pop=$pop");
	} else {
		$pop = $_FILES['cs_payment']['tmp_name']." $target_file";
		header ("Location: index.php?pop=$pop");
	}
}

?>