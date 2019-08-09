<?php 
define ('__POS__',str_repeat('../',substr_count(dirname(__FILE__),'\\')-substr_count('C:\xampp\htdocs\Milestone2SPARTA\working-folder','\\')));
include __POS__."assets/includes/functions.php";
?>
<?php

$sess = new Session;

$user = new Users;
$userData = $user->getUserData($_SESSION['loggedInId']);

if (($userData['user_auth'] != 0)or(!isset($_SESSION['loggedInId']))) {
	echo(1);
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
			include __POS__."assets/includes/navbar";
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
							include __POS__."assets/includes/sidebar_admin";
						?>
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
                
            <div class="container-fluid  dashboard-content">
                <!-- ============================================================== -->
                <!-- pageheader -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="page-header">
                            <h2 class="pageheader-title">Scanner </h2>
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>
                                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Scanner</a></li>
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
                                    <div class="tab-pane fade show active" role="tabpanel" aria-labelledby="home-tab">
                                        
                                        <div class="card">
                                            <div class="d-flex justify-content-between">
                                                <h5 class="card-header card-header-datapreorder">Result</h5>
                                            </div>
                                            <div class="card-body">	
												<table id="result" class="table">
													<thead>
														<tr>
															<th scope="col">#</th>
															<th scope="col">Nama</th>
															<th scope="col">Email</th>
															<th scope="col">Fakultas</th>
															<th scope="col">Jumlah Order</th>
															<th scope="col">Line</th>
															<th scope="col">Waktu Pengambilan</th>
														</tr>
													</thead>
												</table>
											</div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                        
                                        <div class="card">
                                            <div class="d-flex justify-content-between">
                                                <h5 class="card-header card-header-datapreorder">Scanner</h5>
                                            </div>					
											<video controls></video>
                                        </div>
                                    </div>
                            </div>
                        </div>
                        <!-- ============================================================== -->
                        <!-- end basic table -->
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
	<script src="../../assets/libs/js/qcode-decoder.min.js"></script>
	<script>

		let constraintObj = { 
			audio: false, 
			video: { 
				facingMode: "user", 
				width: { min: 500, ideal: 700, max: 1500 },
				height: { min: 500, ideal: 700, max: 1500 } 
			} 
		}; 
		if (navigator.mediaDevices === undefined) {
			navigator.mediaDevices = {};
			navigator.mediaDevices.getUserMedia = function(constraintObj) {
				let getUserMedia = navigator.webkitGetUserMedia || navigator.mozGetUserMedia;
				if (!getUserMedia) {
					return Promise.reject(new Error('getUserMedia is not implemented in this browser'));
				}
				return new Promise(function(resolve, reject) {
					getUserMedia.call(navigator, constraintObj, resolve, reject);
				});
			}
		}else{
			navigator.mediaDevices.enumerateDevices()
			.then(devices => {
				devices.forEach(device=>{
					console.log(device.kind.toUpperCase(), device.label);
					//, device.deviceId
				})
			})
			.catch(err=>{
				console.log(err.name, err.message);
			})
		}
		navigator.mediaDevices.getUserMedia(constraintObj)
		.then(function(mediaStreamObj) {
			//connect the media stream to the first video element
			let video = document.querySelector('video');
			if ("srcObject" in video) {
				video.srcObject = mediaStreamObj;
			} else {
				//old version
				video.src = window.URL.createObjectURL(mediaStreamObj);
			}
			
			video.onloadedmetadata = function(ev) {
				//show in the video element what is being captured by the webcam
				video.play();
			};
		})
		.catch(function(err) { 
			console.log(err.name, err.message); 
		});
		scan = () => {
				QCodeDecoder()
				.decodeFromVideo(document.querySelector('video'), function (err, result) {
					load=false;
					if (err) { scan(); return 0; } else {
						var r = new XMLHttpRequest();
						r.onreadystatechange = function() {
						if (this.readyState == 4 && this.status == 200) {
						   document.getElementById("result").innerHTML = document.getElementById("result").innerHTML + r.responseText;
						}
						};
						console.log(1);
						data = new FormData();
						data.append("result",result);
						r.open("POST", "checker.php", true);
						r.send(data);
						setTimeout(()=>{scan();},5000);
					}
					return 0;
				}, true);
		}
		scan();
    </script>
</body>
</html>

<?php 


if (isset($_GET['pop']) && !empty($_GET['pop'])) {

	popOut($_GET['pop']);
}

?>