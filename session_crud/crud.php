<?php

session_start();
include '../conn.php';

if (isset($_GET['deleteid'])) {
   $id=$_GET['deleteid'];

   $sql="DELETE FROM `s_form_data` WHERE `id`=$id";
   
   $result=mysqli_query($con,$sql);

   if ($result) {
      header("location:form3.php");

   }
}
else{

$editid=$_POST['hidden'];
$fnamevalue=$_POST['fname'];
$lnamevalue=$_POST['lname'];
$emailvalue=$_POST['email'];
$addressvalue=$_POST['address'];
$phonevalue=$_POST['phone'];
$Marksvalue=$_POST['Marks'];
$passwordvalue=$_POST['password'];
$gendervalue=$_POST['Gender'];


if ($fnamevalue == "") {
   $error['fname'] = "Please enter a Frist Name";
}
if ($lnamevalue == "") {
   $error['lname'] = "Please enter a Last Name";
}
if ($emailvalue == "") {
   $error['email'] = "Please enter a E-mail";
}
if ($addressvalue == "") {
   $error['address'] = "Please enter a Address";
}
if ($phonevalue == "") {
   $error['phone'] = "Please enter a Phone Number";
}
if ($Marksvalue == "") {
   $error['marks'] = "Please enter a Marks";
}
if ($passwordvalue == "") {
   $error['password'] = "Please enter a password";
}
if ($gendervalue == "") {
   $error['Gender'] = "Please select a Gender";
}

if (!empty($error)) {
   
   $_SESSION['error'] = $error;
   $_SESSION['value'] = $_POST;

   header('location:form3.php?updetaid='.$editid.'');
   
}
else {

if (isset($_POST['submit'])) {
    
    $sql="INSERT INTO `s_form_data`(`fname`,`lname`,`address`,`Gender`,`phone`,`email`,`password`,`Marks`) VALUES ('$fnamevalue','$lnamevalue','$addressvalue','$gendervalue',$phonevalue,'$emailvalue','$passwordvalue',$Marksvalue)";
   
    $result=mysqli_query($con,$sql);
      session_destroy();
    if ($result) {
       echo "success";  
       header("location:form3.php");

    }
}

if (isset($_POST['updete'])) {

   $sql="UPDATE `s_form_data` SET `fname`='$fnamevalue',`lname`='$lnamevalue',`address`='$addressvalue',`Gender`='$gendervalue',`phone`='$phonevalue',`email`='$emailvalue',`password`='$passwordvalue',`Marks`=$Marksvalue  WHERE  `id`=$editid";
   
   $result=mysqli_query($con,$sql);

   if ($result) {
      header("location:form3.php");

   }

}
}
}
?>