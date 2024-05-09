<?php
include '../conn.php';
$id=$_POST['deleteid'];  

   $sql="DELETE FROM `a_form_data` WHERE `id`=$id";
   
   $result=mysqli_query($con,$sql);

//    if ($result) {



//    }
?>