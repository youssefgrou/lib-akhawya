<?php 
include("phps/conn.php");
$bdd=new PDO('mysql:host=localhost;dbname=lib', 'root','');
$req=$bdd->query("SELECT * from book");

?>

<!DOCTYPE html>
<html >
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap-5.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" >
    <link rel="stylesheet" href="css/index.css?x=<?=time()?>">
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
    <title>Library book Al Akhawayn</title>
</head>
<body>
<section>
    <nav class="nav">
        <div class="menu">
            <a href="#footer">ABOUT US</a> 
            <a href="phps/contact.php" target="_blank">CONTACT US</a>
            <a href="login.php" class="admin">LOGIN</a>
        </div>
    </nav>
</section>
    <!-- --------header------- -->
<section class="contenu">
<div class="sideright">
            <h1>LIBRARY AZROU CENTER</h1>
        <div class="info">
                <p>Created in 2002 by Al Akhawayn University as a result of tripartite convention with the Society of Friends of Al Akhawayn University in Saudi Arabia and the King Fahd Middle East Studies program at Arkansas University in the United States,
                    the Azrou Center for Local Community Services is an institution with social vocation. It has total financial autonomy, and thus, it tries to solicit sponsorship and partnership so as to finance its different projects.</p>
        </div>
</div>
<div class="sideleft">
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item ">
      <img class="" src="img/1.png" alt="First slide">
    </div>
    <div class="carousel-item ">
      <img class="" src="img/2.png" alt="Second slide">
    </div>
    <div class="carousel-item ">
      <img class="" src="img/3.png" alt="Third slide">
    </div>
    <div class="carousel-item active">
      <img class="" src="img/4.png" alt="four slide">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
  </a>
</div>
</div>
</section>

  <!-- -----body----- -->

<section id="books">
    
    <div class="m-3 text-center" align="center">
        <h1>Library Management System</h1>
        <p>A service dedicated to Admin and Student. We provide online resources,
             professional support and guidance to all our students whenever, 
             and from wherever they have chosen to study.
        </p>
    </div>
    <div class="myEdit py-5">
        <div class="panel-admin text-center p-3">
            <img src="img/admin.png" alt="admin img" width="150px"><br><br>
            <a href="admin.php" class="admin-btn">ADMIN</a>
        </div>
        <div class="panel-student text-center ">
            <img src="img/student.png" alt="visitor img"  width="200px"><br>
            <a href="visitor.php">VISITOR</a>
        </div>
    </div>
</section>

<!-- -- - Footer --------->
<section id="footer" >
   
    <footer class="text-white" style="background-color:#00683a">
      <!-- Grid container -->
      <div>
        <!--Grid row-->
        <div class="row p-1 m-0">
          <!--Grid column-->
          <div class="col-lg-5 col-md-12 mb-4 mb-md-0">
            <h5 class="text-uppercase">Azrou Center for Community Development</h5>
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d26637.219814880045!2d-5.261109584375004!3d33.43230359999999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xda1c5aa3bde8093%3A0xd2118653e3a0c023!2sCentre%20d&#39;Azrou%20pour%20le%20D%C3%A9veloppement%20Communautaire!5e0!3m2!1sen!2sma!4v1679321500198!5m2!1sen!2sma"
                width="450" height="190" style="border:none" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
            </iframe>
          </div>
  
          <!--Grid column-->
          <div class="col-lg-4 col-md-6 mb-4 mb-md-0 pt-5">
            <h5 class="text-uppercase">CONTACT US :</h5>
  
            <ul class="list-unstyled mb-0">
              <li>
              <p><i class="fa fa-calendar"></i> Opening time : Monday - Friday</p>
              </li>
              <li>
              <p><i class="fa fa-clock-o"></i> Work Hours : 8:30 a.m. - 5:30 p.m.</p>
              </li>
              <li>
            <p><i class="fa fa-phone"></i><a class="text-white" href="tel:(+212)-535-862338"> (+212)-535-862338 / (+212)-535-862696</a> </p>
            </li>
            <li>
            <p><i class="fa fa-envelope"></i><a class="text-white" href="mailto:azroucenter@aui.ma"> azroucenter@aui.ma</a> </p>
            </li>
            </ul>
          </div>
          <!--Grid column-->
  
          <!--Grid column-->
          <div class="col-lg-3 col-md-6 mb-4 mb-md-0 mt-3">
              <img src="img/مركز أزرو للخدمات الإجتماعية المحلية.png" alt="footer" width="200px">  
              <div class="icones d-flex">
                <div class="icone1 pt-2 m-2">
                  <a href="https://www.facebook.com/AlAkhawayn/"  target="_blank"><i class="fa fa-facebook"></i></a>
                </div>
                <div class="icone2 pt-2 m-2 ">
                  <a href="https://www.linkedin.com/school/al-akhawayn-university/"  target="_blank"><i class="fa fa-linkedin"></i></a>
                </div>
                <div class="icone3 pt-2 m-2 ">
                  <a href="https://www.instagram.com/alakhawayn_university/?hl=en"  target="_blank"><i class="fa fa-instagram"></i></a>
                </div>
                <div class="icone4 pt-2 m-2">
                  <a href="https://www.youtube.com/@AlAkhawaynUni"  target="_blank"><i class="fa fa-youtube"></i></a>
                </div>
              </div>        
          </div>
        </div>
      </div>
      <div class="text-center p-1" style="background-color: rgba(0, 0, 0, 0.2);">
        © 2023 Copyright :
        <a class="text-white" href="http://www.aui.ma/azroucenter.html">AZROU CENTER </a>
      </div>
    </footer>
  </section>




<!-- js -->
 
<!--  -->
<script src="js/bootstrap.bundle.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/script.js"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
</html>
