<?php
include '../conn.php';

if (isset($_POST['submit'])) {

    $sql="INSERT INTO `form_data_infotronicx`(`fristname`, `email`, `contry`, `city`,`date`) VALUES ('$_POST[fname]','$_POST[email]','$_POST[contry]','$_POST[city]','$_POST[date]')";

    $result=mysqli_query($con,$sql);

    if ($result) {
        header('location:form.php');
    }

}
if (isset($_POST['update'])) {
    
    $sql="UPDATE `form_data_infotronicx` SET `fristname`='$_POST[fname]',`email`='$_POST[email]',`contry`='$_POST[contry]',`city`='$_POST[city]',`date`='$_POST[date]' WHERE id=$_POST[hiddenid]";

    $result =mysqli_query($con,$sql);

    if ($result) {
        header('location:form.php');
    }
}

?>
