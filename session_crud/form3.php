<?php
    session_start();

include '../conn.php';
if (isset($_GET['editid'])) {
       $sql = "SELECT * FROM  `s_form_data` where `id` = $_GET[editid]";
        $result = mysqli_query($con, $sql);
        $row = mysqli_fetch_assoc($result);
        $_SESSION['value'] = $row;

}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <style>
    .error{
      color: red;
    }
  </style>
</head>

<body>
  <center>
    <form method="post" action="crud.php">
      <br>
      <table border="10px">
        <tr>
          <td><label for="fname">Frist Name:</label>
            <input type="text" name="fname" value="<?php 
            echo isset($_SESSION['value']['fname'])?$_SESSION['value']['fname']:"";
            ?>" >
            <div class="error"><?php echo isset($_SESSION['error']['fname'])? $_SESSION['error']['fname'] :"" ; ?></div>
          </td>
        </tr>
        <tr>
          <td><label for="lname">Last Name:</label>
            <input type="text" name="lname" value="<?php 
            echo isset($_SESSION['value']['lname'])?$_SESSION['value']['lname']:"";
            ?>" >
            <div class="error"><?php echo isset($_SESSION['error']['lname'])? $_SESSION['error']['lname'] :"" ; ?></div>
          </td>
        </tr>
        <tr>
          <td><label for="Email">E-mail:</label>
            <input type="text" name="email" value="<?php 
            echo isset($_SESSION['value']['email'])?$_SESSION['value']['email']:"";
            ?>" >
            <div class="error"><?php echo isset($_SESSION['error']['email'])? $_SESSION['error']['email'] :"" ; ?></div>
          </td>
        </tr>
        <tr>
          <td><label for="Address">Address:</label>
            <textarea type="address" name="address" ><?php 
            echo isset($_SESSION['value']['address'])?$_SESSION['value']['address']:"";
            ?></textarea>
            <div class="error"><?php echo isset($_SESSION['error']['address'])? $_SESSION['error']['address'] :"" ; ?></div>
          </td>
        </tr>
        <tr>
          <td><label for="Phone">Phone Number:</label>
            <input type="number" name="phone" value="<?php 
            echo isset($_SESSION['value']['phone'])?$_SESSION['value']['phone']:"";
            ?>" >
            <div class="error"><?php echo isset($_SESSION['error']['phone'])? $_SESSION['error']['phone'] :"" ; ?></div>
          </td>
        </tr>
        <tr>
          <td><label for="Marks">Marks:</label>
            <input type="number" name="Marks" value="<?php 
            echo isset($_SESSION['value']['Marks'])?$_SESSION['value']['Marks']:"";
            ?>" >
            <div class="error"><?php echo isset($_SESSION['error']['marks'])? $_SESSION['error']['marks'] :"" ; ?></div>
          </td>
        </tr>
        <tr>
          <td><label for="Password">Password:</label>
            <input type="text" name="password" value="<?php 
            echo isset($_SESSION['value']['password'])?$_SESSION['value']['password']:"";
            ?>" >
            <div class="error"><?php echo isset($_SESSION['error']['password'])? $_SESSION['error']['password'] :"" ; ?></div>
          </td>
        </tr>
        <tr>
          <td><label for="Gender">Gender:</label>
            <input type="radio" name="Gender" value="Male"<?php 
            if(isset($_SESSION['value']['Gender'])){if($_SESSION['value']['Gender']=='Male'){echo 'checked';}}
            ?> >Male
            <input type="radio" name="Gender" value="Female" <?php
             if(isset($_SESSION['value']['Gender'])){if($_SESSION['value']['Gender']=='Female'){echo 'checked' ;}}?>
              >Female
            <div class="error"><?php echo isset($_SESSION['error']['Gender'])? $_SESSION['error']['Gender'] :"" ; ?></div>
          </td>
        </tr>
            <input type="hidden" value='<?php 
            echo isset($_GET['editid']) ? $_GET['editid'] :"";
            echo isset($_GET['updetaid']) ? $_GET['updetaid'] :"";
            
            ?>' name="hidden">
           
        <tr>
          <td>
            <?php
            if(isset($_GET['editid']) || isset($_GET['updetaid'])&&$_GET['updetaid'] != ""){
            ?>
            <button type="updete" name="updete" value="updete">Updete</button>
            <?php
            }else{
              ?>
              <button type="submit" name="submit" value="submit">Submit</button>
            <?php } ?>
          </td>
        </tr>
      </table>
    </form>
          <?php
              session_destroy();
          ?>
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
      <th>Action</th>
      <tbody>
        <?php

        $sql = "SELECT * FROM  `s_form_data`";

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
        <td>
        <button><a href='form3.php?editid=$row[id]'>Edit</a></button>
        <button><a href='crud.php?deleteid=$row[id]'>Delete</a></button>
        </td>
        <tr>"; 

        }
        ?>
      </tbody>
    </table>
    <br>
    <button><a href='form3.php'>New Record</a></button>
  </center>

</body>

</html>