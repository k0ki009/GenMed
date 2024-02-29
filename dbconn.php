<?php 
$sname = "localhost";
$uname = "u737612201_tboli";
$password = "Tboli123";
$dbname = "u737612201_tbolidb";

$conn = mysqli_connect($sname, $uname, $password, $dbname);

if(!$conn) {
    echo "Connection Failed";
}

?>