<?php 
$sname = "localhost";
$uname = "root";
$password = "";
$dbname = "genmed_db";

$conn = mysqli_connect($sname, $uname, $password, $dbname);

if(!$conn) {
    echo "Connection Failed";
} else {
    echo "Connection Successful!";
}
?>
