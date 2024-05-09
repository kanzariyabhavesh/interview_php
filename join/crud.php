<?php
include '../conn.php';

if (isset($_POST['fname'])) {
$fnamevalue=$_POST['fname'];
}
if (isset($_POST['lname'])) {
$lnamevalue=$_POST['lname'];
}
if (isset($_POST['email'])) {
$emailvalue=$_POST['email'];
}
if (isset($_POST['address'])) {
$addressvalue=$_POST['address'];
}

if (isset($_POST['Password'])) {
$passwordvalue=md5($_POST['Password']);
}
if (isset($_POST['gender'])) {
$gendervalue=$_POST['gender'];
}

if (isset($_POST['submit'])) {
    
    $sql="INSERT INTO `form1_data`(`fname`,`lname`,`address`,`Gender`,`email`,`password`) VALUES ('$fnamevalue','$lnamevalue','$addressvalue','$gendervalue','$emailvalue','$passwordvalue')";
   
    $result=mysqli_query($con,$sql);

    if ($result) {
       echo "success";  
       header("location:form1.php");

    }
}
if (isset($_GET['delete'])) {
   $id=$_GET['id'];

   $sql="DELETE FROM `form1_data` WHERE `id`=$id";
   
   $result=mysqli_query($con,$sql);

   if ($result) {
      header("location:form1.php");

   }
}
if (isset($_POST['updete'])) {
   $id=$_POST['id'];

   $sql="UPDATE `form1_data` SET `fname`='$fnamevalue',`lname`='$lnamevalue',`address`='$addressvalue',`Gender`='$gendervalue',`email`='$emailvalue',`password`='$passwordvalue'  WHERE  `id`=$id";
   
   $result=mysqli_query($con,$sql);

   if ($result) {
      header("location:form1.php");

   }

}
?>