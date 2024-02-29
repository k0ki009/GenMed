<?php
include 'conn.php';

// Process form submission
if (isset($_POST['btnAdd'])) {
    // Sanitize input data to prevent SQL injection
    $fName = mysqli_real_escape_string($conn, $_POST["firstname"]);
    $mName = mysqli_real_escape_string($conn, $_POST["middleName"]);
    $lName = mysqli_real_escape_string($conn, $_POST["lastName"]);
    $department = mysqli_real_escape_string($conn, $_POST["department"]);

    // Image upload
    $image = $_FILES['image']['name'];
    $target = "dist/doctor/" . basename($image); 

    // Validate input (basic validation example)
    if (empty($fName) || empty($department)) {
        echo "Error: First Name and Department are required.";
        exit();
    }

    // Insert new doctor into the database with image
    $sql = "INSERT INTO doctors (fName, mName, lName, department, image) VALUES ('$fName', '$mName', '$lName', '$department', '$image')";

    if ($conn->query($sql) === TRUE) {
        // Move uploaded image to the 'images' directory
        if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
            echo "Image uploaded successfully";
        } else {
            echo "Error uploading image";
        }

        // Redirect to doctors.php after successful insertion
        header("Location: doctors.php?msg=Doctor added successfully");
        exit();
    } else {
        // Display error message if insertion fails
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close database connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>GensanMed</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="dist/img/dog.gif" alt="AdminLTELogo" height="60" width="60">
  </div>

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->
  <?php include("side.php"); ?>

   <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Add Doctors</h1>
                    </div>
                </div>
                <div class="row">
                    <div class="card w-100">
                        <div class="card-header">
                            <h3 class="card-title">Doctor Details</h3>
                        </div>
                        <div class="card-body">
                        <form class="row g-3" id="doctorForm" method="POST" enctype="multipart/form-data">
    <div class="col-md-4">
        <label for="fname" class="form-label">First Name</label>
        <input type="text" class="form-control required" id="fname" name="firstname" placeholder="Enter firstname" required>
    </div>
    <div class="col-md-4">
        <label for="mName" class="form-label">Middle Name</label>
        <input type="text" class="form-control required" id="mName" name="middleName" placeholder="Enter middleName" required>
    </div>
    <div class="col-md-4">
        <label for="lName" class="form-label">Last Name</label>
        <input type="text" class="form-control" id="lName" name="lastName" placeholder="Enter lastName">
    </div>
    <div class="col-md-6">
        <label for="department" class="form-label">Department</label>
        <input type="text" class="form-control required" id="department" name="department" placeholder="Enter department" required>
    </div>
    <div class="col-md-6">
        <label for="image" class="form-label">Upload Image</label>
        <input type="file" class="form-control" id="image" name="image" accept="image/*" required>
    </div>
    <div class="col-12"><br>
        <button type="submit" class="btn btn-primary" name="btnAdd">Add Doctor</button>
        <button type="button" class="btn btn-secondary" id="cancelBtn">Cancel</button>
    </div>
</form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
    <!-- Your JavaScript code here -->
    <script>
        document.getElementById("cancelBtn").addEventListener("click", function() {
            if (confirm("Are you sure you want to cancel?")) {
                window.location.href = "doctors.php";
            }
        });
    </script>
</body>
</html>
