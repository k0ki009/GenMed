<?php
include 'conn.php';

// Pagination configuration
$records_per_page = 4; // Change this value to adjust the number of records per page
$page = isset($_GET['page']) && is_numeric($_GET['page']) ? $_GET['page'] : 1;
$start_from = ($page - 1) * $records_per_page;

// Initialize search variables
$search_query = isset($_GET['q']) ? $_GET['q'] : '';
$search_condition = $search_query ? "WHERE fName LIKE '%$search_query%' OR mName LIKE '%$search_query%' OR lName LIKE '%$search_query%'" : '';

// SQL query with pagination and search
$sql = "SELECT doctors.id, doctors.fName, doctors.mName, doctors.lName, doctors.department, doctors.image, doctors.address FROM doctors $search_condition LIMIT $start_from, $records_per_page";
$result = mysqli_query($conn, $sql);

// Count total number of records
$total_records_sql = "SELECT COUNT(*) AS total FROM doctors $search_condition";
$total_records_result = mysqli_query($conn, $total_records_sql);
$total_records = mysqli_fetch_assoc($total_records_result)['total'];
$total_pages = ceil($total_records / $records_per_page);

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
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#uploadModal">
              Batch Upload
            </button>
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
                  <form method="GET" action="">
                      <div class="input-group input-group-sm" style="width: 300px;">
                          <input type="text" name="q" class="form-control float-right" placeholder="Search" value="<?php echo $search_query; ?>">
                          <div class="input-group-append">
                              <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                          </div>
                      </div>
                  </form>
              </div>
                <table id="doctor-table" class="table table-bordered">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Name</th>
                      <th>Specialization</th>
                      <th>Address</th>
                      <th>Image</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                    if ($result && mysqli_num_rows($result) > 0) {
                      while ($row = mysqli_fetch_assoc($result)) {
                        $id = $row['id'];
                  ?>
                    <tr>
                      <td style="width: 100px;"><span class="fw-semibold"><?php echo $row['id']; ?></span></td>
                      <td style="width: 300px;"><span class="fw-semibold"><?php echo $row['fName'] . " " . $row['mName'] . " " . $row['lName']; ?></span></td>
                      <td style="width: 300px;"><span class="fw-semibold"><?php echo $row['department']; ?></span></td>
                      <td style="width: 300px;"><span class="fw-semibold"><?php echo $row['address']; ?></span></td>
                      <td><img src="dist/doctor/<?php echo $row['image']; ?>" alt="Doctor Image" style="max-width: 100px;"></td>
                      <td>
                        <a href="#" class="btn btn-primary btn-sm edit-button" data-toggle="modal" data-target="#editModal" data-doctor-id="<?php echo $id; ?>" data-doctor-name="<?php echo $row['fName'] . " " . $row['mName'] . " " . $row['lName']; ?>" data-department="<?php echo $row['department']; ?>">Edit</a>
                        <a href="admin_doctor_archive.php?id=<?php echo $id; ?>" class="btn btn-danger btn-sm">Archive</a>
                      </td>
                    </tr>
                  <?php
                      }
                    } else {
                      echo "<tr><td colspan='6'>No doctors found</td></tr>";
                    }
                    mysqli_close($conn);
                  ?>
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
    <!-- Pagination links -->
<ul class="pagination justify-content-center">
    <?php if ($page > 1): ?>
        <li class="page-item"><a class="page-link" href="?page=<?php echo ($page - 1); ?><?php echo $search_query ? '&q='.$search_query : ''; ?>">Previous</a></li>
    <?php endif; ?>
    <?php for ($i = 1; $i <= $total_pages; $i++): ?>
        <li class="page-item <?php if ($i == $page) echo 'active'; ?>"><a class="page-link" href="?page=<?php echo $i; ?><?php echo $search_query ? '&q='.$search_query : ''; ?>"><?php echo $i; ?></a></li>
    <?php endfor; ?>
    <?php if ($page < $total_pages): ?>
        <li class="page-item"><a class="page-link" href="?page=<?php echo ($page + 1); ?><?php echo $search_query ? '&q='.$search_query : ''; ?>">Next</a></li>
    <?php endif; ?>
</ul>

    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  
</div>
<!-- /.wrapper -->

<!-- Modal -->
<!-- Modal content -->

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

  // Handle batch upload form submission
  $(document).ready(function() {
    $('#batchUploadForm').submit(function(e) {
      e.preventDefault();
      var formData = new FormData(this);

      $.ajax({
        url: 'batch_upload.php', // Update the URL to your batch upload processing script
        type: 'POST',
        data: formData,
        success: function(response) {
          // Handle success response, e.g., show a success message or reload the page
          console.log(response);
          // Reload the page after successful upload
          window.location.reload();
        },
        error: function(xhr, status, error) {
          // Handle error response, e.g., show an error message
          console.error(xhr.responseText);
        },
        cache: false,
        contentType: false,
        processData: false
      });
    });
  });
</script>
</body>
</html>
