<?php 
include('phps/conn.php');
$bdd=new PDO('mysql:host=localhost;dbname=lib', 'root','');
$req=$bdd->query("SELECT * from book");
// login
session_start();
if (!isset($_SESSION['username'])) {
    header('Location:login.php');
}

if (isset($_GET['logout'])) {
  session_unset();
  session_destroy();

  header('Location:index.php');
}
// delete
if(isset($_GET['deleteid'])){
  $id=$_GET['deleteid'];
  $sql="DELETE FROM book WHERE b_id='$id'";
  $deleteresult=mysqli_query($conn,$sql);
  if($deleteresult){
      header('Location:admin.php');
  }else {
      die(mysqli_error($conn));
  }
}
// 
$sql="SELECT * FROM book ";
$result=mysqli_query($conn,$sql);
// ADD
if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['submit']))
{
  $booksname=$_POST['booksname'];
  $authorname=$_POST['authorname'];
  $id=$_POST['b_id'];  
  $dept=$_POST['dept'];

  if(empty($booksname) || empty($authorname) || empty($id))
{
  $msg= "All field are required";
}
else{
    $insert="INSERT INTO `book`(`b_id`,`booksname`,`authorname`,`dept`) VALUES('".$id."',:b,'".$authorname."','".$dept."')";
   $st = $bdd->prepare($insert);
   $st->execute(['b'=>$booksname]);
   $res = $st->fetchAll(PDO::FETCH_OBJ);
    // $data=mysqli_query($conn,$insert); 
//   $msg= "Sccessfully Added";
header('location:admin.php');
}}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="css/bootstrap-5.min.css">
    <link rel="stylesheet" href="css/style.css?x=<?=time()?>">
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" >

    <title>Library Azrou Center</title>
</head>
<body>
<!-- navs -->
<section>
    <nav class="nav">
        <div class="menu-list">
            <a href="phps/studentpage.php" class="">STUDENT</a>
            <a href="#books">BOOKS</a>
            <a href="#footer">ABOUT US</a> 
            <a href="phps/contact.php"  target="_blank">CONTACT US</a>
            <a href="admin.php?logout="><i class="fa fa-sign-out"></i> LOGOUT</a>
        </div>
    </nav>
</section>
<!-- header -->
<section class="contenu">
    <div class="sideright">
        <h1>LIBRARY AZROU CENTER</h1>
        <div class="info">
            <p>Created in 2002 by Al Akhawayn University as a result of tripartite convention with the Society of Friends of Al Akhawayn University in Saudi Arabia and the King Fahd Middle East Studies program at Arkansas University in the United States,
                the Azrou Center for Local Community Services is an institution with social vocation. It has total financial autonomy, and thus, it tries to solicit sponsorship and partnership so as to finance its different projects.</p>
        </div>
    </div>
    <div class="sideleft">
        <div id="carouselExampleControls" class="carousel slide shadow" data-ride="carousel" style="width:100%;">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="img/2.png" alt="First slide">
                </div>
                <div class="carousel-item">
                    <img src="img/1.png" alt="Second slide">
                </div>
                <div class="carousel-item">
                    <img src="img/3.png" alt="Third slide">
                </div>
                <div class="carousel-item">
                    <img src="img/4.png" alt="four slide">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
</section>
<!-- /////////////////ADD BTN//////////////////// -->
<div class="text-center mt-3">
        <h1>TABLE OF LIBRARY BOOK </h1>
        <button type="button" class="rounded-0 btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
        ADD BOOK
        </button>
</div>
<form action="" method="POST">
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <img src="img/Al_Akhawayn_University_Logo.png" alt="logo" width="100px">
                <h1 class="modal-title fs-3 w-100 text-center mt-3" id="exampleModalLabel">ADD BOOK</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
                <div class="modal-body">
                    <div class="form-group">
                    <label for="bookname">BOOK NAME:</label>
                    <input type="text"  name="booksname" class="form-control" id="booksname" placeholder="BOOK NAME" required>
                    </div><br>
                    <div class="form-group">
                    <label for="authorname">AUTHOR NAME:</label>
                    <input type="text" name="authorname"  class="form-control" id="authorname" placeholder="AUTHOR NAME" required>
                    </div><br>
                    <div class="form-group">
                        <label for="REF">BOOK REF:</label>
                    <input type="text" name="b_id" class="form-control" id="b_id" placeholder="REF" >
                    </div><br>
                    <div class="form-group">
                        <label for="dept">DEPARTMENT:</label>
                        <select name="dept" id="dp" class="departement form-select">
                            <option value="Social Sciences">Social Sciences</option>
                            <option value="Politique Sciences">Politique Sciences</option>
                            <option value="Law">Law</option>
                            <option value="Health">Health</option>
                            <option value="Theory & Pratique ">Theory & Pratique </option>
                            <option value="Education">Education</option>
                            <option value="English">English </option>
                            <option value="Dictionaries">Dictionaries</option>
                            <option value="PZA / قصص الصغار">PZA / قصص الصغار</option>
                            <option value="Children's book">Children's book</option>
                            <option value="الادب العربي">الادب العربي</option>
                            <option value="Collection / Series">Collection / Series</option>
                            <option value="litterature français">litterature français</option>
                            <option value="Encyclopedias">Encyclopedias</option>
                            <option value="cuisine">Cuisine</option>
                        </select>
                    </div><br>
                    
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary rounded-0" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger ps-4 pe-4 border rounded-0" name="submit"><i class="fa fa-plus"></i> ADD</button>
                    </div>
                </div>
        </div>
    </div>
</div>
</form>
<!--------------table------------------>
<section id="books">
<div class="container mt-5 mb-4">
    <div class="row">
    <table id="myTable" class="table table-striped table-bordered m-auto" style="width:100%">
        <thead class="thead-dark">
            <tr>
                <th>REF</th>
                <th>BOOK NAME</th>
                <th>AUTHOR NAME</th>
                <th>DEPARTEMENT</th>
                <th>OPERATION</th>
            </tr>
        </thead>
        <tbody>
        <?php
        $result = mysqli_query($conn, $sql);
                
        // Display the table rows
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
              $id =$row['b_id'];
            echo '<tr>';
            echo '<td>' . $row['b_id'] . '</td>';
            echo '<td>' . $row['booksname'] . '</td>';
            echo '<td>' . $row['authorname'] . '</td>';
            echo '<td>' . $row['dept'] . '</td>';
            echo '<td class="d-flex justify-content-around align-items-center p-1">
            <a href="phps/edit_book.php?updateid='.$row['b_id'].'" class="btn btn-success " name="b_id"><i class="fa fa-edit"></i></a>
            <a href="admin.php?deleteid='.$row['b_id'].'" class="btn btn-danger m-0" name="b_id"
                onclick="return confirm(\'Are you sure you want to delete this book?\')"><i class="fa fa-trash"></i></a>
            </td>';
            echo '</tr>';
          }
        } else { 
          echo '<tr><td colspan="6">No results found.</td></tr>';
        }
        ?>
        </tbody>
    </table>
    </div>
</div>
</section>


<!-- footer -->
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
              <img src="img/مركز أزرو للخدمات الإجتماعية المحلية.png" alt="footer" width="220px">  
              <div class="icones d-flex">
                <div class="icone1 pt-2 m-2">
                  <a href="https://www.facebook.com/AlAkhawayn/"><i class="fa fa-facebook"></i></a>
                </div>
                <div class="icone2 pt-2 m-2 ">
                  <a href="https://www.linkedin.com/school/al-akhawayn-university/"><i class="fa fa-linkedin"></i></a>
                </div>
                <div class="icone3 pt-2 m-2 ">
                  <a href="https://www.instagram.com/alakhawayn_university/?hl=en"><i class="fa fa-instagram"></i></a>
                </div>
                <div class="icone4 pt-2 m-2">
                  <a href="https://www.youtube.com/@AlAkhawaynUni"><i class="fa fa-youtube"></i></a>
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
    <!--js table -->
<script src="js/jquery-3.5.1.js"></script>
<script src="js/jquery.dataTables.min.js"></script>
<script src="js/dataTables.bootstrap5.min.js"></script>
<script>
 $(document).ready(function () {
    $('#myTable').DataTable();
});
</script>
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