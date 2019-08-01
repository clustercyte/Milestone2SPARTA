<?php include "../assets/includes/functions.php"; ?>

<!doctype html>
<html lang="en">
 
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Concept - Bootstrap 4 Admin Dashboard Template</title>
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
                            <div class="form-group">
                                <input class="form-control form-control-lg" type="text" name="user_uname" required="" placeholder="Username" autocomplete="off">
                            </div>
                            <div class="form-group">
                                <input class="form-control form-control-lg" type="text" name="user_name" required="" placeholder="Name" autocomplete="off">
                            </div>
                            <div class="form-group">
                                <input class="form-control form-control-lg" type="email" name="user_email" required="" placeholder="E-mail" autocomplete="off">
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
                            <div class="form-group">
                                <label class="custom-control custom-checkbox">
                                    <input class="custom-control-input" type="checkbox"><span class="custom-control-label">By creating an account, you agree the <a href="#">terms and conditions</a></span>
                                </label>
                            </div>
                            <div class="form-group row pt-0">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mb-2">
                                    <button class="btn btn-block btn-social btn-facebook " type="button">Facebook</button>
                                </div>
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <button class="btn  btn-block btn-social btn-twitter" type="button">Twitter</button>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer bg-white">
                            <p>Already member? <a href="#" class="text-secondary">Login Here.</a></p>
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