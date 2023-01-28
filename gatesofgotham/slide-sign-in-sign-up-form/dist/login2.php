<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Login</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="../../../assets/img/gate.png" rel="icon">
  <link href="../../../assets/img/gate.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="../../../assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="../../../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../../../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../../../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="../../../assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="../../../assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="../../../assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Techie - v4.9.1
  * Template URL: https://bootstrapmade.com/techie-free-skin-bootstrap-3/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

<?php
    $username = "admin";
    $password = "admin";
    session_start();
    if(isset($_SESSION['username'])){
?>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top header-inner-pages">
    <div class="container d-flex align-items-center justify-content-between">
      <h1 class="logo"><a href="index.html">GOG</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
          <li><a class="nav-link scrollto" href="#about">About</a></li>
          <li><a class="nav-link scrollto" href="#services">Team</a></li>
          <li><a class="nav-link scrollto" href="#testimonials">Testimonials</a></li>
          <li><a class="nav-link scrollto " href="#portfolio">News</a></li>
          <li><a class="nav-link scrollto " href="#faq">FAQ</a></li>
          <li><a class="nav-link scrollto " href="logout.php" class="btn">Logout</a></li>
          <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
          <li><a class="getstarted scrollto" href="#about">Get Started</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Welcome Admin !</h2>
          <ol>
            <li><a href="../../../index-page.html">Home</a></li>
            <li>Complaints Page</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->

    <section class="inner-page">
      <div class="container">
      <span class="navbar" id="navbar">
			<!-- <a href="http://localhost/techie/gatesofgotham/table-responsive/dist/table.php" class="viewComplaints" style="  align-items: center; font-family: 'Open Sans', sans-serif; font-weight: 1000; border: #772cdc solid 2px; border-radius: 5%; padding: 10px;">View Complaints</a>
			<p></p> -->
            <ul>
                <li>
                    <a href="http://localhost/techie/gatesofgotham/table-responsive/dist/table.php" class="getstarted scrollto" style="color: #762cdd; border-color: #1f2739;">View Complaints</a>                   
                </li>
            </ul>
		</span>
      </div>
    </section>

  </main><!-- End #main -->

    <?php
    	}
        else{
		if($_POST['username']==$username && $_POST['password']==$password){
			
				$_SESSION['username']=$username;
				?>
				<script> 
					alert('Successfully logged in!') 
				</script> 
				
				<div class='nav'>
					<div class='logo'> 
						<h1>ADMIN PORTAL</h1>
					</div>
					<div class='btn'>  
						<a style="  font-family: 'Courier New', Courier, monospace;" href='logout.php'>Logout</a>
					</div>
				</div>
				
				<div class="main">
					<h1>Welcome admin !!</h1><br><br><br><br><br><br>
					<span class="view">
						<a href="../../../index-page.html" >View Complaints</a>
					</span>
				</div>	
	    <?php		
		    }
		    else{
				?>
				<script> 
					alert('The Username/Password entered by you is incorrect. Please Try Again!!!') 

				</script> 
				echo "<script>location.href='login.html'</script>"
				<?php
		    }
        }

    ?>

  <!-- ======= Footer ======= -->
  <footer id="footer">

    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-contact">
            <h3>GOG</h3>
            <p>
              VIT Pune<br>
              Maharashtra<br>
              India <br><br>
              <strong>Phone:</strong> +91 988 121 0225<br>
              <strong>Email:</strong> mustansir.bohari21@vit.edu<br>
            </p>
          </div>

          <div class="col-lg-2 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Home</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">About us</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Services</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Terms of service</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Privacy policy</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
          </div>

          <div class="col-lg-4 col-md-6 footer-newsletter">
            <h4>Join Our Newsletter</h4>
            <p>Get latest crime news every week</p>
            <form action="" method="post">
              <input type="email" name="email"><input type="submit" value="Subscribe">
            </form>
          </div>

        </div>
      </div>
    </div>

    <div class="container">

    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="../../../assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="../../../assets/vendor/aos/aos.js"></script>
  <script src="../../../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../../../assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="../../../assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="../../../assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="../../../assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="../../../assets/js/main.js"></script>

</body>

</html>