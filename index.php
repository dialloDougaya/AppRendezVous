
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


<section class="vh-100" style="background-color: #508bfc;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card shadow-2-strong" style="border-radius: 1rem;">
          <div class="card-body p-5 text-center">

            <h3 class="mb-5">AUTHENTIFICATION</h3>


                <?php 

if(isset($_POST['btn_valider'])){
 $email=$_POST['email'];
 $password=$_POST['password'];
     $con=new PDO('mysql:localhost=host;dbname=apprendezvous','root','');
        $verif_mail='';
        $pass='';
        $etat='';
       $rs=$con->prepare('select email,password,id,etat from utilisateurs where email=:t_email and password=:pass');
          $rs->bindvalue(':t_email',$email);
          $rs->bindvalue(':pass', $password);
          $rs->execute();
         $data=$rs->fetchAll(PDO::FETCH_ASSOC);
        foreach ($data as $key) {
         $verif_mail= $key['email'];
         
         $pass=$key['password'];
         $id=$key['id'];
         $etat=$key['etat'];
         $_SESSION['$id']=$id;

   }
   if(($verif_mail ==$email) && ($pass==$password)){

   	if($etat!=0){

   	 header('location:inscription.php');
   	}
   	else{
   	header('location:inscription_user.php');	
   	}

   }
   else{
   	    $message='Informations du compte incorrectes';
   	    ?>
   	  
          <h3 class="mb-55 small text-center" data-aos-duration="600" data-aos="fade-down" data-aos-delay="0" style=" color:red;font-size: 12px"><?=$message ;?></h3>

          <?php
   }

}


 ?>

       <form action="" method="POST">
       	
           <div class="form-outline mb-4">
              <input type="email" id="typeEmailX-2" class="form-control form-control-lg"  name="email" required="" />
              <label class="form-label" for="typeEmailX-2">Votre Email</label>
            </div>

            <div class="form-outline mb-4">
              <input type="password" id="typePasswordX-2" class="form-control form-control-lg" name="password" required="" />
              <label class="form-label" for="typePasswordX-2">Password</label>
            </div>

            

            <button class="btn btn-primary btn-lg btn-block" type="submit" name="btn_valider">Login</button>


       </form>

            

          </div>
        </div>
      </div>
    </div>
  </div>
</section>




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
