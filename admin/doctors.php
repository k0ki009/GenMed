<?php
include 'conn.php';
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
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">

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

  <!-- Content Wrapper. Contains page contenttttt -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Doctors</h1>
          </div>
        </div>
        <div class="row mb-2">
          <div class="col">
            <button type="button" class="btn btn-primary" onclick="window.location.href='add_doctor.php'">Add Doctor</button>
          </div>
        </div>
      </div>
    </div>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Doctor List</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 300px;">
                      <input type="text" name="table_search" class="form-control float-right" placeholder="Search">
                      <div class="input-group-append">
                          <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                      </div>
                  </div>
              </div>
                <table id="doctor-table" class="table table-bordered">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Name</th>
                      <th>Specialization</th>
                      <th>Image</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php


$sql = "SELECT doctors.id, doctors.fName, doctors.mName, doctors.lName, doctors.department, doctors.image FROM doctors";
$result = mysqli_query($conn, $sql);

if ($result && mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $id = $row['id'];
?>
<tr>
    <td style="width: 100px;">
        <span class="fw-semibold">
            <?php echo $row['id']; ?>
        </span>
    </td>
    <td style="width: 300px;">
        <span class="fw-semibold">
            <?php echo $row['fName'] . " " . $row['mName'] . " " . $row['lName']; ?>
        </span>
    </td>
    <td style="width: 300px;">
        <span class="fw-semibold">
            <?php echo $row['department']; ?>
        </span>
    </td>
    <td >
    <img src="dist/doctor/<?php echo $row['image']; ?>" alt="Doctor Image" style="max-width: 100px;">
    </td>
    <td>
   
        <a href="#" class="btn btn-primary btn-sm edit-button" data-toggle="modal" data-target="#editModal" data-doctor-id="<?php echo $id; ?>" data-doctor-name="<?php echo $row['fName'] . " " . $row['mName'] . " " . $row['lName']; ?>" data-department="<?php echo $row['department']; ?>">Edit</a>
        <a href="admin_doctor_archive.php?id=<?php echo $id; ?>" class="btn btn-danger btn-sm">Archive</a>
    </td>
</tr>
<?php
    }
} else {
    echo "<tr><td colspan='5'>No doctors found</td></tr>";
}
mysqli_close($conn);
?>

                    <!-- Add more rows as needed -->
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
</div>
<!-- /.wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables -->
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<?php include("footer.php"); ?>
<script>
  // Initialize DataTables
  $(document).ready(function() {
    $('#doctor-table').DataTable();
  });
</script>
</body>
</html>
