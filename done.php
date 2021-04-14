<?php
ob_start();
$servername = "localhost";
$username = "id15869519_cash";
$password = "1b#sdjDgOe^7ydZ&Giq(";
$database = "id15869519_payment";
$key="nxjZV2Nml04uvvINJyP5m95S";
$conn = mysqli_connect($servername, $username, $password, $database);
echo "Fuckme";
echo $_POST['razorpay_order_id'];
if(isset($_POST['razorpay_order_id'])&&isset($_POST['razorpay_payment_id'])&&isset($_POST['razorpay_signature']))
{
    $pid=mysqli_real_escape_string($conn,$_POST['razorpay_payment_id']);
    $oid=mysqli_real_escape_string($conn,$_POST['razorpay_order_id']);
    $sign=mysqli_real_escape_string($conn,$_POST['razorpay_signature']);
    $id=$_COOKIE['order_id'];
    $check=hash_hmac('sha256',$id."|".$pid,$key);
    if($check===$sign)
    {
        if(mysqli_query($conn,"INSERT INTO orders VALUES('".$id."','".$pid."','".$sign."')"))
        {
            header("Location: https://chapo-asap.000webhostapp.com/pay_success.html");
            ob_end_flush();
            exit();
        }
    }
    
}
?>