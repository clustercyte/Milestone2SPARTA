<?php 
define ('__POS__',str_repeat('../',substr_count(dirname(__FILE__),'\\')-substr_count('C:\xampp\htdocs\Milestone2SPARTA\working-folder','\\')));
include __POS__."assets/includes/functions.php"; 
?>
<?php 

$sess = new Session;

$user = new Users;
$userData = $user->getUserData($_SESSION['loggedInId']);

if (($userData['user_auth'] != 0)or(!isset($_SESSION['loggedInId']))or(isset($_GET['logout']))) {
	unset($sess->name);
    header("Location: ".__POS__);
}

$po = new Po; 
$poStatus = $po->getPoStatus();

if (isset($_GET['delete']) && !empty($_GET['delete'])) {

    $po->deletePoData($_GET['delete']);
    $pop = "Data berhasil dihapus";
    header("Location: index.php?pop=$pop");
}
?> 

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
	<?php include __POS__."assets/includes/css_loader.php"; ?>
    <title>Data Pre Order</title>
</head>

<body>
    <!-- ============================================================== -->
    <!-- main wrapper -->
    <!-- ============================================================== -->
    <div class="dashboard-main-wrapper">
         <!-- ============================================================== -->
        <!-- navbar -->
        <!-- ============================================================== -->
		<?php
			include __POS__."assets/includes/navbar.php";
		?>
        <!-- ============================================================== -->
        <!-- end navbar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- left sidebar -->
        <!-- ============================================================== -->
       <div class="nav-left-sidebar sidebar-dark">
            <div class="menu-list">
                <nav class="navbar navbar-expand-lg">
                    <a class="d-xl-none d-lg-none" href="#">Dashboard</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav flex-column">
                            <li class="nav-item ">
                                <a class="nav-link active" href="form_newpo.php" aria-expanded="false" aria-controls="submenu-1">Pembelian <span class="badge badge-success">6</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-2" aria-controls="submenu-2">Pre-Order</a>
                                <div id="submenu-2" class="collapse submenu" style="">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="index.php">Data PO</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#">Data Lunas</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- end left sidebar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- wrapper  -->
        <!-- ============================================================== -->
        <div class="dashboard-wrapper">
            
            <?php if ($poStatus['po_status'] == 0) { ?> 
            
            <div class="dashboard-finance">
                <div class="container-fluid dashboard-content">
                    <div class="container">
                        <div class="d-flex justify-content-center">
                            <a href="form_newpo.php" class="btn btn-primary">Buat PO baru</a>
                        </div>
                    </div>
                </div>
            </div>
            
            <?php } elseif ($poStatus['po_status'] == 1) { ?> 
                
            <div class="container-fluid  dashboard-content">
                <!-- ============================================================== -->
                <!-- pageheader -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="page-header">
                            <h2 class="pageheader-title">Data Pre Order </h2>
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>
                                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Data Pre Order</a></li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- end pageheader -->
                <!-- ============================================================== -->
               
                    <div class="row">
                        <!-- ============================================================== -->
                        <!-- basic table -->
                        <!-- ============================================================== -->
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="tab-regular">
                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                        
                                        <div class="card">
                                            <div class="d-flex justify-content-between">
                                                <h5 class="card-header card-header-datapreorder">Pesanan</h5>
                                                <h5 class="card-header card-header-datapreorder" id="potime"></h5>
                                            </div>
                                            <div class="card-body">
                                                <table class="table table-datapreorder">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">#</th>
                                                            <th scope="col">Nama</th>
                                                            <th scope="col">Email</th>
                                                            <th scope="col">Bukti Bayar</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="table-data-po">
                                                        
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                        
                                        <div class="card">
                                            <div class="d-flex justify-content-between">
                                                <h5 class="card-header card-header-datapreorder">List Pembayaran</h5>
                                                <h5 class="card-header card-header-datapreorder" id="potime"></h5>
                                            </div>
                                            <div class="card-body">
                                                <table class="table table-datapreorder">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">#</th>
                                                            <th scope="col">Nama</th>
                                                            <th scope="col">Email</th>
                                                            <th scope="col">Bukti Bayar</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="table-data-po">
                                                        
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- ============================================================== -->
                        <!-- end basic table -->
                        <!-- ============================================================== -->
                    </div>
               
            </div>
                
            <?php } elseif ($poStatus['po_status'] == 2) { ?> 
                
                <div class="dashboard-wrapper">
            <div class="container-fluid  dashboard-content">
                <!-- ============================================================== -->
                <!-- pageheader -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="page-header">
                            <h2 class="pageheader-title">Pengambilan </h2>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- end pageheader -->
                <!-- ============================================================== -->
             
                    <div class="row">
                        <!-- ============================================================== -->
                        <!-- validation form -->
                        <!-- ============================================================== -->
                        <img src="../assets/images/qr-code.png" height="200" width="200">

                        <!-- ============================================================== -->
                        <!-- end validation form -->
                        <!-- ============================================================== -->
                    </div>
                    
                    <br>


                    <div class="row">

                        <div class="col-md-1">
                        <label for="inputText3" class="col-form-label">Kode :</label>
                        </div>
                        <div class="col-md-1.5">
                        <div class="p-1 mb-2 bg-dark text-white">Xcspyfz</div>
                        </div>

                    </div>
            </div>
        </div>
                
            <?php } ?>
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <div class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                            Copyright © 2018 Concept. All rights reserved. Dashboard by <a href="https://colorlib.com/wp/">Colorlib</a>. 
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                            <div class="text-md-right footer-links d-none d-sm-block">
                                <a href="javascript: void(0);">About</a>
                                <a href="javascript: void(0);">Support</a>
                                <a href="javascript: void(0);">Contact Us</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- end footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- end wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- end main wrapper  -->
    <!-- ============================================================== -->
    <!-- jquery 3.3.1  -->
	<?php include __POS__."assets/includes/script_loader.php"; ?>
    <script>
    $(function() {

        function loadPoTime() {
            $.ajax({
                url: "../../assets/includes/potime.php",
                success: function(result){
                $("#potime").html(result);
            }});
        }

        loadPoTime();

        setInterval(function(){ loadPoTime(); }, 500);
    });

    <?php if (isset($_GET['showData']) && !empty($_GET['showData'])) { ?>

        $(function() {

        function loadPoData() {
            $.ajax({
                url: "<?php echo (($_GET['showData'] == "lunas") ? 'display_po.php':'display_lunas.php'); ?>",
                success: function(result){
                $("#table-data-po").html(result);
            }});
        }

        loadPoData();

        setInterval(function(){ loadPoData(); }, 500);
        });
        
    <?php } ?>

    </script>
</body>
</html>


<?php 


if (isset($_GET['pop']) && !empty($_GET['pop'])) {

	popOut($_GET['pop']);
}

?>