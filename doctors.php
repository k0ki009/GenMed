<?php
include 'conn.php';

// Fetch doctors grouped by department
$sql = "SELECT department, fName, lName, address, image FROM doctors ORDER BY department";
$result = mysqli_query($conn, $sql);

$doctors_by_department = array();

if ($result && mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $department = $row['department'];
        // Create an array for each department if it doesn't exist
        if (!isset($doctors_by_department[$department])) {
            $doctors_by_department[$department] = array();
        }
        // Add doctor details to the respective department array
        $doctors_by_department[$department][] = $row;
    }
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <?php include("header.php") ?>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Medicio Bootstrap Template - Index</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/logo.jpg" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/doctors.css" rel="stylesheet">

</head>

<body>
  <!-- ======= Doctors Section ======= -->
  <section id="doctors" class="doctors section-bg">
    <div class="container" data-aos="fade-up">

      <div class="section-title">
        <h2>Our Doctors</h2>
      </div>

      <!-- Tabs -->
      <ul class="nav nav-tabs" id="specializationTabs" role="tablist">
        <?php foreach ($doctors_by_department as $department => $doctors) : ?>
          <li class="nav-item" role="presentation">
            <button class="nav-link <?= $department === key($doctors_by_department) ? 'active' : '' ?>" id="<?= strtolower(str_replace(' ', '', $department)) ?>-tab" data-bs-toggle="tab" data-bs-target="#<?= strtolower(str_replace(' ', '', $department)) ?>" type="button" role="tab" aria-controls="<?= strtolower(str_replace(' ', '', $department)) ?>" aria-selected="<?= $department === key($doctors_by_department) ? 'true' : 'false' ?>"><?= $department ?></button>
          </li>
        <?php endforeach; ?>
      </ul>

      <!-- Tab Content -->
      <br>
      <div class="tab-content" id="specializationTabsContent">
        <?php foreach ($doctors_by_department as $department => $doctors) : ?>
          <div class="tab-pane fade <?= $department === key($doctors_by_department) ? 'show active' : '' ?>" id="<?= strtolower(str_replace(' ', '', $department)) ?>" role="tabpanel" aria-labelledby="<?= strtolower(str_replace(' ', '', $department)) ?>-tab">
            <div class="row">
              <?php foreach ($doctors as $doctor) : ?>
                <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
    <div class="member" data-aos="fade-up" data-aos-delay="100">
        <div class="member-img">
            <img src="admin/dist/doctor/<?= $doctor['image'] ?>" class="img-fluid" alt="<?= $doctor['fName'] . ' ' . $doctor['lName'] ?>">
        </div>
        <div class="member-info">
            <h4><?= $doctor['fName'] . ' ' . $doctor['lName'] ?></h4>
            <span><?= $department ?></span>
            <p><strong>Address:</strong> <?= $doctor['address'] ?></p> 
        </div>
    </div>
</div>

              <?php endforeach; ?>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>
  <!-- End Doctors Section -->

  <!-- ======= Footer ======= -->
  <?php include("footer.php") ?>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>
