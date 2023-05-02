<?php
include("conn.php");
$bdd=new PDO('mysql:host=localhost;dbname=lib', 'root','');
$req=$bdd->query("SELECT * from student_ext");
$sql = "SELECT * FROM student_ext";
$result = $conn->query($sql);
// login
session_start();
if (!isset($_SESSION['username'])) {
    header('Location:login.php');
}

if (isset($_GET['logout'])) {
  session_unset();
  session_destroy();

  header('Location:../index.php');
}

// add
$msg="";
if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['subb']))
{
  $name = $_POST['name'];
  $phone = $_POST['phone'];
  $cin = $_POST['cin'];
  $ref = $_POST['ref'];
  $bookname = $_POST['bookname'];
  $issueddate = $_POST['issueddate'];
  $expirydate = $_POST['expirydate'];
  $section = $_POST['section'];
  

  if(empty($name) || empty($phone) || empty($bookname))
{
  $msg= "All field are required";
}
else{
    $insert="INSERT INTO `student_ext`(`name`,`phone`,`cin`,`ref`,`bookname`,`issueddate`,`expirydate`,`section`) 
    VALUES('".$name."','".$phone."','".$cin."','".$ref."','".$bookname."','".$issueddate."','".$expirydate."','".$section."')";
    $data=mysqli_query($conn,$insert); 
//   $msg= "Sccessfully Added";
header('location:student-extern.php');
}}

// delete
if(isset($_GET['deleteid'])){
    $id=$_GET['deleteid'];
    $sql="DELETE FROM student_ext WHERE id='$id'";
    $deleteresult=mysqli_query($conn,$sql);
    if($deleteresult){
        header('Location:student-extern.php'); 
    }else {
        die(mysqli_error($conn));
    }
}

// return book checker
if(isset($_POST['save-btn']) && isset($_POST['expired'])) {
    $expired = $_POST['expired'];
    foreach ($expired as $value) {
        $req=$bdd->query("UPDATE student_ext set validation = 1 where id = $value ");
        $result = $conn->query($sql);
    }  
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="../css/bootstrap-5.min.css">
    <link rel="stylesheet" href="../font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/student-intern.css?<?=time()?>">
    <title>STUDENT EXTERN</title>
</head>
<body>
<section>
    <nav class="nav">
            <div class="menu">
                <a href="../admin.php">HOME</a>
                <a href="studentpage.php">STUDENT</a>
                <a href="#footer">ABOUT</a>
                <a href="contact.php" target="_blank">CONTACT US</a>
                <a href="student-extern.php?logout="><i class="fa fa-sign-out"></i> LOGOUT</a>
            </div>
    </nav>
</section>
<!-- end nav -->

<section id="header">
    <div class="desc" align="center">
        <h1>Borrowed books</h1>
        <!-- Button trigger modal -->
<button type="button" class="rounded-0 btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
ADD STUDENT
</button>
<!-- --------return book---------- -->
<button type="button" class="rounded-0 btn btn-success ps-4 pe-4" data-bs-toggle="modal" data-bs-target="#expiredModal">
EXPIRED
</button>
</section>
<!-- FOR ADD STUDENT -->
<form action="" method="POST">
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <img src="../img/Al_Akhawayn_University_Logo.png" alt="logo" width="100px">
                <h1 class="modal-title fs-3 w-100 text-center mt-3" id="exampleModalLabel">ADD STUDENT</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
                <div class="modal-body">
                    <div class="form-group">
                    <input type="text"  name="ref" class="form-control" id="ref" placeholder="REF">
                    </div><br>
                    <div class="form-group">
                    <input type="text" name="name"  class="form-control" id="fullname" placeholder="FULL NAME" required>
                    </div><br>
                    <div class="form-group">
                    <input type="text" name="phone" class="form-control" id="phone" placeholder="PHONE" required>
                    </div><br>
                    <div class="form-group">
                    <input type="text" name="cin"  class="form-control" id="cin" placeholder="CIN">
                    </div><br>
                    <div class="form-group">
                    <input type="text" name="bookname"  class="form-control" id="NAME" placeholder="BOOK NAME" required>
                    </div><br>
                    <div class="form-group">
                    <label for="ISSUED">ISSUED</label>
                    <input type="date" name="issueddate" class="form-control" id="ISSUED" placeholder="ISSUED">
                    </div><br>
                    <div class="form-group">
                    <label for="EXPIRYDATE">EXPIRY DATE</label>
                    <input type="date" name="expirydate" class="form-control" id="EXPIRY DATE" placeholder="EXPIRY DATE">
                    </div><br>
                    <div class="form-group">
                    <input type="text" name="section" class="form-control" id="EXPIRYDATE" placeholder="SECTION">
                    </div><br>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary rounded-0" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger ps-4 pe-4 border rounded-0" name="subb"><i class="fa fa-plus"></i> ADD</button>
                </div>
            </div>
        </div>
    </div>
</div>
</form>

<!-------EXPIRED----  -->
<form action="" method="POST">
<div class="modal fade bd-expired-modal-lg" id="expiredModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <img src="../img/Al_Akhawayn_University_Logo.png" alt="logo" width="100px">
                <h1 class="modal-title fs-3 w-100 text-center mt-3" id="expiredModalLabel">EXPIRY DATE</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <!-- BODY -->
<div class="modal-body">
<table id="expiredtable" class="table table-bordered table-striped shadow">
        <thead class="thead-dark"> 
            <th>FULL NAME</th>
            <th>PHONE</th>
            <th>EXPIRY DATE</th>
        </thead>
<tbody>
    <?php
    $result = mysqli_query($conn, $sql);
    $expiredRowsExist = false; // Add a flag to check if expired rows exist

    while($rows = mysqli_fetch_assoc($result)) {

        if (strtotime($rows["expirydate"]) < time() && $rows["validation"] == 0) { // Check if row is expired
            $expiredRowsExist = true;
            ?>
            <tr>
                <td><?php echo $rows['name'] ?></td>
                <td><?php echo $rows['phone'] ?></td>
                <td>
                    <input type="checkbox" name="expired[]" value="<?php echo $rows["id"] ?>" onchange="hideText(<?php echo $rows["id"] ?>)"><span id="expiry-span" style="color:red"> Expired </span>
                    <?php echo $rows['expirydate'] ?>
                </td>
            </tr>
            <?php 
        } 
    }  

    if (!$expiredRowsExist) { // Display a message if no expired rows found
        echo '<tr class="text-center"><td></td><td >No expired rows found</td><td></td></tr>';
    }
    ?>
</tbody>

</table>
</div>

            <br>
        <div class="modal-footer">
            <button type="button" class="btn btn-danger rounded-0" data-bs-dismiss="modal">Close</button>
            <button type="submit" name="save-btn" class=" btn btn-success ps-4 pe-4 border rounded-0"><i class="fa fa-check-square-o"></i> Validate</button>
        </div>
        </div>
    </div>
</div>
</form>

        <!-- TABLE -->
<div class="desc-table mb-5">
<form action="" method="POST">
<table id="myTable" class="table table-bordered table-striped shadow">
<thead class="thead-dark ">
    <th hidden>ID</th>
    <th>FULL NAME</th>
    <th>PHONE</th>
    <th>REF</th>
    <th>BOOK NAME</th>
    <th>ISSUED </th>
    <th>SECTION </th>
    <th>OPERATION</th>
</thead>
<tbody id="tbody">
    <?php

    $result = mysqli_query($conn, $sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td hidden>" . $row["id"] . "</td>";
            echo "<td>" . $row["name"] . "</td>";
            echo "<td>" . $row["phone"] . "</td>";
            echo "<td>" . $row["ref"] . "</td>";
            echo "<td>" . $row["bookname"] . "</td>";
            echo "<td>" . $row["issueddate"] . "</td>";
           
            echo "<td>" . $row["section"] . "</td>";
            echo '
            <td class="d-flex justify-content-around align-items-center">
                
            <a href="editExtStudent.php?updateid='.$row["id"].'" class="btn btn-success" name="edit">
                <i class="fa fa-edit"></i> 
            </a>

            <a href="student-extern.php?deleteid='.$row["id"].'" class=" btn btn-danger m-0" name="b_id"
                    onclick="return confirm(\'Are you sure you want to delete this student?\')">
                <i class="fa fa-trash"></i>
            </a>
            </td>';
            echo "</tr>";
        }
    
    } else {
        echo ' <tr> 
            <td colspan = "10" class="ref">Not found</td>
            </tr>';
    }
    ?>
</tbody>
</table>
</form>
</div>
<!-- --------footer------------------- -->
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
              <img src="../img/مركز أزرو للخدمات الإجتماعية المحلية.png" alt="footer" width="200px">  
              <div class="icones d-flex">
                <div class="icone1 pt-2 m-2">
                  <a href="https://www.facebook.com/AlAkhawayn/"  target="_blank"><i class="fa fa-facebook"></i></a>
                </div>
                <div class="icone2 pt-2 m-2 ">
                  <a href="https://www.linkedin.com/school/al-akhawayn-university/"  target="_blank"><i class="fa fa-linkedin"></i></a>
                </div>
                <div class="icone3 pt-2 m-2 ">
                  <a href="https://www.instagram.com/alakhawayn_university/?hl=en "  target="_blank"><i class="fa fa-instagram"></i></a>
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



<!-- --------js------ -->

<script src="../js/jquery-3.5.1.js"></script>
<script src="../js/jquery.dataTables.min.js"></script>
<script src="../js/dataTables.bootstrap5.min.js"></script>

<script src="../js/script.js"></script>

<script src="../js/bootstrap.bundle.min.js"></script>
<script src="../js/popper.min.js"></script>
<script src="../js/bootstrap.min.js"></script>



</body>
</html>