<?php
session_start();
error_reporting(0);
if (isset($_SESSION['user_id'])) {
    include "base/header.php";
    include "admin/base/db.php";
} else {
    echo "<script> location.href = 'logout.php';</script>";
}

if (isset($_REQUEST['delete'])) {
    $ids = $_REQUEST['id'];
    $sql = "DELETE FROM booking WHERE id = $ids";
    $result = $conn->query($sql);
}
?>

<section class="parallax_window_in" data-parallax="scroll" data-image-src="pic/dj1.jpg" data-natural-width="1400" data-natural-height="420">
    <div id="sub_content_in">
        <h1>Booking History</h1>
        <p>All bookings history from your account</p>
    </div>
</section>


<!--  End section-->

<div class="container margin_60_30">
    <form>
        <div class="col-md-12 ">
            <div class="box_style_general">
                <div class="form_title">
                    <h3>Booking History</h3>
                   
                </div>
                <div class="step">
                    <div class="row">


                        <table class="table table-striped"  style="border: 1px solid #5cb85c;">
                            <thead class="thead-dark">

                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Booking No</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Amount</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Booking Date</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Payment Status</th>
                                    <th scope="col">Action</th>
                                </tr>


                            </thead>
                            <tbody>
                                <?php
                                $user_Id = $_SESSION['user_id'];

                                $sql = "SELECT users.name,users.mobile,users.email,booking.bookingId,booking.bookingDate,booking.status,booking.id,booking.paymentstatus,booking.payment,booking.amount from booking join users on users.id=booking.userId where booking.userId='$user_Id'";

                                $query = $conn->prepare($sql);

                                $query->execute();

                                $results = $query->fetchAll(PDO::FETCH_OBJ);

                                $cnt = 1;
                                if ($query->rowCount() > 0) {
                                    foreach ($results as $result) {
                                ?>
                                        <tr>
                                            <td><?php echo htmlentities($cnt); ?></td>
                                            <td><?php echo htmlentities($result->bookingId); ?></td>
                                            <td><?php echo htmlentities($result->name); ?></td>
                                            <td><?php echo htmlentities($result->amount); ?></td>
                                            <td><?php echo htmlentities($result->email); ?></td>
                                            <td><?php echo htmlentities($result->bookingDate); ?></td>
                                            <?php if ($result->status == "") { ?>
                                                <td><span class="badge badge-danger"><?php echo "Pending"; ?></span></td>
                                            <?php } else { ?>
                                                <td>
                                                    <span class="badge badge-primary"><?php echo htmlentities($result->status); ?></span>
                                                </td>
                                            <?php } ?>
                                            <?php if ($result->paymentstatus == 0) { ?>
                                                <td><span class="badge badge-danger"><?php echo "Not Eligible"; ?></span></td>
                                            <?php } else { ?>
                                                <td>
                                                    <span class="badge badge-primary">
                                                        <?php echo "Eligible"; ?>
                                                    </span>
                                                    <?php if ($result->payment == 0) { ?>
                                                          <a style="margin: 1rem;" class="btn btn-danger  btn-md" href="checkout.php?editid=<?php echo htmlentities($result->id); ?>&&bookingid=<?php echo htmlentities($result->bookingId); ?>&&amount=<?php echo htmlentities($result->amount); ?>&&mobile=<?php echo htmlentities($result->mobile); ?>&&email=<?php echo htmlentities($result->email); ?>">Payment Incomplete</a>
                                                    <?php } else { ?>
                                                          <a style="margin: 1rem;" class="btn btn-success  btn-md" href="view-booking-details.php?editid=<?php echo htmlentities($result->id); ?>&&bookingid=<?php echo htmlentities($result->bookingId); ?>">Payment Completed - View Reciept</a>
                                                    <?php } ?>
                                                </td>
                                            <?php } ?>
                                            <td>
                                                <a class="btn btn-success  btn-md" href="view-booking-details.php?editid=<?php echo htmlentities($result->id); ?>&&bookingid=<?php echo htmlentities($result->bookingId); ?>"><i class="icon-eye text-white"></i></a>
                                            </td>
                                        </tr>
                                <?php
                                        $cnt = $cnt + 1;
                                    }
                                }
                                ?>

                            </tbody>
                        </table>



                    </div>


                </div>
                <!--End step -->


            </div>

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

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<?php

include("base/footer.php");
?>