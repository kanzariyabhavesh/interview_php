<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pertic";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
<form action="process_form.php" method="post">
    <label for="status">Status:</label>
    <input type="text" id="status" name="status"><br><br>
    <label for="priority">Priority:</label>
    <input type="number" id="priority" name="priority"><br><br>
    <label for="value">Value:</label>
    <input type="number" id="value" name="value"><br><br>
    <label for="apply_to">Apply To:</label>
    <select id="apply_to" name="apply_to">
        <?php
        $sql = "SELECT tour_name FROM tour_brand_data";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<option value='" . $row['tour_name'] . "'>" . $row['tour_name'] . "</option>";
            }
        }
        ?>
    </select><br><br>
    <input type="submit" value="Submit">
</form>
<?php
$conn->close();
?>
</body>
</html>
