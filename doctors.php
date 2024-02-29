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
        <li class="nav-item" role="presentation">
          <button class="nav-link active" id="cardiology-tab" data-bs-toggle="tab" data-bs-target="#cardiology" type="button" role="tab" aria-controls="cardiology" aria-selected="true">Cardiology</button>
        </li>
        <li class="nav-item" role="presentation">
          <button class="nav-link" id="anesthesiology-tab" data-bs-toggle="tab" data-bs-target="#anesthesiology" type="button" role="tab" aria-controls="anesthesiology" aria-selected="false">Anesthesiology</button>
        </li>
        <li class="nav-item" role="presentation">
          <button class="nav-link" id="neurosurgery-tab" data-bs-toggle="tab" data-bs-target="#neurosurgery" type="button" role="tab" aria-controls="neurosurgery" aria-selected="false">Neurosurgery</button>
        </li>
      </ul>

      <!-- Tab Content -->
      <div class="tab-content" id="specializationTabsContent"><br>
        <!-- Cardiology Tab Pane -->
        <div class="tab-pane fade show active" id="cardiology" role="tabpanel" aria-labelledby="cardiology-tab">
          <div class="row">
            <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
              <div class="member" data-aos="fade-up" data-aos-delay="100">
                <div class="member-img">
                  <img src="assets/img/doctors/doctors-1.jpg" class="img-fluid" alt="">
             
                </div>
                <div class="member-info">
                  <h4>Walter White</h4>
                  <span>Chief Medical Officer</span>
                </div>
              </div>
            </div>
            <!-- Add more doctors for cardiology specialization here -->
          </div>
        </div>

        <!-- Anesthesiology Tab Pane -->
        <div class="tab-pane fade" id="anesthesiology" role="tabpanel" aria-labelledby="anesthesiology-tab">
          <div class="row">
            <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
              <div class="member" data-aos="fade-up" data-aos-delay="200">
                <div class="member-img">
                  <img src="assets/img/doctors/doctors-2.jpg" class="img-fluid" alt="">
                
                </div>
                <div class="member-info">
                  <h4>Sarah Jhonson</h4>
                  <span>Anesthesiologist</span>
                </div>
              </div>
            </div>
            <!-- Add more doctors for anesthesiology specialization here -->
          </div>
        </div>

        <!-- Neurosurgery Tab Pane -->
        <div class="tab-pane fade" id="neurosurgery" role="tabpanel" aria-labelledby="neurosurgery-tab">
          <div class="row">
            <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
              <div class="member" data-aos="fade-up" data-aos-delay="300">
                <div class="member-img">
                  <img src="assets/img/doctors/doctors-3.jpg" class="img-fluid" alt="">
              
</div>
<div class="member-info">
<h4>William Anderson</h4>
<span>Neurosurgeon</span>
</div>
</div>
</div>
<!-- Add more doctors for neurosurgery specialization here -->
</div>
</div>
</div>
</div>
</section>
  <!-- End Doctors Section -->
  <!-- ======= Footer ======= -->
  <?php include("footer.php") ?>
  <!-- <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a> -->
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