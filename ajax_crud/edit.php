<?php
include '../conn.php';
$id=$_POST['editid'];  

   $sql="SELECT * FROM `a_form_data` WHERE `id`=$id";
   
   $result=mysqli_query($con,$sql);

   $rows = array();
while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
}

echo json_encode($rows);

?>