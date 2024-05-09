<?php
include '../conn.php';

$sql = "SELECT * FROM `a_form_data`";
$result = mysqli_query($con, $sql);

$rows = array();
while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
}

echo json_encode($rows);
?>