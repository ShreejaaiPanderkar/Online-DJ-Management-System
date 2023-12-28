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

    $name = $_POST['name'];
    $mobile = $_POST['mobile'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $address = $_POST['address'];

    $sql = "update users set name=:name,mobile=:mobile,age=:age,gender=:gender,email=:email,address=:address where id=:userId";

    $query = $conn->prepare($sql);

    $query->bindParam(':userId', $userId, PDO::PARAM_STR);
    $query->bindParam(':name', $name, PDO::PARAM_STR);
    $query->bindParam(':mobile', $mobile, PDO::PARAM_STR);
    $query->bindParam(':age', $age, PDO::PARAM_STR);
    $query->bindParam(':gender', $gender, PDO::PARAM_STR);
    $query->bindParam(':email', $email, PDO::PARAM_STR);
    $query->bindParam(':address', $address, PDO::PARAM_STR);


    $query->execute();

    echo '<script>alert("Profile has been updated")</script>';
    echo "<script>window.location.href ='profile.php'</script>";
}
?>



<section class="parallax_window_in" data-parallax="scroll" data-image-src="pic/dj1.jpg" data-natural-width="1400" data-natural-height="420">
    <div id="sub_content_in">
        <h1>Profile</h1>
        <p>"All what needs to a traveler in Florence...Easly find places, guides, directions, info...."</p>
    </div>
    <!-- End sub_content -->
</section>
<!-- End section -->
<!-- End SubHeader ============================================ -->


<!--  End section-->

<div class="container margin_60_30">
    <div class="row">
        <?php

        $uid = $_SESSION['user_id'];

        $sql = "SELECT * from  users where id=:uid ";

        $query = $conn->prepare($sql);

        $query->bindParam(':uid', $uid, PDO::PARAM_STR);

        $query->execute();

        $results = $query->fetchAll(PDO::FETCH_OBJ);

        if ($query->rowCount() > 0) {
            foreach ($results as $result) {
        ?>
                <form method="post">
                    <div class="col-md-8 col-md-offset-2">
                        <div class="box_style_general">
                            <div class="form_title">
                                <h3>Your Details</h3>
                                <p>
                                    Update your profile.
                                </p>
                            </div>
                            <div class="step">
                                <div class="row">
                                    <div class="col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label>Name</label>
                                            <input type="text" class="form-control" name="name" value="<?php echo $result->name; ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label>Mobile</label>
                                            <input type="text" class="form-control" name="mobile" value="<?php echo $result->mobile; ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label>Age</label>
                                            <input type="text" class="form-control" name="age" value="<?php echo $result->age; ?>">
                                        </div>
                                    </div>

                                    <?php
                                    $sql1 = "SELECT * FROM `users`";
                                    $results1 = $conn->query($sql1);

                                    if ($results1->rowCount() > 0) {
                                    ?>
                                    <div class="col-md-6 col-sm-6">
                                    <div class="form-group">
                                                <label class="form-label" for="fv-topics">Gender</label>
                                                <div class="form-control-wrap ">

                                                    <select class="form-control form-select" name="gender" data-placeholder="Select Gender">
                                                        <option><?php echo htmlentities($result->gender); ?></option>
                                                        <?php
                                                        while ($row1 = $results1->fetch(PDO::FETCH_ASSOC)) {
                                                        ?>
                                                            <option><?php echo $row1['gender']; ?></option>
                                                        <?php

                                                        }
                                                        ?>
                                                    </select>

                                                </div>
                                            </div>
                                    </div>

                                    <?php
                                    }
                                    ?>



                                </div>

                                <div class="row">
                                    <div class="col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input type="text" class="form-control" name="email" value="<?php echo $result->email; ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label>Address</label>
                                            <input type="text" class="form-control" name="address" value="<?php echo $result->address; ?>">
                                        </div>
                                    </div>

                                </div>

                                <div class="row">

                                    <div class="col-md-12 col-sm-12">
                                        <div class="form-group">
                                            <label>Created Date</label>
                                            <input type="email" id="email_booking_2" class="form-control" name="createdDate" value="<?php echo $result->createdDate; ?>" readonly>
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
        <?php
            }
        }
        ?>
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

<?php

include("base/footer.php");
?>