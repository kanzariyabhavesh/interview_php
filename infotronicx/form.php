<?php
include '../conn.php';

if (isset($_GET['editid'])) {
    $editid=$_GET['editid'];
$sql = "SELECT * FROM `form_data_infotronicx` where id =$editid";

$result = mysqli_query($con, $sql);
$id="";
$fristname="";
$email="";
$date="";
$contry="";
$city="";

while ($row = mysqli_fetch_array($result)) {
    $id .=$row['id'];
    $fristname .=$row['fristname'];
    $email .=$row['email'];
    $date .=$row['date'];
    $contry .=$row['contry'];
    $city .=$row['city'];
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
        <form action="crud_page.php" method="post">
            <label for="">Frist Name:</label>
            <input type="text" name="fname" id="" value="<?php echo isset($fristname)? $fristname :''?>" required></br></br>
            <label for="">Email:</label>
            <input type="email" name="email" id="" value="<?php echo isset($email)? $email :''?>"  required></br></br>
            <label for="">Date:</label>
            <input type="date" name="date" id="" value="<?php echo isset($date)? $date :''?>" ></br></br>
            <label for="">contry:</label>
            <select name="contry" id="" required>
                <option value="">Country:</option>
                <option value="India"<?php echo isset($contry) && $contry == 'India' ? 'selected' :''  ?>>India</option>
                <option value="American" <?php echo isset($contry) && $contry == 'American' ? 'selected' :''  ?>>American</option>
                <option value="Austria" <?php echo isset($contry) && $contry == 'Austria' ? 'selected' :''  ?>>Austria</option>
                <option value="China" <?php echo isset($contry) && $contry == 'China' ? 'selected' :''  ?>>China</option>
                <option value="Nepal" <?php echo isset($contry) && $contry == 'Nepal' ? 'selected' :''  ?>>Nepal</option>
                <option value="Pakistan" <?php echo isset($contry) && $contry == 'Pakistan' ? 'selected' :''  ?>>Pakistan</option>
            </select></br></br>
            <label for="">city:</label>
            <select name="city" id="" required>
                <option value="">City:</option>
                <option value="Ahmedabad" <?php echo isset($city) && $city == 'Ahmedabad' ? 'selected' :''  ?>>Ahmedabad</option>
                <option value="Bhuj" <?php echo isset($city) && $city == 'Bhuj' ? 'selected' :''  ?>>Bhuj</option>
                <option value="Gandhidham" <?php echo isset($city) && $city == 'Gandhidham' ? 'selected' :''  ?>>Gandhidham</option>
                <option value="Gandhinagar" <?php echo isset($city) && $city == 'Gandhinagar' ? 'selected' :''  ?>>Gandhinagar</option>
                <option value="Halvad" <?php echo isset($city) && $city == 'Halvad' ? 'selected' :''  ?>>Halvad</option>
                <option value="Morbi" <?php echo isset($city) && $city == 'Morbi' ? 'selected' :''  ?>>Morbi</option>
                <option value="Surat" <?php echo isset($city) && $city == 'Surat' ? 'selected' :''  ?>>Surat</option>
            </select></br></br>
            <input type="hidden" name="hiddenid" value="<?php echo isset($id)? $id :''?>">
            <button type="submit" name="submit">Submit</button>
            <button type="submit" name="update">Update</button>
        </form>
        <h1>Search Form</h1>

        <form action="" method="post">
            <label for="">Frist Name:</label>
            <input type="text" name="name_search" id=""></br></br>

            <label for="">Date:</label>
            From:<input type="date" name="from_search" id="">
            To:<input type="date" name="to_search" id=""></br></br>

            <label for="">City:</label>
            <select name="city_search" id="">
                <option value="">City:</option>
                <option value="Ahmedabad">Ahmedabad</option>
                <option value="Bhuj">Bhuj</option>
                <option value="Gandhidham">Gandhidham</option>
                <option value="Gandhinagar">Gandhinagar</option>
                <option value="Halvad">Halvad</option>
                <option value="Morbi">Morbi</option>
                <option value="Surat">Surat</option>
            </select></br></br>
            <button type="submit" name="search">Search</button>

        </form>

        <h1>All Data</h1>

        <table border="5px">
            <thead>
                <th>Id</th>
                <th>Frist Name</th>
                <th>Email</th>
                <th>Date</th>
                <th>Contry</th>
                <th>City</th>
                <th>Action</th>
            </thead>
            <tbody>
                <?php
                if (!isset($_POST['search'])) {

                    $sql = "SELECT * FROM `form_data_infotronicx`";

                    $result = mysqli_query($con, $sql);

                    while ($row = mysqli_fetch_array($result)) {

                        echo "<tr>
                            <td>" . $row['id'] . "</td>
                            <td>" . $row['fristname'] . "</td>
                            <td>" . $row['email'] . "</td>
                            <td>" . $row['date'] . "</td>
                            <td>" . $row['contry'] . "</td>
                            <td>" . $row['city'] . "</td>
                            <td>
                            <button><a href='form.php?editid=$row[id]'>Update</a></button>
                            <button><a href='delete_pege.php?deleteid=$row[id]'>Delete</a></button>
                            </td>
                            </tr>";
                    }
                } else {
                    // $search = "1=1";

                    // if (!empty($_POST['name_search'])) {
                    //     $search .= " AND fristname LIKE '$_POST[name_search]%'";
                    // }
                    // if (!empty($_POST['from_search']) && !empty($_POST['to_search'])) {
                    //     $search .= " AND date BETWEEN '$_POST[from_search]' AND '$_POST[to_search]'";
                    // }
                    //  elseif (!empty($_POST['from_search'])) {
                    //     $search .= " AND date >= '$_POST[from_search]'";
                    // } elseif (!empty($_POST['to_search'])) {
                    //     $search .= " AND date <= '$_POST[to_search]'";
                    // }

                    // if (!empty($_POST['city_search'])) {
                    //     $search .= " AND city = '$_POST[city_search]'";
                    // }

                    // $sql = "SELECT * FROM `form_data_infotronicx` WHERE $search";

                    $conditions = []; 

if (!empty($_POST['name_search'])) {
    $conditions[] = "fristname LIKE '{$_POST['name_search']}%'";
}
if (!empty($_POST['from_search'])) {
    $conditions[] = "date >= '{$_POST['from_search']}'";
}
if (!empty($_POST['to_search'])) {
    $conditions[] = "date <= '{$_POST['to_search']}'";
}
if (!empty($_POST['city_search'])) {
    $conditions[] = "city = '{$_POST['city_search']}'";
}
$whereClause = !empty($conditions) ? "WHERE " . implode(" AND " ,$conditions) : "";

$sql = "SELECT * FROM `form_data_infotronicx` $whereClause";

                    $result = mysqli_query($con, $sql);

                    while ($row = mysqli_fetch_array($result)) {

                        echo "<tr>
                            <td>" . $row['id'] . "</td>
                            <td>" . $row['fristname'] . "</td>
                            <td>" . $row['email'] . "</td>
                            <td>" . $row['date'] . "</td>
                            <td>" . $row['contry'] . "</td>
                            <td>" . $row['city'] . "</td>
                            <td>
                            <button><a href='form.php?editid=$row[id]'>Update</a></button>
                            <button><a href='delete_pege.php?deleteid=$row[id]'>Delete</a></button>
                            </td>
                            </tr>";
                    }
                }
                ?>

            </tbody>

        </table>

    </center>
</body>

</html>