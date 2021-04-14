<?php
ob_start();
$servername = "localhost";
$username = "id15869519_bits";
$password = "1b#sdjDgOe^7ydZ&Giq(";
$database = "id15869519_customers";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);
$user_name=mysqli_real_escape_string($conn,$_POST['name']);
$user_email=mysqli_real_escape_string($conn,$_POST['email']);
$user_bhawan=mysqli_real_escape_string($conn,$_POST['bhawan']);
$user_rno=mysqli_real_escape_string($conn,$_POST['roomno']);
$user_contact=(int)$_POST['phoneno'];
$user_dob=mysqli_real_escape_string($conn,$_POST['dob']);
$user_pass=mysqli_real_escape_string($conn,$_POST['psw']);
// Check connection
$user_pass=md5($user_pass);
if(mysqli_query($conn,"INSERT INTO User_info VALUES('".$user_name."','".$user_email."','".$user_bhawan."','".$user_rno."','".$user_contact."','".$user_dob."','".$user_pass."')"))
{
    if(!empty($_POST['remember']))
    {
        setcookie("id",$user_email);
        setcookie("name",$user_name);
        setcookie("phone",$user_contact);
        setcookie("pwd",$_POST['psw']);
    }
    header("Location: https://chapo-asap.000webhostapp.com/success.html");
    ob_end_flush();
    exit();
}
else
{
    header("/failure.html");
    ob_end_flush();
    exit();
}

?>