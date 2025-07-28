<? include '../config/database.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta content="width=device-width, initial-scale=1.0" name="viewport" />
  <title>Departments - PUGC</title>
  <meta name="description" content="" />
  <meta name="keywords" content="" />

  <!-- Favicons -->
  <link rel="icon" type="image/x-icon" href="../assets/img/favicon.ico" />
  <link
    rel="apple-touch-icon"
    sizes="180x180"
    href="../assets/img/apple-touch-icon.png" />
  <link
    rel="icon"
    type="image/png"
    sizes="32x32"
    href="../assets/img/favicon-32x32.png" />
  <link
    rel="icon"
    type="image/png"
    sizes="16x16"
    href="../assets/img/favicon-16x16.png" />
  <link rel="manifest" href="../assets/img/site.webmanifest" />
  <link
    rel="mask-icon"
    href="../assets/img/safari-pinned-tab.svg"
    color="#324c80" />
  <meta name="msapplication-TileColor" content="#324c80" />
  <meta name="theme-color" content="#324c80" />

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect" />
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin />
  <link
    href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&family=Montserrat:wght@600;700&display=swap"
    rel="stylesheet" />

  <!-- Vendor CSS Files -->
  <link
    href="../assets/vendor/bootstrap/css/bootstrap.min.css"
    rel="stylesheet" />
  <link
    href="../assets/vendor/bootstrap-icons/bootstrap-icons.css"
    rel="stylesheet" />
  <link href="../assets/vendor/aos/aos.css" rel="stylesheet" />
  <link
    href="../assets/vendor/glightbox/css/glightbox.min.css"
    rel="stylesheet" />
  <link
    href="../assets/vendor/swiper/swiper-bundle.min.css"
    rel="stylesheet" />

  <!-- Main CSS File -->
  <link href="../assets/css/main.css" rel="stylesheet" />
</head>

<body class="events-page">
  <header id="header" class="header d-flex align-items-center sticky-top">
    <div
      class="container-fluid container-xl position-relative d-flex align-items-center">
      <a href="../index.html" class="logo d-flex align-items-center me-auto">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <img src="../assets/img/logo.svg" alt="" />
        <h1 class="sitename">University of the Punjab, Gujranwala Campus</h1>
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li>
            <a href="../index.html">Home<br /></a>
          </li>
          <li class="dropdown">
            <a href="#"><span>Admissions</span>
              <i class="bi bi-chevron-down toggle-dropdown"></i></a>
            <ul>
              <li>
                <a href="../admissions/announcements.html">Announcements</a>
              </li>
              <li><a href="../admissions/forms.html">Forms</a></li>
              <li>
                <a href="../admissions/merit-lists.html">Merit Lists</a>
              </li>
              <li>
                <a href="../admissions/fee-structure.html">Fee Structure</a>
              </li>
              <li>
                <a href="../admissions/scholarships.html">Scholarships</a>
              </li>
            </ul>
          </li>
          <li class="dropdown">
            <a href="#"><span>Academics</span>
              <i class="bi bi-chevron-down toggle-dropdown"></i></a>
            <ul>
              <li>
                <a href="../academics/departments.php" class="active">Departments</a>
              </li>
              <li><a href="../academics/programs.php">Programs</a></li>
              <li><a href="../academics/faculty.php">Faculty</a></li>
            </ul>
          </li>
          <li class="dropdown">
            <a href="#"><span>Campus Life</span>
              <i class="bi bi-chevron-down toggle-dropdown"></i></a>
            <ul>
              <li><a href="../campus-life/facilities.html">Facilities</a></li>
              <li><a href="../campus-life/societies.html">Societies</a></li>
              <li>
                <a href="../campus-life/events.html">Events</a>
              </li>
              <li><a href="../campus-life/gallery.php">Gallery</a></li>
            </ul>
          </li>
          <li><a href="../notices.html">Notices</a></li>
          <li><a href="../downloads.html">Downloads</a></li>
          <li><a href="../about.html">About</a></li>
          <li><a href="../contact.php">Contact</a></li>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>
    </div>
  </header>

  <main class="main">
    <!-- Page Title -->
    <div class="page-title" data-aos="fade">
      <div class="heading">
        <div class="container">
          <div class="row d-flex justify-content-center text-center">
            <div class="col-lg-8">
              <h1>Departments</h1>
              <p class="mb-0">
                Explore the various departments at the University of the
                Punjab, Gujranwala Campus.
              </p>
            </div>
          </div>
        </div>
      </div>
      <nav class="breadcrumbs">
        <div class="container">
          <ol>
            <li><a href="../index.html">Home</a></li>
            <li class="current">Academics</li>
            <li class="current">Departments</li>
          </ol>
        </div>
      </nav>
    </div>
    <!-- End Page Title -->

    <!-- Courses Section -->

    <?php
    $sql = "SELECT id, name, description, image_path FROM departments";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      echo '<section id="courses" class="courses section">';
      echo '    <div class="container">';
      echo '        <div class="row">';

      // Fetching each department
      while ($row = $result->fetch_assoc()) {
        $departmentId = $row['id'];
        $departmentName = htmlspecialchars($row['name']); // Sanitize output
        $departmentDescription = htmlspecialchars($row['description']); // Sanitize output
        $src = htmlspecialchars($row['image_path']); // Sanitize output

        echo '<div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">';
        echo '    <div class="course-item">';
        echo '        <img src="' . $src . '" class="img-fluid  rounded-top" alt="' . $departmentName . '" />';
        echo '        <div class="course-content">';
        echo '            <h3>' . $departmentName . '</h3>';
        echo '            <div class="description">';
        echo '                <p>' . $departmentDescription . '</p>';
        echo '            </div>';
        echo '        </div>';
        echo '    </div>';
        echo '</div>';
      }

      echo '        </div>';
      echo '    </div>';
      echo '</section>';
    } else {
      echo "No departments found.";
    }
    ?>
    <!-- /Courses Section -->
  </main>

  <footer id="footer" class="footer position-relative light-background">
    <div class="container footer-top">
      <div class="row gy-4">
        <div class="col-lg-4 col-md-6 footer-about">
          <a href="../index.html" class="logo d-flex align-items-center">
            <span class="sitename">
              University of the Punjab, Gujranwala Campus
            </span>
          </a>
          <div class="footer-contact pt-3">
            <p>Ali Pur Chowk, Rawalpindi Bypass, Gujranwala</p>
            <p>Punjab, PK 52250</p>
            <p class="mt-3">
              <strong>Phone:</strong> <span>+92 (055) 9201222</span>
            </p>
            <p><strong>Email:</strong> <span>infocell@pu.edu.pk</span></p>
          </div>
        </div>

        <div class="col-lg-2 col-md-3 footer-links">
          <h4>Useful Links</h4>
          <ul>
            <li><a href="../index.html">Home</a></li>
            <li><a href="../notices.html">Notices</a></li>
            <li><a href="../downloads.html">Downloads</a></li>
            <li><a href="../about.html">About</a></li>
            <li><a href="../contact.php">Contact</a></li>
          </ul>
        </div>

        <div class="col-lg-2 col-md-3 footer-links">
          <h4>Admissions</h4>
          <ul>
            <li>
              <a href="../admissions/announcements.html">Announcements</a>
            </li>
            <li><a href="../admissions/forms.html">Forms</a></li>
            <li><a href="../admissions/merit-lists.html">Merit Lists</a></li>
            <li>
              <a href="../admissions/fee-structure.html">Fee Structure</a>
            </li>
            <li>
              <a href="../admissions/scholarships.html">Scholarships</a>
            </li>
          </ul>
        </div>

        <div class="col-lg-4 col-md-6 footer-links">
          <h4>Academic</h4>
          <ul>
            <li><a href="../academics/departments.php">Departments</a></li>
            <li><a href="../academics/programs.php">Programs</a></li>
            <li><a href="../academics/faculty.php">Faculty</a></li>
            <li><a href="../campus-life/events.html">Events</a></li>
            <li><a href="../campus-life/gallery.php">Gallery</a></li>
          </ul>
        </div>
      </div>
    </div>

    <div class="container copyright text-center mt-4">
      <p>
        © <span>Copyright</span>
        <strong class="px-1 sitename">University of the Punjab, Gujranwala Campus</strong>
        <span>All Rights Reserved</span>
      </p>
    </div>
  </footer>

  <!-- Scroll Top -->
  <a
    href="#"
    id="scroll-top"
    class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/vendor/php-email-form/validate.js"></script>
  <script src="../assets/vendor/aos/aos.js"></script>
  <script src="../assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="../assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="../assets/vendor/swiper/swiper-bundle.min.js"></script>

  <!-- Main JS File -->
  <script src="../assets/js/main.js"></script>
</body>

</html>