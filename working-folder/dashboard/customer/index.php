<?php 
define ('__POS__',str_repeat('../',substr_count(dirname(__FILE__),'\\')-substr_count('C:\xampp\htdocs\Milestone2SPARTA\working-folder','\\')));
include __POS__."assets/includes/functions.php"; 
require __POS__."vendor/autoload.php";
use Endroid\QrCode\QrCode;
?>
<?php 

$sess = new Session;

$user = new Users;
$userData = $user->getUserData($_SESSION['loggedInId']);

if (($userData['user_auth'] != 1)or(!isset($_SESSION['loggedInId'])) or(isset($_GET['logout']))) {
	unset($sess->name);
    header("Location: ".__POS__);
}

$po = new Po; 
$poStatus = $po->getPoStatus();
$hasOrdered = $po->hasOrdered($_SESSION['loggedInId']);
$hasPaid = $po->hasPaid($_SESSION['loggedInId']);
$hasConfirmed = $po->hasConfirmed($_SESSION['loggedInId']);

?> 

<!doctype html>
<html lang="en">
 
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Pemesanan Buku Phiwiki</title>
    <!-- Bootstrap CSS -->
	<?php include __POS__."assets/includes/css_loader.php"; ?>
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
			include __POS__."assets/includes/navbar";
		?>
        <!-- ============================================================== -->
        <!-- end navbar -->
        <!-- ============================================================== -->

        <!-- ============================================================== -->
        <!-- wrapper  -->
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
                            <li class="nav-item">
                            <a class="nav-link active" href="#" aria-expanded="false" aria-controls="submenu-2">Upload Bukti Bayar <span class="badge badge-success">6</span></a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- end left sidebar -->
        <!-- ============================================================== -->

        <?php if ($hasPaid && $hasConfirmed) { ?> 
        
        <div class="dashboard-wrapper">
            <div class="container-fluid dashboard-content">
                <!-- ============================================================== -->
                <!-- pageheader -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="page-header">
                            <h2 class="pageheader-title"> Pemesanan Buku </h2>
                            <p class="pageheader-text">Proin placerat ante duiullam scelerisque a velit ac porta, fusce sit amet vestibulum mi. Morbi lobortis pulvinar quam.</p>
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>
                                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Pages</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Blank Pageheader</li>
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
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <h3 class="text-center">Terima kasih telah melakukan pembelian. Gunakan qrcode dibawah ini saat pengambilan</h3>
                        <?php
                            $qrCode = new QrCode('Life is too short to be generating QR codes');
                            $qrCode->writeFile(__DIR__.'/qrcode.png');
                        ?>
                    </div>
                </div>
            </div>

        <?php } elseif ($hasPaid && !$hasConfirmed) { ?>
        
        <div class="dashboard-wrapper">
            <div class="container-fluid dashboard-content">
                <!-- ============================================================== -->
                <!-- pageheader -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="page-header">
                            <h2 class="pageheader-title"> Pemesanan Buku </h2>
                            <p class="pageheader-text">Proin placerat ante duiullam scelerisque a velit ac porta, fusce sit amet vestibulum mi. Morbi lobortis pulvinar quam.</p>
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>
                                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Pages</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Blank Pageheader</li>
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
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="text-center">
                            <h3>Terima kasih telah melakukan pembayaran. Silahkan tunggu konfirmasi dari admin</h3>
                            <?php
                                $qrCode = new QrCode('Life is too short to be generating QR codes');
                                $qrCode->writeFile(__DIR__.'/qrimg/qrcode.png');
                                echo '<img class="text-center" src="qrimg/qrcode.png"/>';
                            ?>
                        </div>
                        
                    </div>
                </div>
            </div>

        <?php } elseif ($hasOrdered) { ?> 
            
        <div class="dashboard-wrapper">
	        <div class="dashboard-influence">
	            <div class="container-fluid dashboard-content">
	                <!-- ============================================================== -->
	                <!-- pageheader  -->
	                <!-- ============================================================== -->
	                <div class="row">
	                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
	                        <div class="page-header">
	                            <h3 class="mb-2">Bukti Pembayaran</h3>
	                            <div class="page-breadcrumb">
	                                <nav aria-label="breadcrumb">
	                                    <ol class="breadcrumb">
	                                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>
	                                        <li class="breadcrumb-item active" aria-current="page">Bukti Pembayaran</li>
	                                    </ol>
	                                </nav>
	                            </div>
	                        </div>
	                    </div>
	                </div>
	                <!-- ============================================================== -->
	                <!-- end pageheader  -->
	                <!-- ============================================================== -->
	                <!-- ============================================================== -->
	                <!-- content  -->
	                <!-- ============================================================== -->
	                <!-- ============================================================== -->
	                <!-- influencer profile  -->
	                <!-- ============================================================== -->
	                <div class="row">
	                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
	                        <div class="card influencer-profile-data">
	                            <div class="card-body">
	                                <div class="row">
										<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
											<form action="upload_payment.php" method="post" enctype="multipart/form-data">
											Unggah foto bukti pembayaran :	
											<input type="file" name="cs_payment" id="cs_payment">
											<br>
											<br>
											<input type="submit" value="Submit" class="btn btn-primary" name="submit_payment">
											</form>
										</div>
	                                </div>
	                            </div>
	                        </div>
	                    </div>
	                    <!-- ============================================================== -->
	                    <!-- end influencer profile  -->
	                    <!-- ============================================================== -->
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
						</div>
						
						</div>    

        <?php } else { ?> 
            
        <?php if ($poStatus['po_status'] == 0) { ?> 

        <div class="dashboard-wrapper">
            <div class="container-fluid dashboard-content">
                <!-- ============================================================== -->
                <!-- pageheader -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="page-header">
                            <h2 class="pageheader-title"> Pemesanan Buku </h2>
                            <p class="pageheader-text">Proin placerat ante duiullam scelerisque a velit ac porta, fusce sit amet vestibulum mi. Morbi lobortis pulvinar quam.</p>
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>
                                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Pages</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Blank Pageheader</li>
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
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <h3 class="text-center">PO belum dibuka</h3>
                    </div>
                </div>
            </div>

        <?php } elseif ($poStatus['po_status'] == 1) { ?> 
            
        <div class="dashboard-wrapper">
            <div class="container-fluid dashboard-content">
                <div class="row">
                    <div class="col-xl-10">
                        <!-- ============================================================== -->
                        <!-- pageheader  -->
                        <!-- ============================================================== -->
                        <!-- ============================================================== -->
                        <!-- pageheader -->
                        <!-- ============================================================== -->
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="page-header">
                                    <h2 class="pageheader-title"> Pemesanan Buku </h2>
                                </div>
                            </div>
                        </div>
                        <!-- ============================================================== -->
                        <!-- end pageheader -->
                        <!-- ============================================================== -->
                        <!-- ============================================================== -->
                        <!-- end pageheader  -->
                        <!-- ============================================================== -->
                        <div class="page-section" id="overview">
                        </div>
                        <!-- ============================================================== -->
                        <!-- basic form  -->
                        <!-- ============================================================== -->
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <form action="order.php" method="post">
                                            <div class="form-group">
                                                <label for="inputText3" class="col-form-label">Nama Lengkap</label>
                                                <input id="inputText3" type="text" class="form-control" name="cs_name">
                                            </div>
                                            <div class="form-group">
                                                <label>Institusi</label><br>
                                                <label class="custom-control custom-radio custom-control-inline">
                                                    <input type="radio" name="cs_itb_or_not" class="custom-control-input" id="in-itb" value="itb" checked><span class="custom-control-label">ITB</span>
                                                </label>
                                                <label class="custom-control custom-radio custom-control-inline">
                                                    <input type="radio" name="cs_itb_or_not" class="custom-control-input" id="out-itb" value="non-itb"><span class="custom-control-label">Luar ITB</span>
                                                </label> 
                                            </div>
                                            <div class="form-group" id="select-institution">
                                                <label for="institusi" class="col-form-label">Nama Institusi</label>
                                                <input id="institusi" type="text" class="form-control" name="cs_institution">
                                            </div>
                                            <div class="form-group" id="select-faculty">
                                                <label for="fakultas" class="col-form-label">Fakultas
                                                </label>
                                                <select class="form-control" id="fakultas" name="cs_faculty">
                                                    <option>Pilih Fakultas</option>
                                                    <option>STEI</option>
                                                    <option>SF</option>
                                                    <option>SBM</option>
                                                    <option>SITH-R</option>
                                                    <option>SITH-S</option>
                                                    <option>SAPPK</option>
                                                    <option>FTSL</option>
                                                    <option>FTMD</option>
                                                    <option>FITB</option>
                                                    <option>FTI</option>
                                                    <option>FTTM</option>
                                                    <option>FSRD</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputEmail">Alamat E-mail</label>
                                                <input id="inputEmail" type="email" placeholder="annisarahim@example.com" class="form-control" name="cs_email">
                                                <p>Pastikan e-mail yang Anda gunakan aktif.</p>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputText4" class="col-form-label">Jumlah Buku yang Dipesan</label>
                                                <input id="inputText4" type="number" class="form-control" name="cs_order_amount">
                                            </div>
                                            <div class="form-group">
                                                <label for="inputText4" class="col-form-label">No. Telepon</label>
                                                <input id="inputText4" type="text" class="form-control" name="cs_phone">
                                            </div>
                                            <div class="form-group">
                                                <label for="inputline"class="col-form-label">ID LINE</label>
                                                <input id="inputline" type="text" class="form-control" name="cs_line">
                                            </div>
                                            <div class="form-group">
                                                <label for="alamat" class="col-form-label">Alamat Pengiriman </label>
                                                <input id="alamat" type="text" placeholder="Jl. Phiwiki no. 17, RT 013, RW 005, Kelurahan Lebung Gajah, Kecamatan Karimata, Bandung, 40135" class="form-control" name="cs_address">
                                                <p>Masukkan alamat lengkap beserta kode pos sesuai contoh.</p>
                                            </div>
                                            <input type="submit" value="Submit" class="btn btn-primary" name="submit_order">
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- ============================================================== -->
                        <!-- end basic form  -->
                        <!-- ============================================================== -->
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <div class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                            Copyright © 2018 Concept. All rights reserved. Dashboard by <a href="https://colorlib.com/wp/">Colorlib</a>.
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
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
        
        <?php } ?>
    </div>    
            
        <?php } ?>

    <!-- ============================================================== -->
    <!-- end main wrapper -->
    <!-- ============================================================== -->
    <!-- Optional JavaScript -->
	<?php include __POS__."assets/includes/script_loader.php"; ?>
    <script>
    $(function(e) {
        "use strict";
        $(".date-inputmask").inputmask("dd/mm/yyyy"),
            $(".phone-inputmask").inputmask("(999) 999-9999"),
            $(".international-inputmask").inputmask("+9(999)999-9999"),
            $(".xphone-inputmask").inputmask("(999) 999-9999 / x999999"),
            $(".purchase-inputmask").inputmask("aaaa 9999-****"),
            $(".cc-inputmask").inputmask("9999 9999 9999 9999"),
            $(".ssn-inputmask").inputmask("999-99-9999"),
            $(".isbn-inputmask").inputmask("999-99-999-9999-9"),
            $(".currency-inputmask").inputmask("$9999"),
            $(".percentage-inputmask").inputmask("99%"),
            $(".decimal-inputmask").inputmask({
                alias: "decimal",
                radixPoint: "."
            }),

            $(".email-inputmask").inputmask({
                mask: "*{1,20}[.*{1,20}][.*{1,20}][.*{1,20}]@*{1,20}[*{2,6}][*{1,2}].*{1,}[.*{2,6}][.*{1,2}]",
                greedy: !1,
                onBeforePaste: function(n, a) {
                    return (e = e.toLowerCase()).replace("mailto:", "")
                },
                definitions: {
                    "*": {
                        validator: "[0-9A-Za-z!#$%&'*+/=?^_`{|}~/-]",
                        cardinality: 1,
                        casing: "lower"
                    }
                }
            })
    });

    $(document).ready(function() {
        
        if ($('#in-itb').is(':checked')) {
            $('#select-faculty').show();
            $('#select-institution').hide();
        }

        $('#in-itb').click(function(){
            if ($(this).is(':checked')) {
                $('#select-faculty').show();
                $('#select-institution').hide();
            } 
        });

        $('#out-itb').click(function(){
            if ($(this).is(':checked')) {
                $('#select-faculty').hide();
                $('#select-institution').show();
            }
        });
    });
    </script>
</body>

</html>

<?php 

if (isset($_GET['pop']) && !empty($_GET['pop'])) {

	popOut($_GET['pop']);
}

?>