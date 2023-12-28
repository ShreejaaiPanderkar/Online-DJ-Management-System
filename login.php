<?php
session_start();
include 'admin/base/db.php';

if (isset($_POST['login'])) {

	$email = $_POST['email'];
	$password = $_POST['password'];

	$sql = "SELECT id FROM users WHERE email=:email and password=:password";

	$query = $conn->prepare($sql);

	$query->bindParam(':email', $email, PDO::PARAM_STR);
	$query->bindParam(':password', $password, PDO::PARAM_STR);

	$query->execute();

	$results = $query->fetchAll(PDO::FETCH_OBJ);

	if ($query->rowCount() > 0) {
		foreach ($results as $result) {

			$_SESSION['user_id'] = $result->id;
		}
		$_SESSION['login'] = $_POST['email'];

		echo "<script type='text/javascript'> document.location ='index.php'; </script>";

	} else {

		echo "<script>alert('Wrong Username and Password');</script>";
	}
}

?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Ansonika">
    <title></title>

    <!-- Favicons-->
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" type="image/x-icon" href="img/apple-touch-icon-57x57-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="img/apple-touch-icon-72x72-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="114x114" href="img/apple-touch-icon-114x114-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="144x144" href="img/apple-touch-icon-144x144-precomposed.png">

    <!-- GOOGLE FONT -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,500,700,300" rel="stylesheet" type="text/css">

    <!-- BASE CSS -->
    <link href="css/animate.min.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/menu.css" rel="stylesheet">
    <link href="css/icon_fonts/css/all_icons.min.css" rel="stylesheet">
    <link href="css/menu.css" rel="stylesheet">

    <!-- YOUR CUSTOM CSS -->
    <link href="css/custom.css" rel="stylesheet">

    <!--[if lt IE 9]>
      <script src="js/html5shiv.min.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->

</head>

<body id="login">

    <!--[if lte IE 8]>
        <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a>.</p>
    <![endif]-->

    <!-- Header ================================================== -->
    <header>
        <div class="container-fluid">
            <div class="row">
                <div class="col-xs-4">
                    <a href="index.php" id="logo">
                        <img src="pic/download.png" width="170" height="50" alt="" data-retina="true">
                    </a>
                </div>
                <div class="col-xs-8">
                    <a href="index.php" class="btn_home pull-right"><i class="icon_house_alt"></i></a>
                </div>
            </div>
            <!-- End row -->
        </div>
        <!-- End container -->
    </header>
    <!-- End Header =============================================== -->

    <div class="container margin_30">
        <div class="row">
            <div class="col-md-12">
                <p><img src="pic/ulogo.png" width="177" height="65" alt="" class="img-responsive" style="margin:auto;">
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 col-lg-offset-3 col-sm-6">
                <div class="box_login">
                    <form method="post">
                        <strong><i class="icon_key_alt"></i>
                            <h3>Please Login</h3>
                        </strong>
                        <div class="form-group">
                            <input type="email" class=" form-control " placeholder="User Email" name="email" required>
                            <span class="input-icon"><i class="icon_pencil-edit"></i></span>
                        </div>
                        <div class="form-group" style="margin-bottom:5px;">
                            <input type="password" class=" form-control" placeholder="Password" style="margin-bottom:5px;" name="password" required>
                            <span class="input-icon"><i class="icon_lock_alt"></i></span>
                        </div>
                        <p class="small">
                            <!--<a href="#">Forgot Password?</a>-->
                        </p>
                        <button type="submit" name="login" class="button_login">Log in</button>
                    </form>
                </div>
            </div>

        </div>
        <!-- End row -->
        <div class="row">
            <div class="col-md-12 text-center">
                © Online DJ Managment System - All Rights Reserved
            </div>
        </div>
        <!-- End row -->
    </div>
    <!-- End container -->

    <!-- COMMON SCRIPTS -->
    <script src="js/jquery-2.2.4.min.js"></script>
    <script src="js/common_scripts_min.js"></script>
    <script src="assets/validate.js"></script>
    <script src="js/functions.js"></script>

    <!-- SPECIFIC SCRIPTS -->
    <script src="js/pw_strenght.js"></script>
</body>

</html>