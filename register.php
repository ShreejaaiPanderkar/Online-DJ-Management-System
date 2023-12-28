<?php
include 'admin/base/db.php';

if (isset($_POST['submit'])) {

    $name = $_POST['name'];
    $mobile = $_POST['mobile'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $address = $_POST['address'];

    $sql = "insert into users(name,mobile,age,gender,email,password,address)values(:name,:mobile,:age,:gender,:email,:password,:address)";

    $query = $conn->prepare($sql);

    $query->bindParam(':name', $name, PDO::PARAM_STR);
    $query->bindParam(':mobile', $mobile, PDO::PARAM_STR);
    $query->bindParam(':age', $age, PDO::PARAM_STR);
    $query->bindParam(':gender', $gender, PDO::PARAM_STR);
    $query->bindParam(':email', $email, PDO::PARAM_STR);
    $query->bindParam(':password', $password, PDO::PARAM_STR);
    $query->bindParam(':address', $address, PDO::PARAM_STR);


    $query->execute();

    if ($query) {
        echo "<script>alert('Account Created Sucessfully');</script>";
        echo "<script> location.href='login.php'; </script>";
    }
}

?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Event Management System Project in PHP with Source Code">
    <title>Event Management System Project in PHP with Source Code</title>

    <meta property="og:title" content="Event Management System Project in PHP with Source Code" />
    <link rel="canonical" href="https://phpstartup.com/" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="https://phpstartup.com/" />
    <meta name="author" content="Nitin Kumar">
    <meta name="twitter:site" content="@StartupPhp">
    <meta property="og:site_name" content="Php Startup">

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


</head>

<body id="login">

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
                <p><img src="pic/ulogo.png"width="177" height="65" alt="" class="img-responsive" style="margin:auto;">
                </p>
            </div>
        </div>
        <div class="row">

            <div class="col-lg-6 col-lg-offset-3">
                <div class="box_login">
                    <strong><i class="icon_lock-open_alt"></i>
                        <h3>Create an account</h3>
                    </strong>
                    <form method="post">
                        <div class="form-group">
                            <input type="text" class=" form-control" name="name" placeholder="Name" required>
                            <span class="input-icon"><i class="icon_pencil-edit"></i></span>
                        </div>
                        <div class="form-group">
                            <input type="text" class=" form-control" name="mobile" placeholder="91-1234567890" pattern="[1-9]{2}-[0-9]{10}" required>
                            <span class="input-icon"><i class="icon_mobile"></i></span>
                        </div>
                        <div class="form-group">
                            <input type="text" class=" form-control" name="age" placeholder="Age" required>
                            <span class="input-icon"><i class="icon_id-2"></i></span>
                        </div>
                        <div class="form-group">
                            <select class="form-control" name="gender" required required>
                                <option>Select</option>
                                <option>Male</option>
                                <option>Female</option>

                            </select>
                        </div>
                        <div class="form-group">
                            <input type="email" class=" form-control" name="email" placeholder="username@gmail.com" required>
                            <span class="input-icon"><i class="icon_mail_alt"></i></span>
                        </div>
                        <div class="form-group">
                            <input type="text" class=" form-control" name="password" placeholder="Password " required>
                            <span class="input-icon"><i class="icon_lock_alt"></i></span>
                        </div>
                        <div class="form-group">
                            <input type="text" class=" form-control" name="address" placeholder="Address " required>
                            <span class="input-icon"><i class="icon_house_alt"></i></span>
                        </div>
                        <div id="pass-info" class="clearfix"></div>

                        <button type="submit" class="button_login" name="submit">Create an account</button>

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