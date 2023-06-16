
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
 

 if(isset($_POST['btn_valider'])){

   $nom=$_POST['nom'];
   $email=$_POST['email'];
   $password=$_POST['password'];
   $telephone=$_POST['telephone'];
   $type_user=$_POST['type_user'];

   $val='0';
   if($type_user=='Administrateur'){
    $val='1';
   }

    $verifi=false;

     $con=new PDO('mysql:localhost=host;dbname=apprendezvous','root','');
        $verif_mail='';
       $rs=$con->prepare('select email from utilisateurs where email=:t_email');
          $rs->bindvalue(':t_email',$email);
          $rs->execute();
         $data=$rs->fetchAll(PDO::FETCH_ASSOC);
        foreach ($data as $key) {
         $verif_mail= $key['email'];
   }
       if($verif_mail ==''){

 $req=$con->prepare('INSERT INTO utilisateurs(nom,email,password,NumTel,role,etat) values(:nom,:email,:password,:tel,:rol,:val)');

            $req->bindvalue(':nom',$nom);
            $req->bindvalue(':email',$email);
            $req->bindvalue(':password',$password);
            $req->bindvalue(':tel',$telephone);
            $req->bindvalue(':rol', $type_user);
            $req->bindvalue(':val', $val);

           try {

             $req->execute();
         

            header('location:index.php');

             $verifi=true;
           } catch (Exception $e) {

           $verifi=false;
           }
        

        $message='';
        if($verifi){
           $message='Inscription effectuée';
        }
        else{
          $message='Inscription non reussi';
        }

       }
       else{
        $message='Cet Mail existe dejà';
       }

   
       ?>
          <h3 class="mb-55 small text-center" data-aos-duration="600" data-aos="fade-down" data-aos-delay="0" style=" color:#589673;font-size: 30px"><?=$message ;?></h3>

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
              <div class="row">
                <div class="col-md-6 form-group">
                  <input type="text" name="nom" class="form-control" placeholder="Nom" required>
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <input type="email" class="form-control" name="email"placeholder="Email" required>
                </div>
              </div>
                <br>
              <div class="row">
                <div class="col-md-6 form-group">
                  <input type="password" name="password" class="form-control"  placeholder="Mot de passe" required>
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <input type="text" class="form-control" name="telephone"  placeholder="N°Telephone" required>
                </div>
              </div>
            
              <div class="form-group mt-3">
               
             <SELECT  class="form-select" required="required" name="type_user"> 
              
              <option>Employe </option>
               <option>Client </option>
             </SELECT>
              </div>
              <br>

             <div class="mb-3">
              <input type="file" class="form-control" id="adresse" placeholder="Rechercher" name="fichier_">
            <br>
          </div>

              <div class="text-center"><button type="submit" class="btn btn-primary" name="btn_valider">Inscrire</button></div>

             

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