<?php
ob_start();
$url='https://api.razorpay.com/v1/orders';
$money=(int)$_POST['cash'];
//The data you want to send via POST
$fields = array(
    'amount' => $money,
    "currency" => "INR",
    "receipt" => "rcptid_12345"
);

//url-ify the data for the POST
$fields_string = http_build_query($fields);
//echo $fields_string;
//open connection
$ch = curl_init();

//set the url, number of POST vars, POST data
curl_setopt($ch,CURLOPT_URL, $url);
curl_setopt($ch,CURLOPT_POST, true);
curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);
$headers = array(
    'content-type:application/x-www-form-urlencoded',
    'Authorization:Basic cnpwX3Rlc3RfYWRPTFN4R25uWlk4YU86bnhqWlYyTm1sMDR1dnZJTkp5UDVtOTVT',
);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);


//So that curl_exec returns the contents of the cURL; rather than echoing it
curl_setopt($ch,CURLOPT_RETURNTRANSFER, true); 

//execute post
$result=curl_exec($ch);
$data=json_decode($result);
setcookie("order_id",$data->id);
header("Location:https://chapo-asap.000webhostapp.com/finalpay.html");
ob_end_flush();
exit();
?>