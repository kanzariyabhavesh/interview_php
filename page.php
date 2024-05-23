<?php
session_start();
if (!isset($_SESSION['emailvalue'])) {
header("location:logout.php"); 
}
echo "login success";

echo "<button><a href='logout.php'>logout</a></button>";
?>