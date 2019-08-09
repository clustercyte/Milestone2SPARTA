<?php 
define ('__POS__',str_repeat('../',substr_count(dirname(__FILE__),'\\')-substr_count('C:\xampp\htdocs\Milestone2SPARTA\working-folder','\\')));
include __POS__."assets/includes/functions.php"; 
include __POS__."assets/includes/connection.php";
?>
<?php

$sess = new Session;

if (isset($_SESSION['loggedInId'])) {
	header("Location: ".__POS__);
}
?>
<!doctype html>
<html lang="en">
 
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Concept - Bootstrap 4 Admin Dashboard Template</title>
    <!-- Bootstrap CSS -->
	<?php include __POS__."assets/includes/css_loader.php"; ?>
    <style>
    html,
    body {
        height: 100%;
    }

    body {
        display: -ms-flexbox;
        display: flex;
        -ms-flex-align: center;
        align-items: center;
        padding-top: 40px;
        padding-bottom: 40px;
    }
    </style>
</head>
<!-- ============================================================== -->
<!-- signup form  -->
<!-- ============================================================== -->

<body>
    <!-- ============================================================== -->
    <!-- signup form  -->
    <!-- ============================================================== -->
    <div class="container">
        <div class="row">
            <div class="col-md-3 no-margin no-padding">
                <form class="splash-container max-width-100 no-padding" action="signup.php" method="post">
                    <div class="card no-margin">
                        <div class="card-header">
                            <h3 class="mb-1">Registrations Form</h3>
                            <p>Please enter your user information.</p>
                        </div>
                        <div class="card-body">
                            <form action="login.php" method="post">
								<div class="form-group">
									<input class="form-control form-control-lg" type="text" name="user_uname" required="" placeholder="Username" autocomplete="off">
								</div>
								<div class="form-group">
									<input class="form-control form-control-lg" id="pass1" type="password" name="user_pass" required="" placeholder="Password">
								</div>
								<div class="form-group">
									<input class="form-control form-control-lg" id="pass2" type="password" name="user_pass_c" required="" placeholder="Confirm">
								</div>
								<div class="form-group pt-2">
									<button class="btn btn-block btn-primary" type="submit" name="submit_register">Register My Account</button>
								</div>
                            </form>
                        </div>
                        <div class="card-footer bg-white">
                            <p>Already member? <a href="../login/" class="text-secondary">Login Here.</a></p>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-9 no-padding">
                <div class="splash-container bg-login max-width-100 no-padding">
                </div>
            </div>
        </div>
    </div>
</body>

 
</html>

<?php 

if (isset($_GET['pop']) && !empty($_GET['pop'])) {

	popOut($_GET['pop']);
}

?>