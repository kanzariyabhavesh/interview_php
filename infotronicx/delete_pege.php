<?php
include '../conn.php';
$deleteid=$_GET["deleteid"];

$sql="DELETE FROM `form_data_infotronicx` WHERE id=$deleteid";
$result=mysqli_query($con,$sql);

if ($result) {
    header('location:form.php');
}

?>