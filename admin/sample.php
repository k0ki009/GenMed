<?php
include 'dbconn.php';

// Process form submission
if (isset($_POST['btnAdd'])) {
    // Sanitize input data to prevent SQL injection
    $fName = mysqli_real_escape_string($conn, $_POST["firstname"]);
    $mName = mysqli_real_escape_string($conn, $_POST["middleName"]);
    $lName = mysqli_real_escape_string($conn, $_POST["lastName"]);
    $department = mysqli_real_escape_string($conn, $_POST["department"]);

    // Validate input (basic validation example)
    if (empty($fName) || empty($department)) {
        echo "Error: First Name and Department are required.";
        exit();
    }

    // Insert new doctor into the database
    $sql = "INSERT INTO doctors (fName, mName, lName, department) VALUES ('$fName', '$mName', '$lName', '$department')";

    if ($conn->query($sql) === TRUE) {
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
    <!-- Add your CSS and JavaScript links here -->
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
    <!-- Your HTML content here -->

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
                            <form class="row g-3" id="doctorForm" action="save_doctor.php" method="POST">
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

    <!-- Your JavaScript code here -->
    <script>
        document.getElementById("cancelBtn").addEventListener("click", function() {
            if (confirm("Are you sure you want to cancel?")) {
                window.location.href = "doctors.php";
            }
        });
    </script>
</div>
</body>
</html>


