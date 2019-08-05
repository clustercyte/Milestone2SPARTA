<?php include "../assets/includes/functions.php"; ?>

<!doctype html>
<html lang="en">
 
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="../assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/libs/css/style.css">
    <link rel="stylesheet" href="../assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
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
                        <div class="card-header text-center"><a href="../index.html"><img class="logo-img" src="../assets/images/phiwiki.png" alt="logo"></a><span class="splash-description">Please enter your user information.</span></div>
                        <div class="card-body">
                            <form action="login.php" method="post">
                                <div class="form-group">
                                    <input class="form-control form-control-lg" id="username" type="text" name="user_uname" placeholder="Username" autocomplete="off">
                                </div>
                                <div class="form-group">
                                    <input class="form-control form-control-lg" id="password" type="password" name="user_pass" placeholder="Password">
                                </div>
                                <div class="form-group">
                                    <label class="custom-control custom-checkbox">
                                        <input class="custom-control-input" type="checkbox"><span class="custom-control-label">Remember Me</span>
                                    </label>
                                </div>
                                <button type="submit" class="btn btn-primary btn-lg btn-block" name="submit_login">Sign in</button>
                            </form>
                        </div>
                        <div class="card-footer bg-white p-0  card-footer-login">
                            <div class="card-footer-item card-footer-item-bordered">
                                <a href="#" class="footer-link">Create An Account</a></div>
                            <div class="card-footer-item card-footer-item-bordered">
                                <a href="#" class="footer-link">Forgot Password</a>
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
    <script src="../assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
</body>
 
</html>

<?php 

if (isset($_GET['pop']) && !empty($_GET['pop'])) {

	popOut($_GET['pop']);
}

?>