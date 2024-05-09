<?php
session_start();
print_r($_SESSION['email']);
if (isset($_SESSION['email'])) {
header("location:logout.php"); 
}
echo "login success";

echo "<button><a href='logout.php'>logout</a></button>";
?>