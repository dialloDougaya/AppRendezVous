


<?php 

session_start();

 ?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Plate forme Rendez vous</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: iPortfolio
  * Updated: Mar 10 2023 with Bootstrap v5.2.3
  * Template URL: https://bootstrapmade.com/iportfolio-bootstrap-portfolio-websites-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Mobile nav toggle button ======= -->
  <i class="bi bi-list mobile-nav-toggle d-xl-none"></i>

  <!-- ======= Header ======= -->
  <header id="header">
    <div class="d-flex flex-column">

      <div class="profile">
        <img src="assets/img/profile-img1.jpg" alt="" class="img-fluid rounded-circle">
        <h1 class="text-light"><a href="MAJ_Profil.php">Profil</a></h1>
        <div class="social-links mt-3 text-center">
          <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
          <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
          <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
          <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
          <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
        </div>
      </div>

      <nav id="navbar" class="nav-menu navbar">
        <ul>
         <li><a href="#hero" class="nav-link scrollto active"><i class="bx bx-home"></i> <span>Home</span></a></li>
          <li><a href="#about" class="nav-link scrollto"><i class="bx bx-user"></i> <span>Inscription</span></a></li>
          <li><a href="Rendezvous.php" class="nav-link scrollto"><i class="bx bx-file-blank"></i> <span>Rendez-Vous</span></a></li>
          <li><a href="Liste_rendez_vous_Notif.php" class="nav-link scrollto"><i class="bx bx-book-content"></i> <span>Notification</span></a></li>

         <li><a href="index.php" class="nav-link scrollto"><i class="bx bx-book-content"></i> <span>Deconnexion</span></a></li>
          
 

        </ul>
      </nav><!-- .nav-menu -->
    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex flex-column justify-content-center align-items-center">
    <div class="hero-container" data-aos="fade-in">
      <h1>Application Rendez vous</h1>
      <p &ensp>  <span class="typed" data-typed-items="Rencontre, Echange, Partage"></span></p>
    </div>
  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= About Section ======= -->

<?php 
 


 if(isset($_POST['btn_envoyer'])){
  $id_R=$_GET['id'];
   $id_rend=$_GET['id'];
   $type=$_POST['type_note'];
   $contenu=$_POST['note'];
  
    $verifi=false;

     $con=new PDO('mysql:localhost=host;dbname=apprendezvous','root','');
        $verif_mail='';

      
           $req=$con->prepare('INSERT INTO  Notification(id_rend,type,contenu) VALUES(:id_r,:type,:contenu) ');
            $req->bindvalue(':id_r',$id_rend);
            $req->bindvalue(':type',$type);
            $req->bindvalue(':contenu',$contenu);
           

           try {
           
             $req->execute();
             $verifi=true;
           } catch (Exception $e) {

           $verifi=false;
           }
        

        $message='';
        if($verifi){
           $message='Notification envoyee';
        }
        else{
          $message='Notification non envoyee';
            }


       

           



   
       ?>
         <br>
          <h3 class="mb-55 small text-center" data-aos-duration="600" data-aos="fade-down" data-aos-delay="0" style=" color:#589673;font-size: 20px"><?=$message ;?></h3>

          <?php


     }




 ?>




    <section id="about" class="about">
      <div class="container">

        <div class="row">
          
          <div class="col-lg-4" data-aos="fade-right">
            <img src="assets/img/profile-img22.jpg" class="img-fluid" alt="">
          </div>
          <div class="col-lg-12 pt-6 pt-lg-0 content" data-aos="fade-left">
             <form action="" method="POST">

               <div class="form-group mt-3">
             <SELECT  class="form-select" required="required" name="type_note"> 
             <option>Confirmation </option>
              <option>Rappel </option>
               <option>Annulation </option>
             </SELECT>
              </div>
            
             <div class="form-group mt-3">
                <textarea class="form-control" name="note" rows="5" placeholder="Notification" required></textarea>
              </div>
              <br>

             <div class="row">

               <div class="text-center"><button type="submit" class="btn btn-primary" name="btn_envoyer">envoyer</button></div>

               <a href="liste_rendez_vous_Notif.php" style="text-align:right;">Retour</a>

              </div>

               
             

            </form>
          </div>
        </div>

      </div>


    </section><!-- End About Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>DougayaTech</span></strong>
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/iportfolio-bootstrap-portfolio-websites-template/ -->

      </div>
    </div>
  </footer><!-- End  Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/typed.js/typed.min.js"></script>
  <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>
</html>
