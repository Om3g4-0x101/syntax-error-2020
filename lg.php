<?php
ob_start();
$servername = "localhost";
$username = "id15869519_bits";
$password = "1b#sdjDgOe^7ydZ&Giq(";
$database = "id15869519_customers";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);
if(isset($_POST['email'])&& isset($_POST['psw']))
{
    $email=mysqli_real_escape_string($conn,$_POST['email']);
    $pass=$_POST['psw'];
    $pass=md5($pass);
    $result=mysqli_query($conn, "SELECT Password FROM User_info WHERE Email='".$email."'LIMIT 1");
        if(mysqli_num_rows($result)>0)
        {
            $row = mysqli_fetch_assoc($result);
            $check=$row["Password"];
        }
    if($pass===$check)
    {
        setcookie("id",$email);
        setcookie("pwd",$POST['psw']);
        setcookie("name",$user_name);
        setcookie("phone",$user_contact);
        header("Location:https://chapo-asap.000webhostapp.com/index2.html");
        ob_end_flush();
        exit();
    }else
    {
        header("Location:https://chapo-asap.000webhostapp.com/login.php");
        ob_end_flush();
        exit();
    }
}