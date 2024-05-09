<?php
include '../conn.php';
$error=array();
$result=false;
$error['name']='';
$error['email']='';
$error['address']='';
$error['phone']='';
$error['city']='';
$error['gender']='';
$error['updeteid']='';

$name=$_POST['name'];
$email=$_POST['email'];
$address=$_POST['address'];
$phone=$_POST['phone'];
$city=$_POST['city'];
$gender = isset($_POST['gender']) ? $_POST['gender'] : '';
$updeteid=isset($_POST['updeteid']) ? $_POST['updeteid'] : '';

if ($name == "") {
    $error['name'] .= "Please enter a name";
}
if ($email == "") {
    $error['email'] .= "Please enter a email";
}
if ($address == "") {
    $error['address'] .= "Please enter a address";
}
if ($phone == "") {
    $error['phone'] .= "Please enter a phone";
}
if ($city == "") {
    $error['city'] .= "Please select a city";
}
if ($gender == "") {
    $error['gender'] .= "Please select a gender";
}
if ($updeteid != "") {
    $error['updeteid'] .= $updeteid;
}

if ($error['name'] != "" || $error['email'] != "" || $error['address'] !="" || $error['phone'] !="" ||$error['city'] != "" || $error['gender'] != "" ) {

  echo json_encode($error);
    $result=false;
}
else{

if (isset($_POST['submit'])) {

    $sql="INSERT INTO `a_form_data`(`name`, `email`, `address`, `phone`, `city`, `gender`) VALUES ('$name','$email','$address','$phone','$city','$gender')";

    $results=mysqli_query($con,$sql);

    if ($results) {
        $result=true;
        echo $result;
    }

    
}

if (isset($_POST['updete'])) {

    $sql="UPDATE `a_form_data` SET `name`='$name',`email`='$email',`address`='$address',`phone`='$phone',`city`='$city',`gender`='$gender' WHERE `id`=$updeteid";

    $result=mysqli_query($con,$sql);
 
    if ($result) {
        $result=true;
        echo $result;
    }
}

}

?>