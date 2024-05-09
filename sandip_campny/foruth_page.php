<?php
include '../conn.php';
if(isset($_POST['checkboxname'])){
    $value=$_POST['checkboxname'];
    $valuestring = implode(",", $value);


    $sql="INSERT INTO `c_tast_data`(`name`) VALUES ('$valuestring')";

    $result=mysqli_query($con,$sql);
    
    if ($result) {
        echo "Success to insert";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page Number 4</title>
</head>
<body>
    <center>
        <h1>Submitted Values on Page 4</h1>
        <table border="10px">
            <thead>
            <th>Id</th>
            <th>Name</th>
        </thead>
        <tbody>
            <?php

                $sql="SELECT * FROM `c_tast_data`";
                $result=mysqli_query($con,$sql);
                $no=0;
                while ($row=mysqli_fetch_array($result)) {
                   $no+=1;
                    echo "<tr>
                    <td>".$no."</td>
                    <td>".$row['name']."</td>
                    </tr>";
                    
                }

           ?>
        </tbody>
    </table>
            </br>
    <button type="submit"><a href="index.php">Back To Page 1</a></button>
    </center>
</body>
</html>