<?php
include 'conn.php';

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
if (isset($_POST['phone'])) {
$phonevalue=$_POST['phone'];
}
if (isset($_POST['Marks'])) {
$Marksvalue=$_POST['Marks'];
}
if (isset($_POST['Password'])) {
$passwordvalue=md5($_POST['Password']);
}
if (isset($_POST['gender'])) {
$gendervalue=$_POST['gender'];
}

if (isset($_POST['submit'])) {
    
    $sql="INSERT INTO `form_data`(`fname`,`lname`,`address`,`Gender`,`phone`,`email`,`password`,`Marks`) VALUES ('$fnamevalue','$lnamevalue','$addressvalue','$gendervalue',$phonevalue,'$emailvalue','$passwordvalue',$Marksvalue)";
   
    $result=mysqli_query($con,$sql);

    if ($result) {
       echo "success";  
       header("location:form.php");

    }
}
if (isset($_GET['delete'])) {
   $id=$_GET['id'];

   $sql="DELETE FROM `form_data` WHERE `id`=$id";
   
   $result=mysqli_query($con,$sql);

   if ($result) {
      header("location:form.php");

   }
}
if (isset($_POST['updete'])) {
   $id=$_POST['id'];

   $sql="UPDATE `form_data` SET `fname`='$fnamevalue',`lname`='$lnamevalue',`address`='$addressvalue',`Gender`='$gendervalue',`phone`='$phonevalue',`email`='$emailvalue',`password`='$passwordvalue',`Marks`=$Marksvalue  WHERE  `id`=$id";
   
   $result=mysqli_query($con,$sql);

   if ($result) {
      header("location:form.php");

   }

}
?>