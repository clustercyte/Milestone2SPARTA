<?php 
define ('__POS__',str_repeat('../',substr_count(dirname(__FILE__),'\\')-substr_count('C:\xampp\htdocs\Milestone2SPARTA\working-folder','\\')));
include "../../assets/includes/functions.php"; 
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
	header("Location:".explode('&', current_url())[0]."&pop=$pop");
}
?> 

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
	<?php include  "../../assets/includes/css_loader.php"; ?>
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
			include "../../assets/includes/navbar";
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
						<?php
							include "../../assets/includes/sidebar_admin";
						?>
                    </div>
                </nav>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- end left sidebar -->
        <!-- ============================================================== -->
        <?php if (isset($_GET['confirm']) && !empty($_GET['confirm'])) { $userPoData = $po->getUserPoData($_GET['confirm']); ?> 
            <div class="dashboard-wrapper">
            <div class="dashboard-ecommerce">
                <div class="container-fluid dashboard-content ">
                    <!-- ============================================================== -->
                    <!-- pageheader  -->
                    <!-- ============================================================== -->
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="page-header">
                                <h2 class="pageheader-title">Bukti Bayar</h2>
                                <div class="page-breadcrumb">
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>
                                            <li class="breadcrumb-item active" aria-current="page">Data Pre Order</li>
                                            <li class="breadcrumb-item active" aria-current="page">Bukti Bayar</li>
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ============================================================== -->
                    <!-- end pageheader  -->
                    <!-- ============================================================== -->
                    <div class="row">
                        <div class="offset-xl-2 col-xl-8 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row mb-4" style="overflow: scroll">
                                        <div class="col-sm-6">
                                            <img src="../../assets/images/payments/Screenshot_20180121_183200.png"; class="img-fluid" style="max-width:200px;"> 
                                        </div>
                                        <div class="col-sm-6">
                                            <h3 class="text-dark mb-1">Nama: <?php echo $userPoData['cs_name']; ?></h3>  
                                            <div>Email: <?php echo $userPoData['cs_email']; ?></div>
                                            <div>Line: <?php echo $userPoData['cs_line']; ?></div>

                                            <br>
                                            <div class="row mb-4">
                                                <div class="col-sm-3">
                                                    <a href="index.php?delete=<?php echo $userPoData['cs_id']; ?>" class="btn btn-primary">Hapus</a>
                                                </div>
                                                <?php if ($userPoData['cs_confirmation'] == 0) { ?>
												<div class="col-sm-3">
                                                    <a href="confirm.php?cs_id=<?php echo $userPoData['cs_id']; ?>" class="btn btn-primary">Konfirmasi</a>
                                                </div>
												<?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="table-responsive-sm">
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th class="center">#</th>
                                                    <th>Item</th>
                                                    <th>Description</th>
                                                    <th class="right">Unit Cost</th>
                                                    <th class="center">Qty</th>
                                                    <th class="right">Total</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class="center">1</td>
                                                    <td class="left strong">Buku Phiwiki</td>
                                                    <td class="left"></td>
                                                    <td class="right">Rp.50000,00</td>
                                                    <td class="center"><?php echo $userPoData['cs_order_amount']; ?></td>
                                                    <td class="right">Rp.<?php echo $userPoData['cs_order_amount']*50000; ?></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="card-footer bg-white">
                                    <p class="mb-0">2983 Glenview Drive Corpus Christi, TX 78476</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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
        
        <?php } else { ?> 
        
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
                                        
                                        <div class="card" style="overflow: scroll">
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
                                                            <th scope="col"></th>
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
                
            <?php } elseif ($poStatus['po_status'] == 2) {
				header("Location: scanner.php");
			}
			?>
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
        
        <?php } ?>
    </div>
    <!-- ============================================================== -->
    <!-- end main wrapper  -->
    <!-- ============================================================== -->
    <!-- jquery 3.3.1  -->
	<?php include "../../assets/includes/script_loader.php"; ?>
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
                url: "<?php echo (($_GET['showData'] != "lunas") ? 'display_po.php':'display_lunas.php'); ?>",
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