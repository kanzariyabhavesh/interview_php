<?php
include '../conn.php';
if (isset($_GET['edit'])) {
       $sql = "SELECT * FROM  `form1_data` where `id` = $_GET[id]";
        $result = mysqli_query($con, $sql);
        $fristname='';
        $lastname='';
        $emailid='';
        $addressvalue='';
        $password='';
        $gender='';
        while ($row = mysqli_fetch_assoc($result)) {
          $fristname=$row['fname'];
          $lastname=$row['lname'];
          $emailid=$row['email'];
          $addressvalue=$row['address'];
          $password=$row['password'];
          $gender=$row['Gender'];

        }
}
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
    <form method="post" action="crud.php">
      <br>
      <table border="10px">
        <tr>
          <td><label for="fname">Frist Name:</label>
            <input type="text" name="fname" value="<?php 
            echo isset($fristname)?$fristname:"";
            ?>" required>
          </td>
        </tr>
        <tr>
          <td><label for="lname">Last Name:</label>
            <input type="text" name="lname" value="<?php 
            echo isset($lastname)?$lastname:"";
            ?>" required>
          </td>
        </tr>
        <tr>
          <td><label for="Email">E-mail:</label>
            <input type="text" name="email" value="<?php 
            echo isset($emailid)?$emailid:"";
            ?>" required>
          </td>
        </tr>
        <tr>
          <td><label for="Address">Address:</label>
            <textarea type="address" name="address" required><?php 
            echo isset($addressvalue)?$addressvalue:"";
            ?></textarea>
          </td>
        </tr>
        <tr>
          <td><label for="Password">Password:</label>
            <input type="text" name="Password" value="<?php 
            echo isset($password)?$password:"";
            ?>" required>
          </td>
        </tr>
        <tr>
          <td><label for="Gender">Gender:</label>
            <input type="radio" name="gender" value="Male"<?php if(isset($gender)){if($gender=='Male'){echo 'checked';}}?> required>Male
            <input type="radio" name="gender" value="Female" <?php if(isset($gender)){if($gender=='Female'){echo 'checked' ;}}?> required>Female
          </td>
        </tr>
        <?php
            if (isset($_GET['id'])) {
            ?>
            <input type="hidden" value='<?php echo $_GET['id'];?>' name="id">
            <?php 
            }
            ?>
        <tr>
          <td>
            <button type="submit" name="submit" value="submit">Submit</button>
            <button type="updete" name="updete" value="updete">Updete</button>
          </td>
        </tr>
      </table>
    </form>
    <h1>All Data</h1>

    <table border="10px">
      <th>No</th>
      <th>Frist Name</th>
      <th>Last Name</th>
      <th>E-mail</th>
      <th>Address</th>
      <th>Password</th>
      <th>Gender</th>
      <th>Phone Number</th>
      <th>Action</th>
      <tbody>
        <?php

        // $sql = "SELECT form1_data.id,form1_data.fname,form1_data.lname,form1_data.email,form1_data.address,form1_data.password,form1_data.Gender,form_data.phone FROM  form1_data CROSS join form_data";
        
        // $sql = "SELECT form1_data.id,form1_data.fname,form1_data.lname,form1_data.email,form1_data.address,form1_data.password,form1_data.Gender,form_data.phone FROM  form1_data RIGHT join form_data on form1_data.email = form_data.email ORDER BY form1_data.email";

        // $sql = "SELECT form1_data.id,form1_data.fname,form1_data.lname,form1_data.email,form1_data.address,form1_data.password,form1_data.Gender,form_data.phone FROM  form1_data LEFT join form_data on form1_data.email = form_data.email ORDER BY form1_data.email";

        $sql = "SELECT form1_data.id,form1_data.fname,form1_data.lname,form1_data.email,form1_data.address,form1_data.password,form1_data.Gender,form_data.phone FROM  form1_data inner join form_data on form1_data.email = form_data.email";

        // $sql = "SELECT form1_data.id,form1_data.fname,form1_data.lname,form1_data.email,form1_data.address,form1_data.password,form1_data.Gender,form_data.phone FROM  form1_data join form_data on form1_data.email = form_data.email";

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
        <td>".$row['password']."</td>
        <td>".$row['Gender']."</td>
        <td>".$row['phone']."</td>
        <td>
        <button><a href='form1.php?edit=edit&id=$row[id]'>Edit</a></button>
        <button><a href='crud.php?delete=delete&id=$row[id]'>Delete</a></button>
        </td>
        <tr>"; 

        }
        ?>
      </tbody>
    </table>
    <br>
    <button><a href='form1.php'>New Record</a></button>
    <button><a href='../login.php'>login Form</a></button>
  </center>

</body>

</html>