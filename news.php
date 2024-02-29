<!DOCTYPE html>
<html lang="en">

<head>
<?php include("header.php") ?>
<link href="/assets/css/style.css" rel="stylesheet">
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
            <h2>News</h2>
        </div>

        <div class="row">
            <?php
            include 'conn.php';
            $sql = "SELECT * FROM news";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) {
            ?>
            <div class="col-lg-6" data-aos="fade-up">
                <div class="card mb-4">
                    <div class="row no-gutters">
                        <div class="col-md-4">
                            <img src="admin/dist/news/<?php echo $row['image']; ?>" class="card-img" alt="News Image">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <p class="card-text"><?php echo $row['title']; ?></p>
                                <a href="news_read.php?id=<?php echo $row['id']; ?>" class="btn btn-primary">Read more &raquo;</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
                }
            } else {
                echo "No news found";
            }
            mysqli_close($conn);
            ?>
        </div>
        <!-- Pagination -->
      <nav>
        <ul class="pagination justify-content-center">
          <li class="page-item disabled">
            <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
          </li>
          <li class="page-item active" aria-current="page">
            <a class="page-link" href="#">1</a>
          </li>
          <li class="page-item">
            <a class="page-link" href="#">2</a>
          </li>
          <li class="page-item">
            <a class="page-link" href="#">3</a>
          </li>
          <li class="page-item">
            <a class="page-link" href="#">Next</a>
          </li>
        </ul>
      </nav>
    </div>
  </section>
  <!-- End Doctors Section -->
    </div>
</section>

    <!-- End Doctors Section -->

<!-- ======= Footer ======= -->


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


  <?php include("footer.php") ?>
</body>

</html>
