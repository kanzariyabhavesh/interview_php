<?php
include '../conn.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <center>
    <h1>All Data</h1>
    <table border="10px">
      <th>No</th>
      <th>Frist Name</th>
      <th>Last Name</th>
      <th>E-mail</th>
      <th>Address</th>
      <th>Phone Number</th>
      <th>Password</th>
      <th>Gender</th>
      <th>Marks</th>
      <tbody>
        <?php

        $sql = "SELECT * FROM  `form_data`";

        $result = mysqli_query($con, $sql);

        $no=0;
        while ($row = mysqli_fetch_assoc($result)) {
        $no=$no+1;
        echo "<tr>
        <td>".$no."</td>
        <td>".$row['fname']."</td>
        <td>".$row['lname']."</td>
        <td>".$row['email']."</td>
        <td>".$row['address']."</td>
        <td>".$row['phone']."</td>
        <td>".$row['password']."</td>
        <td>".$row['Gender']."</td>
        <td>".$row['Marks']."</td>
        <tr>"; 

        }
        ?>
      </tbody>
    </table>

    <h1>Top Three student</h1>
    <table border="10px">
      <th>No</th>
      <th>Frist Name</th>
      <th>Marks</th>
      <tbody>
        <?php

        $sql = "SELECT * FROM  `form_data` ORDER BY Marks DESC LIMIT 3";
        // $sql = "SELECT * FROM  `form_data` ORDER BY Marks ASC LIMIT 3";

        $result = mysqli_query($con, $sql);

        $no=0;
        while ($row = mysqli_fetch_assoc($result)) {
        $no=$no+1;
        echo "<tr>
        <td>".$no."</td>
        <td>".$row['fname']."</td>
        <td>".$row['Marks']."</td>
        <tr>"; 

        }
        ?>
      </tbody>
    </table>
  </center>

</body>

</html>