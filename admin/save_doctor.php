<?php
require 'dbconn.php';

if(isset($_POST["firstname"]) && isset($_POST["middleName"]) && isset($_POST["lastName"]) && isset($_POST["department"])) {
  $fName = $_POST["firstname"];
  $mName = $_POST["middleName"];
  $lName = $_POST["lastName"];
  $department = $_POST["department"];

  // Assuming you have a column named 'gender' in your database, adjust this line accordingly if needed
  // $gender = $_POST["gender"];

  $query = "INSERT INTO doctors (fName, mName, lName, department) VALUES ('$fName', '$mName', '$lName', '$department')";
  mysqli_query($conn, $query);

  if(mysqli_affected_rows($conn) > 0) {
    echo "<script>alert('Data Inserted Successfully');</script>";
  } else {
    echo "<script>alert('Failed to insert data');</script>";
  }
}
?>
