<?php
include 'conn.php';
$passwordvalue='';
session_start();
if (isset($_POST['email'])) {
$emailvalue=$_POST['email'];
}

if (isset($_POST['Password'])) {
$passwordvalue=md5($_POST['Password']);
}

if (isset($_POST['login'])) { 
    

$sql="SELECT 'email','password' FROM `form_data` where `email`='$emailvalue' And `password`='$passwordvalue'";

$result=mysqli_query($con,$sql);
$row=mysqli_num_rows($result);

if ($row ==1) {
    
    header("location:page.php");
}
else{
    header("location:login.php");
}
}

?>