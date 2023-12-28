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

    $bookingId = mt_rand(100000000, 999999999);
    $event_bookId = $_GET['bookid'];
    $amount = $_GET['amount'];
    $user_id = $_SESSION['user_id'];
    
    $eventName = $_POST['eventName'];
    $numberOfGuest = $_POST['numberOfGuest'];
    $bookingFrom = $_POST['bookingFrom'];
    $bookingTo = $_POST['bookingTo'];
    $place = $_POST['place'];
    $message = $_POST['message'];
    $paymentstatus = 0;
    $payment = 0;
    

    $sql = "insert into booking(bookingId,eventId,userId,eventName,numberOfGuest,bookingFrom,bookingTo,place,message,paymentstatus,payment,amount)
                   values(:bookingId,:event_bookId,:user_id,:eventName,:numberOfGuest,:bookingFrom,:bookingTo,:place,:message,:paymentstatus,:payment,:amount)";


    $query = $conn->prepare($sql);

    $query->bindParam(':bookingId', $bookingId, PDO::PARAM_STR);
    $query->bindParam(':event_bookId', $event_bookId, PDO::PARAM_STR);

    $query->bindParam(':user_id', $user_id, PDO::PARAM_STR);

    $query->bindParam(':eventName', $eventName, PDO::PARAM_STR);
    $query->bindParam(':numberOfGuest', $numberOfGuest, PDO::PARAM_STR);
    $query->bindParam(':bookingFrom', $bookingFrom, PDO::PARAM_STR);
    $query->bindParam(':bookingTo', $bookingTo, PDO::PARAM_STR);
    $query->bindParam(':place', $place, PDO::PARAM_STR);
    $query->bindParam(':message', $message, PDO::PARAM_STR);
    $query->bindParam(':paymentstatus', $paymentstatus, PDO::PARAM_STR);
    $query->bindParam(':payment', $payment, PDO::PARAM_STR);
    $query->bindParam(':amount', $amount, PDO::PARAM_STR);

    $query->execute();

    $LastInsertId = $conn->lastInsertId();

    if ($LastInsertId > 0) {
        echo '<script>alert("Your Booking Request Has Been Send, Confirm the payment after confirmation from ODJMS")</script>';
        echo "<script>window.location.href ='booking-history.php'</script>";
    } else {
        echo '<script>alert("Something Went Wrong. Please try again")</script>';
    }
}
?>



<!-- SubHeader =============================================== -->
<section class="parallax_window_in" data-parallax="scroll" data-image-src="pic/dj1.jpg" style="background-color: black !important; " data-natural-width="1400" data-natural-height="420">
    <div id="sub_content_in">
        <h1>Order Details</h1>
        <p>
            
        </p>
    </div>
    <!-- End sub_content -->
</section>
<!-- End section -->
<!-- End SubHeader ============================================ -->

<div id="position">
    <div class="container">
        <ul>
            <li><a href="#">Home</a>
            </li>
            <li><a href="#">Category</a>
            </li>
            <li>Page active</li>
        </ul>
    </div>
</div>
<!-- End position -->

<div class="container margin_60_30">
    <div class="row">

        <div class="col-md-12">
            <div class="box_style_general">
                <div class="indent_title_in">
                    <i class="icon_pencil-edit"></i>
                    <h3>Enter Details</h3>
                    <p>
                        Mussum ipsum cacilds, vidis litro abertis.
                    </p>
                </div>
                <div class="wrapper_indent">
                    <div id="message-contact"></div>
                    <form method="post">
                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <label>Event Name</label>
                                <div class="form-group">
                                    <select class="form-control" name="eventName" required>
                                        <option>Select</option>
                                        <?php

                                        $sql2 = "SELECT * from event ";
                                        $query2 = $conn->prepare($sql2);
                                        $query2->execute();
                                        $result2 = $query2->fetchAll(PDO::FETCH_OBJ);

                                        foreach ($result2 as $row) {
                                        ?>
                                            <option value="<?php echo htmlentities($row->eventName); ?>"><?php echo htmlentities($row->eventName); ?></option>

                                        <?php } ?>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6 col-sm-6">
                                <div class="form-group">
                                    <label>Number of Guest</label>
                                    <input type="text" class="form-control styled" id="name_contact" name="numberOfGuest">
                                </div>
                            </div>



                        </div>
                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <div class="form-group">
                                    <label>Booking From</label>
                                    <input type="text" class="form-control styled" id="datetimepicker1" placeholder="dd-mm-yy" min="2023-04-13" name="bookingFrom">
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <div class="form-group">
                                    <label>Booking To</label>
                                    <input type="text" class="form-control styled" id="datetimepicker2" placeholder="dd-mm-yy" min="2023-04-13" name="bookingTo">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                        <div class="col-md-12 col-sm-12">
                                <div class="form-group">
                                    <label>Place</label>
                                    <input type="text" class="form-control styled" name="place">
                                </div>
                            </div>
                            </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Your message</label>
                                    <textarea rows="5" id="message_contact" name="message" class="form-control styled" style="height:100px;" placeholder="Your message"></textarea>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-12">
                                <input type="submit" name="submit" value="Make Payment" class="button add_bottom_30 btn-lg btn-block" id="submit-contact" />
                            </div>
                        </div>
                    </form>
                </div>
                <!-- End wrapper_indent -->
            </div>
            <!-- End box style 1-->
        </div>
        <!-- End col lg 9 -->

        <!--End aside -->
    </div>
    <!-- End row -->
</div>
<!-- End container -->

<!-- end map-->
<link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>


<script type="text/javascript">
    $(function() {
        $('#datetimepicker1').datepicker({
            dateFormat: "yy-mm-dd"
        }).val();
    });

    $(function() {
        $('#datetimepicker2').datepicker({
            dateFormat: "yy-mm-dd"
        }).val();
    });
</script>


<!-- Footer ================================================== -->
<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-sm-12">
                <h3>About us</h3>
                <p>Dolorem nusquam molestie ut mei, ut sit dico omnis. Cu quod congue has, at sumo esse viderer mea. Id assum saperet definitiones qui.</p>
                <p><img src="img/logo_2.png" alt="img" class="hidden-xs" width="170" height="30" data-retina="true">
                </p>
            </div>
            <div class="col-md-3 col-sm-4">
                <h3>About</h3>
                <ul>
                    <li><a href="#0">About us</a>
                    </li>
                    <li><a href="#0">Faq</a>
                    </li>
                    <li><a href="#0">Contacts</a>
                    </li>
                    <li><a href="#0">Login</a>
                    </li>
                    <li><a href="#0">Register</a>
                    </li>
                    <li><a href="#0">Terms and conditions</a>
                    </li>
                </ul>
            </div>
            <div class="col-md-3 col-sm-4" id="newsletter">
                <h3>Newsletter</h3>
                <p>
                    Join our newsletter to keep be informed about offers and news.
                </p>
                <div id="message-newsletter_2">
                </div>
                <form method="post" action="assets/newsletter.php" name="newsletter_2" id="newsletter_2">
                    <div class="form-group">
                        <input name="email_newsletter_2" id="email_newsletter_2" type="email" value="" placeholder="Your mail" class="form-control">
                    </div>
                    <p>
                        <input type="submit" value="Subscribe" class="button" id="submit-newsletter_2">
                    </p>
                </form>
            </div>
            <div class="col-md-2 col-sm-4">
                <h3>Settings</h3>
                <div class="styled-select">
                    <select class="form-control" name="lang" id="lang">
                        <option value="English" selected>English</option>
                        <option value="French">French</option>
                        <option value="Spanish">Spanish</option>
                        <option value="Russian">Russian</option>
                    </select>
                </div>
            </div>
        </div>
        <!-- End row -->
        <hr>
        <div class="row">
            <div class="col-sm-6">
                © ODJMS 2023 - All Rights Reserved
            </div>
            <div class="col-sm-6">
                <div id="social_footer">
                    <ul>
                        <li><a href="#0"><i class="icon-facebook"></i></a>
                        </li>
                        <li><a href="#0"><i class="icon-twitter"></i></a>
                        </li>
                        <li><a href="#0"><i class="icon-google"></i></a>
                        </li>
                        <li><a href="#0"><i class="icon-instagram"></i></a>
                        </li>
                        <li><a href="#0"><i class="icon-pinterest"></i></a>
                        </li>
                    </ul>

                </div>
            </div>
        </div>
        <!-- End row -->
    </div>
    <!-- End container -->
</footer>
<!-- End Footer =============================================== -->

<!-- COMMON SCRIPTS -->
<script src="js/common_scripts_min.js"></script>
<script src="assets/validate.js"></script>
<script src="js/functions.js"></script>

<!-- Specific scripts -->
<script src="layerslider/js/greensock.js"></script>
<script src="layerslider/js/layerslider.transitions.js"></script>
<script src="layerslider/js/layerslider.kreaturamedia.jquery.js"></script>
<script src="js/infobox.js"></script>
</body>

</html>