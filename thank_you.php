<?php
include "admin/base/db.php";
$editid = $_GET['editid'];
$bookingid = $_GET['bookingid'];
$amount = $_GET['amount'];
$finalamt = $amount;

$payment = 1;
$sql = "update booking set payment=:payment where id=:editid";

$query = $conn->prepare($sql);
        
$query->bindParam(':editid', $editid, PDO::PARAM_STR);
$query->bindParam(':payment', $payment, PDO::PARAM_STR);
$query->execute();
?>

<h1>Payment Complete</h1>
<h1>Edit ID : <?php echo $editid;?></h1>
<h1>Booking ID : <?php echo $bookingid;?></h1>
<h1>Amount : <?php echo $finalamt;?></h1>
<h3>Your payment status has been changed..!</h3>
<a href="https://projectfinal08.000webhostapp.com/view-booking-details.php?editid=<?php echo $editid; ?>&&bookingid=<?php echo $bookingid; ?>">view reciept</a><br>


