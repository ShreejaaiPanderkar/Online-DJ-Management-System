<?php

session_start();
error_reporting(0);
if (isset($_SESSION['user_id'])) {
    include "base/header.php";
    include "admin/base/db.php";
} else {
    echo "<script> location.href = 'logout.php';</script>";
}


          $editid = $_GET['editid'];

          $sql = "SELECT users.name,users.mobile,users.age,users.gender,users.email,users.address,booking.bookingId,booking.eventName,booking.numberOfGuest,booking.bookingFrom,booking.bookingTo,booking.place,booking.message,booking.bookingDate,booking.remark,booking.status,booking.postDate,   services.serviceName,services.servicePrice,services.servicDescription from booking join services on booking.eventId=services.id join users on users.id=booking.userId  where booking.id=:editid";

          $query = $conn->prepare($sql);

          $query->bindParam(':editid', $editid, PDO::PARAM_STR);

          $query->execute();

          $results = $query->fetchAll(PDO::FETCH_OBJ);


          if ($query->rowCount() > 0) {
            foreach ($results as $row) {
          ?>
              <table class="table table-bordered table-striped ">
                <tr style="background-image: linear-gradient(#0b92b1,#841caf);">
                  <th colspan="5" style="text-align: center;font-size: 19px;color: #ffffff; padding-top: 5rem;">Booking Number: <?php echo $row->bookingId; ?></th>
                </tr>
                <tr>
                  <th> Name</th>
                  <td><?php echo $row->name; ?></td>
                  <th>Mobile</th>
                  <td><?php echo $row->mobile; ?></td>
                </tr>


                <tr>
                  <th>Age</th>
                  <td><?php echo $row->age; ?></td>
                  <th>Gender</th>
                  <td><?php echo $row->gender; ?></td>
                </tr>

                <tr>
                  <th>Email</th>
                  <td><?php echo $row->email; ?></td>
                  <th>Address</th>
                  <td><?php echo $row->address; ?></td>
                </tr>

                <tr>
                  <th>Event Name</th>
                  <td><?php echo $row->eventName; ?></td>
                  <th>No Of Guest</th>
                  <td><?php echo $row->numberOfGuest; ?></td>
                </tr>
                <tr>

                  <th>Booking From</th>
                  <td><?php echo $row->bookingFrom; ?></td>
                  <th>Booking To</th>
                  <td><?php echo $row->bookingTo; ?></td>
                </tr>

                <tr>
                  <th>Place</th>
                  <td><?php echo $row->place; ?></td>
                  <th>Message</th>
                  <td><?php echo $row->message; ?></td>
                </tr>

                <tr>
                  <th>Service Name</th>
                  <td><?php echo $row->serviceName; ?></td>
                  <th>Service Price</th>
                  <td>₹<?php echo $row->servicePrice; ?></td>
                </tr>

                <tr>
                  <th>Service Description</th>
                  <td><?php echo $row->servicDescription; ?></td>
                  <th>Booking Date</th>
                  <td><?php echo $row->bookingDate; ?></td>
                </tr>


                <th>Order Final Status</th>

                <td>
                  <?php
                  $status = $row->status;

                  if ($row->status == "Approved") {
                    echo "Approved";
                  }

                  if ($row->status == "Cancelled") {
                    echo "Cancelled";
                  }


                  if ($row->status == "") {
                    echo "Not Responsed";
                  };
                  ?>
                </td>

                <th>Admin Remark</th>
                <?php if ($row->status == "") { ?>

                  <td><?php echo "Not Updated"; ?></td>
                <?php } else { ?>
                  <td><?php echo htmlentities($row->remark); ?></td>
                <?php } ?>
                </tr>




              </table>
<?php
            }
          }
?>