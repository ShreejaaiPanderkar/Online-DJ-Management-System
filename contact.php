<?php
include "base/header.php";
include "admin/base/db.php";

if (isset($_POST['submit'])) {


    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];


    $sql = "insert into contact(fname,lname,email,phone,subject,message)values(:fname,:lname,:email,:phone,:subject,:message)";

    $query = $conn->prepare($sql);

    $query->bindParam(':fname', $fname, PDO::PARAM_STR);
    $query->bindParam(':lname', $lname, PDO::PARAM_STR);
    $query->bindParam(':email', $email, PDO::PARAM_STR);
    $query->bindParam(':phone', $phone, PDO::PARAM_STR);
    $query->bindParam(':subject', $subject, PDO::PARAM_STR);
    $query->bindParam(':message', $message, PDO::PARAM_STR);


    $query->execute();
}
?>

<!-- SubHeader =============================================== -->
<section class="parallax_window_in" data-parallax="scroll" data-image-src="pic/dj1.jpg" data-natural-width="1400" data-natural-height="420">
    <div id="sub_content_in">
        <h1>Contact info</h1>
        <p>
            "Message for any query."
        </p>
    </div>
    <!-- End sub_content -->
</section>
<!-- End section -->
<!-- End SubHeader ============================================ -->

<div id="position">
    <div class="container">
        <ul>
            <li><a href="index.php">Home</a>
            </li>
            <li><a href="events.php">Events</a>

        </ul>
    </div>
</div>
<!-- End position -->

<div class="container margin_60_30">
    <div class="row">

        <div class="col-md-9">
            <div class="box_style_general">
                <div class="indent_title_in">
                    <i class="icon_pencil-edit"></i>
                    <h3>Contact us</h3>
                    <p>
                        Mussum ipsum cacilds, vidis litro abertis.
                    </p>
                </div>
                <div class="wrapper_indent">
                    <div id="message-contact"></div>
                    <form method="post">
                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" class="form-control styled" name="fname" placeholder="First name">
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <div class="form-group">
                                    <label>Last name</label>
                                    <input type="text" class="form-control styled" name="lname" placeholder="Last name">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" name="email" class="form-control styled" placeholder="Enter Email">
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <div class="form-group">
                                    <label>Phone number</label>
                                    <input type="text" name="phone" class="form-control styled" placeholder="Phone number">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 col-sm-12">
                                <div class="form-group">
                                    <label>Subject</label>
                                    <input type="text" name="subject" class="form-control styled" placeholder="Phone number">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Your message</label>
                                    <textarea rows="5" name="message" class="form-control styled" style="height:100px;" placeholder="Your message"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">

                            <input type="submit" name="submit" value="Submit" class="button add_bottom_30" id="submit-contact" />
                        </div>
                    </form>
                </div>
                <!-- End wrapper_indent -->
            </div>
            <!-- End box style 1-->
        </div>
        <!-- End col lg 9 -->
        <aside class="col-md-3">
            <h4>Contacts info</h4>
            <p>
                11 Fifth Ave - kalwa, kharigaon , India
                <br> + 77 (7) 7777 7777 / + 77 (77) 7777 7777
                <br>
                <a href="#">odjms system</a></a>
            </p>

            <hr class="styled">
            <h4>Departmens</h4>
            <ul class="contacts_info">
                <li><strong>Administration</strong>
                    <br>
                    <a href="tel://7777777777">7777 777777</a> - <a href="">Odjms </a>
                    <br>
                    <small>Monday to Friday 9am - 7pm</small>
                </li>
                <li><strong>General questions</strong>
                    <br>
                    <a href="tel://6666666666">6666 666666</a> - <a href="">Odjms</a>
                    <br>
                    <small>Monday to Friday 9am - 7pm</small>
                </li>
            </ul>
        </aside>
        <!--End aside -->
    </div>
    <!-- End row -->
</div>
<!-- End container -->


<div class="mapss">
    <!--<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d115132.8610723513!2d85.07300191831742!3d25.608175570492524!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39f29937c52d4f05%3A0x831a0e05f607b270!2sPatna%2C%20Bihar!5e0!3m2!1sen!2sin!4v1658949580168!5m2!1sen!2sin" width="800" height="600" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>-->
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d60285.6757321797!2d72.9675913772666!3d19.201546175979985!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be7bed3723be9b1%3A0x1c65fa2bfeabacc4!2sKalwa%2C%20Thane%2C%20Maharashtra!5e0!3m2!1sen!2sin!4v1680432525755!5m2!1sen!2sin" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
</div>
<?php

include("base/footer.php");
?>