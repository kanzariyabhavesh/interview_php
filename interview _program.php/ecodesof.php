<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
  <form action="" method="post">
  <input type="text" name="serch" id="">
  <button type="submit">Serch</button>
  </form>
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
        include '../conn.php';
        $serch=isset($_POST['serch']) ? $_POST['serch'] : '';

        $sql = "SELECT * FROM  `form_data` where fname like '$serch%'";

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







 <?php
// $a=10;
// $b=6;
// $a=$a+$b;//10+6=16
// $b=$a-$b;//16-6=10
// $a=$a-$b;//16-10=6
// echo "a=".$a.'</br>';
// echo "b=".$b;
?>

    <!-- <script>
        
      let a=10;
      function name(){
          let a=15;
                console.log(a);
            }
            name();
    </script> -->

</body>
</html>