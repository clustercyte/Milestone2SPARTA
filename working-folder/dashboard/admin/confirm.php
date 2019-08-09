<?php 
define ('__POS__',str_repeat('../',substr_count(dirname(__FILE__),'\\')-substr_count('C:\xampp\htdocs\Milestone2SPARTA\working-folder','\\')));
include __POS__."assets/includes/functions.php"; 
?>
<?php 

if (isset($_GET['cs_id']) && !empty($_GET['cs_id'])) {
    $po = new Po;
    $po->confirmPo($_GET['cs_id']);
    $pop = "Pesanan dikonfirmasi";
    header("Location: index.php?showData=belum_lunas&pop=$pop");
} else {
    header("Location: index.php?showData=belum_lunas");
}

?>