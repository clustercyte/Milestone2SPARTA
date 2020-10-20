<?php 
define ('__POS__',str_repeat('../',substr_count(dirname(__FILE__),'\\')-substr_count('C:\xampp\htdocs\Milestone2SPARTA\working-folder','\\')));
include "../assets/includes/functions.php"; 
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
    <title>Login</title>
    <!-- Bootstrap CSS -->
	<?php include "../assets/includes/css_loader.php"; ?>
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

<body>
    <!-- ============================================================== -->
    <!-- login page  -->
    <!-- ============================================================== -->
    <div class="container">
        <div class="row">
            <div class="col-md-3 no-margin no-padding">
                <div class="splash-container max-width-100 no-padding">
                    <div class="card no-margin">
                        <div class="card-header text-center"><a href=""><img class="logo-img" src="../assets/images/phiwiki.png" alt="logo"></a><span class="splash-description">Please enter your user information.</span></div>
                        <div class="card-body">
                            <form action="login.php" method="post">
                                <div class="form-group">
                                    <input class="form-control form-control-lg" id="username" type="text" name="user_uname" placeholder="Username" autocomplete="on" required>
                                </div>
                                <div class="form-group">
                                    <input class="form-control form-control-lg" id="password" type="password" name="user_pass" placeholder="Password" required>
                                </div>
                                <button type="submit" class="btn btn-primary btn-lg btn-block" name="submit_login">Sign in</button>
                            </form>
                        </div>
                        <div class="card-footer bg-white p-0  card-footer-login">
                            <div class="card-footer-item card-footer-item-bordered">
                                <a href="../signup/" class="footer-link">Create An Account</a>
							</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-9 no-padding">
                <div class="splash-container bg-login max-width-100 no-padding">
                </div>
            </div>
        </div>
    </div>
  
    <!-- ============================================================== -->
    <!-- end login page  -->
    <!-- ============================================================== -->
    <!-- Optional JavaScript -->
	<?php include "../assets/includes/script_loader.php"; ?>
</body>
 
</html>

<?php 

if (isset($_GET['pop']) && !empty($_GET['pop'])) {

	popOut($_GET['pop']);
}

?>