<?php
include "admin/base/db.php";
$editid = $_GET['editid'];
$bookingid = $_GET['bookingid'];

$amount = $_GET['amount'];
$finalamt = $amount*100;

$mobile = $_GET['mobile'];
$email = $_GET['email'];
?>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<form>
    <h2>Payment using razorpay gateway</h2>
    <input type="textbox" name="amt" id="amt" value="<?php echo $amount; ?>" readonly/><br/><br/>
    <input type="button" name="btn" id="btn" value="Pay Now" onclick="pay_now()"/>
</form>

<script>
    function pay_now(){
        var name=jQuery('#name').val();
        var amt=jQuery('#amt').val();
        
         jQuery.ajax({
               type:'post',
               url:'payment_process.php',
               data:"amt="+amt,
               success:function(result){
                   var options = {
                        "key": "rzp_test_km0JLakWJXPC5P", 
                        "amount": amt*100, 
                        "currency": "INR",
                        "name": "ODJMS Managment",
                        "description": "<?php echo $bookingid; ?>",
                        "image": "https://image.freepik.com/free-vector/logo-sample-text_355-558.jpg",
                        "prefill":
                        {
                          "email": "<?php echo $email; ?>",
                          "contact": <?php echo $mobile; ?>,
                        },
                        "handler": function (response){
                           jQuery.ajax({
                               type:'post',
                               url:'payment_process.php',
                               data:"payment_id="+response.razorpay_payment_id,
                               success:function(result){
                                   window.location.href="thank_you.php?editid=<?php echo $editid; ?>&&bookingid=<?php echo $bookingid; ?>&&amount=<?php echo $amount; ?>";
                               }
                           });
                        }
                    };
                    var rzp1 = new Razorpay(options);
                    rzp1.open();
               }
           });
        
        
    }
</script>