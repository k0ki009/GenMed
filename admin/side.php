<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">



  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4" id="sidebar-container">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="dist/img/logo.jpg" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">GenMed</span>
    </a>
  </aside>
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="index.php" class="brand-link">
        <img src="dist/img/logo.jpg" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">GenMed</span>
    </a>

    <div class="sidebar">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="index.php" class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'index.php' ? 'active' : ''; ?>">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="doctors.php" class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'doctors.php' ? 'active' : ''; ?>">
                        <i class="nav-icon fas fa-table"></i>
                        <p>Doctors</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="news.php" class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'news.php' ? 'active' : ''; ?>">
                        <i class="nav-icon fas fa-table"></i>
                        <p>News</p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>

<script>
    // Script to highlight active sidebar item
    document.addEventListener('DOMContentLoaded', function() {
        let currentPage = window.location.pathname.split('/').pop();
        let navLinks = document.querySelectorAll('.nav-link');
        
        navLinks.forEach(function(link) {
            let href = link.getAttribute('href').split('/').pop();
            if (href === currentPage) {
                link.classList.add('active');
            }
        });
    });
</script>