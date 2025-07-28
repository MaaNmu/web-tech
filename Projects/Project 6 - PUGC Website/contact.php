<?php

require_once './config/database.php';

$response = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  header('Content-Type: application/json');
  header('Access-Control-Allow-Origin: *');

  $name = htmlspecialchars(trim($_POST['name']));
  $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
  $subject = htmlspecialchars(trim($_POST['subject']));
  $message = htmlspecialchars(trim($_POST['message']));

  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo json_encode(['status' => '400', 'message' => 'Invalid email format.']);
    exit;
  }

  $stmt = $conn->prepare("INSERT INTO contacts (name, email, subject, message) VALUES (?, ?, ?, ?)");
  $stmt->bind_param("ssss", $name, $email, $subject, $message);

  if ($stmt->execute()) {
    echo json_encode(['status' => '200', 'message' => 'Message sent successfully.']);
  } else {
    echo json_encode(['status' => '500', 'message' => 'Failed to send message.']);
  }

  $stmt->close();
  exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta content="width=device-width, initial-scale=1.0" name="viewport" />
  <title>Contact - PUGC</title>
  <meta name="description" content="" />
  <meta name="keywords" content="" />

  <!-- Favicons -->
  <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico" />
  <link rel="apple-touch-icon" sizes="180x180" href="assets/img/apple-touch-icon.png" />
  <link rel="icon" type="image/png" sizes="32x32" href="assets/img/favicon-32x32.png" />
  <link rel="icon" type="image/png" sizes="16x16" href="assets/img/favicon-16x16.png" />
  <link rel="manifest" href="assets/img/site.webmanifest" />
  <link rel="mask-icon" href="assets/img/safari-pinned-tab.svg" color="#324c80" />
  <meta name="msapplication-TileColor" content="#324c80" />
  <meta name="theme-color" content="#324c80" />

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect" />
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900&display=swap" rel="stylesheet" />

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet" />
  <link href="assets/vendor/aos/aos.css" rel="stylesheet" />
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet" />
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet" />

  <!-- Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet" />
</head>

<body class="contact-page">
  <header id="header" class="header d-flex align-items-center sticky-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center">
      <a href="index.html" class="logo d-flex align-items-center me-auto">
        <img src="assets/img/logo.svg" alt="" />
        <h1 class="sitename">University of the Punjab, Gujranwala Campus</h1>
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="index.html">Home<br /></a></li>
          <li class="dropdown">
            <a href="#"><span>Admissions</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
            <ul>
              <li><a href="admissions/announcements.html">Announcements</a></li>
              <li><a href="admissions/forms.html">Forms</a></li>
              <li><a href="admissions/merit-lists.html">Merit Lists</a></li>
              <li><a href="admissions/fee-structure.html">Fee Structure</a></li>
              <li><a href="admissions/scholarships.html">Scholarships</a></li>
            </ul>
          </li>
          <li class="dropdown">
            <a href="#"><span>Academics</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
            <ul>
              <li><a href="academics/departments.php">Departments</a></li>
              <li><a href="academics/programs.php">Programs</a></li>
              <li><a href="academics/faculty.php">Faculty</a></li>
            </ul>
          </li>
          <li class="dropdown">
            <a href="#"><span>Campus Life</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
            <ul>
              <li><a href="campus-life/facilities.html">Facilities</a></li>
              <li><a href="campus-life/societies.html">Societies</a></li>
              <li><a href="campus-life/events.html">Events</a></li>
              <li><a href="campus-life/gallery.php">Gallery</a></li>
            </ul>
          </li>
          <li><a href="notices.html">Notices</a></li>
          <li><a href="downloads.html">Downloads</a></li>
          <li><a href="about.html">About</a></li>
          <li><a href="contact.php" class="active">Contact</a></li>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>
    </div>
  </header>

  <main class="main">
    <div class="page-title" data-aos="fade">
      <div class="heading">
        <div class="container">
          <div class="row d-flex justify-content-center text-center">
            <div class="col-lg-8">
              <h1>Contact</h1>
              <p class="mb-0">Get in touch with us for any queries or information.</p>
            </div>
          </div>
        </div>
      </div>
      <nav class="breadcrumbs">
        <div class="container">
          <ol>
            <li><a href="index.html">Home</a></li>
            <li class="current">Contact</li>
          </ol>
        </div>
      </nav>
    </div>

    <section id="contact" class="contact section">
      <div class="mb-5" data-aos="fade-up" data-aos-delay="200">
        <iframe style="border: 0; width: 100%; height: 300px" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3376.514868539331!2d74.15040847393593!3d32.19035441373887!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x391f2916d2863087%3A0x5f782204afdc2622!2sUniversity%20Of%20The%20Punjab%20-%20Gujranwala%20Campus!5e0!3m2!1sen!2s!4v1726912146839!5m2!1sen!2s" width="600" height="450" style="border: 0" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
      </div>

      <div class="container" data-aos="fade-up" data-aos-delay="100">
        <div class="row gy-4">
          <div class="col-lg-4">
            <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="300">
              <i class="bi bi-geo-alt flex-shrink-0"></i>
              <div>
                <h3>Address</h3>
                <p>Ali Pur Chowk, Rawalpindi Bypass, Gujranwala<br />Punjab, PK 52250</p>
              </div>
            </div>

            <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="400">
              <i class="bi bi-telephone flex-shrink-0"></i>
              <div>
                <h3>Call Us</h3>
                <p>+92 (055) 9201222</p>
              </div>
            </div>

            <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="500">
              <i class="bi bi-envelope flex-shrink-0"></i>
              <div>
                <h3>Email Us</h3>
                <p><a href="mailto:infocell@pu.edu.pk">infocell@pu.edu.pk</a></p>
              </div>
            </div>
          </div>

          <div class="col-lg-8">
            <form id="contactForm" role="form" class="php-email-form" data-aos="fade-up" data-aos-delay="600">
              <div class="row gy-4">
                <div class="col-md-6">
                  <input type="text" name="name" class="form-control" placeholder="Your Name" required />
                </div>

                <div class="col-md-6">
                  <input type="email" class="form-control" name="email" placeholder="Your Email" required />
                </div>

                <div class="col-md-12">
                  <input type="text" class="form-control" name="subject" placeholder="Subject" required />
                </div>

                <div class="col-md-12">
                  <textarea class="form-control" name="message" rows="6" placeholder="Message" required></textarea>
                </div>

                <div class="col-md-12 text-center">
                  <div class="loading">Loading</div>
                  <div class="alert"></div>
                  <button type="submit">Send Message</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>
  </main>

  <footer id="footer" class="footer position-relative light-background">
    <div class="container footer-top">
      <div class="row gy-4">
        <div class="col-lg-4 col-md-6 footer-about">
          <a href="index.html" class="logo d-flex align-items-center">
            <span class="sitename">University of the Punjab, Gujranwala Campus</span>
          </a>
          <div class="footer-contact pt-3">
            <p>Ali Pur Chowk, Rawalpindi Bypass, Gujranwala</p>
            <p>Punjab, PK 52250</p>
            <p class="mt-3"><strong>Phone:</strong> <span>+92 (055) 9201222</span></p>
            <p><strong>Email:</strong> <span>infocell@pu.edu.pk</span></p>
          </div>
        </div>

        <div class="col-lg-2 col-md-3 footer-links">
          <h4>Useful Links</h4>
          <ul>
            <li><a href="index.html">Home</a></li>
            <li><a href="notices.html">Notices</a></li>
            <li><a href="downloads.html">Downloads</a></li>
            <li><a href="about.html">About</a></li>
            <li><a href="contact.php">Contact</a></li>
          </ul>
        </div>

        <div class="col-lg-2 col-md-3 footer-links">
          <h4>Admissions</h4>
          <ul>
            <li><a href="admissions/announcements.html">Announcements</a></li>
            <li><a href="admissions/forms.html">Forms</a></li>
            <li><a href="admissions/merit-lists.html">Merit Lists</a></li>
            <li><a href="admissions/fee-structure.html">Fee Structure</a></li>
            <li><a href="admissions/scholarships.html">Scholarships</a></li>
          </ul>
        </div>

        <div class="col-lg-4 col-md-6 footer-links">
          <h4>Academic</h4>
          <ul>
            <li><a href="academics/departments.php">Departments</a></li>
            <li><a href="academics/programs.php">Programs</a></li>
            <li><a href="academics/faculty.php">Faculty</a></li>
            <li><a href="campus-life/events.html">Events</a></li>
            <li><a href="campus-life/gallery.php">Gallery</a></li>
          </ul>
        </div>
      </div>
    </div>

    <div class="container copyright text-center mt-4">
      <p>© <span>Copyright</span> <strong class="px-1 sitename">University of the Punjab, Gujranwala Campus</strong> <span>All Rights Reserved</span></p>
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
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>

  <!-- Main JS File -->
  <script src="assets/js/main.js"></script>

  <script>
    document.getElementById('contactForm').addEventListener('submit', async function(e) {
      e.preventDefault();
      const formData = new FormData(this);
      const alertDiv = document.querySelector('.alert');
      const loadingDiv = document.querySelector('.loading');

      try {
        alertDiv.classList.remove('alert-danger', 'alert-success', 'alert-primary');
        alertDiv.textContent = '';
        loadingDiv.style.display = 'block';

        const response = await fetch('contact.php', {
          method: 'POST',
          body: formData
        });

        const data = await response.json();

        loadingDiv.style.display = 'none';

        if (data.status === '200') {
          alertDiv.classList.add('alert-success');
          alertDiv.textContent = data.message;
          this.reset();
        } else {
          alertDiv.classList.add('alert-danger');
          alertDiv.textContent = data.message;
        }
      } catch (error) {
        loadingDiv.style.display = 'none';
        alertDiv.classList.add('alert-danger');
        alertDiv.textContent = 'Failed to send message.';
      }
    });
  </script>
</body>

</html>