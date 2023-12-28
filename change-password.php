<?php
session_start();
error_reporting(0);
if (isset($_SESSION['user_id'])) {
    include "base/header.php";
    include "admin/base/db.php";
} else {
    echo "<script> location.href = 'logout.php';</script>";
}


if (isset($_POST['submit'])) {
    $userId = $_SESSION['user_id'];

    $currentpassword = $_POST['currentpassword'];
    $newpassword = $_POST['newpassword'];

    $sql = "SELECT id FROM users WHERE id=:userId and password=:currentpassword";

    $query = $conn->prepare($sql);

    $query->bindParam(':userId', $userId, PDO::PARAM_STR);
    $query->bindParam(':currentpassword', $currentpassword, PDO::PARAM_STR);

    $query->execute();

    $results = $query->fetchAll(PDO::FETCH_OBJ);

    if ($query->rowCount() > 0) {

        $sql1 = "update users set password=:newpassword where id=:userId";

        $chngppass = $conn->prepare($sql1);

        $chngppass->bindParam(':userId', $userId, PDO::PARAM_STR);

        $chngppass->bindParam(':newpassword', $newpassword, PDO::PARAM_STR);

        $chngppass->execute();

        echo '<script>alert("Your password successully changed")</script>';
    } else {
        echo '<script>alert("Your current password is wrong")</script>';
    }
}
?>

<section class="parallax_window_in" data-parallax="scroll" data-image-src="pic/dj1.jpg" data-natural-width="1400" data-natural-height="420">
    <div id="sub_content_in">
        <h1>Change Password</h1>
        <p>"All what needs to a traveler in Florence...Easly find places, guides, directions, info...."</p>
    </div>
    <!-- End sub_content -->
</section>



<!--  End section-->

<div class="container margin_60_30">
    <div class="row">
        <form method="post" onsubmit="return checkpass();" name="changepassword">
            <div class="col-md-8 col-md-offset-2">
                <div class="box_style_general">
                    <div class="form_title">
                        <h3>Change Password</h3>
                        <p>
                            Change your password.
                        </p>
                    </div>
                    <div class="step">
                        <div class="row">
                            <div class="col-md-12 col-sm-12">
                                <div class="form-group">
                                    <label>Current Password</label>
                                    <input type="text" class="form-control" name="currentpassword" required>
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12">
                                <div class="form-group">
                                    <label>New Password</label>
                                    <input type="text" class="form-control" name="newpassword" required>
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12">
                                <div class="form-group">
                                    <label>Confirm Password</label>
                                    <input type="text" class="form-control" name="confirmpassword" required>
                                </div>
                            </div>
                        </div>





                    </div>
                    <!--End step -->




                </div>
                <p class="text-center">
                    <input name="submit" type="submit" class="button" value="Update">
                </p>
            </div>
        </form>
    </div>
    <!-- End row -->
</div>
<!-- End container -->


<!-- SPECFIC SCRIPTS -->
<script src="js/icheck.min.js"></script>
<script>
    $('input.icheck').iCheck({
        checkboxClass: 'icheckbox_square-grey',
        radioClass: 'iradio_square-grey'
    });
</script>

<script type="text/javascript">
    function checkpass() {
        if (document.changepassword.newpassword.value != document.changepassword.confirmpassword.value) {
            alert('New Password and Confirm Password field does not match');
            document.changepassword.confirmpassword.focus();
            return false;
        }
        return true;
    }
</script>

<?php

include("base/footer.php");
?>