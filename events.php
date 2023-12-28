<?php
    include "base/header.php";
    include "admin/base/db.php";
?>

    <!-- SubHeader =============================================== -->
    <section class="parallax_window_in" data-parallax="scroll" data-image-src="pic/dj1.jpg" data-natural-width="1400" data-natural-height="420">
        <div id="sub_content_in">
            <h1>All Events</h1>
            <p>
                "All Dj provider and their rates"
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
            <aside class="col-md-3 col-md-push-9" id="sidebar">

                <!--End sticky -->
            </aside>
            <!--End aside -->

            <div class="col-md-12 ">

                <?php
                $sql = "SELECT * from services";
                $query = $conn->prepare($sql);
                $query->execute();
                $results = $query->fetchAll(PDO::FETCH_OBJ);

                if ($query->rowCount() > 0) {
                    foreach ($results as $row) {
                ?>
                        <div class="strip_list wow fadeIn" data-wow-delay="0.1s">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="img_wrapper">
                                        <div class="ribbon">
                                            <span>Best Price</span>
                                        </div>

                                        <!-- End tools i-->
                                        <div class="img_container">
                                            <a href="booking-details.php?bookid=<?php echo $row->id; ?>">
                                                <img src="admin/image/<?php echo htmlentities($row->imagename); ?>" width="800" height="533" class="img-responsive" alt="">
                                                <div class="short_info">
                                                    <h3><?php echo htmlentities($row->serviceName); ?></h3>

                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <!--End img_wrapper-->
                                </div>
                                <div class="col-sm-6">
                                    <div class="desc">
                                        <h4><?php echo htmlentities($row->serviceName); ?></h4>
                                        <p>
                                            <?php echo htmlentities($row->servicDescription); ?>
                                        </p>
                                        <p class="btn btn-warning medium btn-lg btn-block"> ₹ <?php echo htmlentities($row->servicePrice); ?> </p>
                                        <br><br>

                                        <?php if ($_SESSION['user_id'] == "") { ?>
                                            <center>
                                                <a type="submit" href="login.php" class="btn btn-success btn-lg">Book</a>
                                            </center>
                                        <?php } else { ?>
                                            <center>
                                                <a type="submit" href="booking-services.php?bookid=<?php echo $row->id; ?>&&amount=<?php echo $row->servicePrice; ?>" class="btn btn-success btn-lg">Book</a>
                                            </center>
                                        <?php } ?>

                                    </div>
                                </div>
                            </div>

                            <!--End row -->
                        </div>
                        <!--End strip -->
                <?php
                    }
                } ?>

                <!--End strip -->
            </div>
            <!-- End col lg 9 -->
        </div>
        <!-- End Row-->
    </div>
    <!-- End container -->

    <?php

    include("base/footer.php");
    ?>

    <!-- COMMON SCRIPTS -->
    <script src="js/jquery-2.2.4.min.js"></script>
    <script src="js/common_scripts_min.js"></script>
    <script src="assets/validate.js"></script>
    <script src="js/functions.js"></script>

    <!-- SPECIFIC SCRIPTS -->
    <script src="js/raphael-2.1.4.min.js"></script>
    <script src="js/justgage.min.js"></script>
    <script src="js/score.js"></script>
    <script src="js/ion.rangeSlider.min.js"></script>
    <script src="js/switchery.min.js"></script>

    <!-- Fixed sidebar + Input Range + Carouse + Switch-->
    <script src="js/theia-sticky-sidebar.min.js"></script>
    <script>
        'use strict';
        jQuery('#sidebar').theiaStickySidebar({
            additionalMarginTop: 80
        });

        $("#range").ionRangeSlider({
            hide_min_max: true,
            keyboard: true,
            min: 30,
            max: 180,
            from: 60,
            to: 130,
            type: 'double',
            step: 1,
            prefix: "Min. ",
            grid: false
        });

        $('.carousel').owlCarousel({
            items: 1,
            loop: true,
            autoplay: false,
            smartSpeed: 300,
            responsiveClass: true,
            responsive: {
                320: {
                    items: 2,
                    margin: 10,
                },
                1000: {
                    items: 6,
                    margin: 10,
                    nav: false
                }
            }
        });

        var elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));
        elems.forEach(function(html) {
            var switchery = new Switchery(html, {
                size: 'small'
            });
        });
    </script>
</body>


</html>