<?php
include ("conn.php");

$id='';
$name='';
$phone='';
$cin='';
$ref='';
$bookname='';
$issueddate='';
$expirydate='';
$section='';

if (isset($_GET['updateid'])) {
    $id = $_GET['updateid'];
    $req = "SELECT * FROM student_int where id ='$id'";
    $st = $db->prepare($req);
    $st->execute();
    $res = $st->fetchAll(PDO::FETCH_OBJ);

    if (count($res)>0) {
        $res = $res[0];
        $id= $res->id ;
        $name= $res->name ;
        $phone=$res->phone;
        $cin=$res->cin;
        $ref=$res->ref;
        $bookname=$res->bookname;
        $issueddate=$res->issueddate;
        $expirydate=$res->expirydate;
        $section=$res->section;
    }
}
if(isset($_POST['subb']))
{
    $id=$_POST['id'];
    $name=$_POST['name'];
    $phone=$_POST['phone'];
    $cin=$_POST['cin'];
    $ref=$_POST['ref'];
    $bookname=$_POST['bookname'];
    $issueddate=$_POST['issueddate'];
    $expirydate=$_POST['expirydate'];
    $section=$_POST['section'];
    $sql="UPDATE student_int SET name='$name', phone='$phone',cin='$cin', 
            ref='$ref', bookname ='$bookname', issueddate = '$issueddate',
            expirydate = '$expirydate', section='$section' 
            WHERE id ='$id'";

    $st = $db->prepare($sql);
    $res = $st->execute();

    if ($res) {
        header('location:student-intern.php');
    }else {
        echo 'xxxxxxxxxx';
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap-5.min.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/editStudent.css">
    <title>EDIT STUDENT</title>
</head>
<body>
<section>
    <nav class="nav">
            <div class="menu">
                <a href="student-intern.php">HOME</a>
                <a href="#footer">ABOUT</a>
                <a href="contact.php">CONTACT US</a>
            </div>
    </nav>
</section>
    <!-- end nav -->

 <form action="" method="POST">
    <div class="fs-3 mt-3" align="center">
        <h1>EDIT INTERN STUDENT</h1> 
    </div>
    <div class="container shadow mb-5 mt-3 w-50 p-3">
    <div class="mb-3">
            <label for="ID" class="form-label">ID</label>
            <input disabled type="text"  class="form-control"  class="form-control" name="id" placeholder="ID" value="<?=$id ?>">
            <input type="hidden" name="id" placeholder="ID" value="<?=$id ?>">
    </div>
    <div class="mb-3">
        <label for="fullname" class="form-label">FULL NAME</label>
        <input type="text" class="form-control"  name="name" placeholder="FULL NAME" value="<?=$name ?>">
    </div>
    <div class="mb-3">
        <label for="phone" class="form-label">PHONE</label>
        <input type="text" class="form-control"  name="phone" placeholder="PHONE" value="<?=$phone ?>">
    </div>
    <div class="mb-3">
        <label for="cin" class="form-label">CIN</label>
        <input type="text" class="form-control"  name="cin" placeholder="CIN" value="<?=$cin ?>">
    </div>
    <div class="mb-3">
        <label for="ref" class="form-label">REF</label>        
        <input type="text" class="form-control"  name="ref" placeholder="REF" value="<?=$ref ?>">
    </div>
    <div class="mb-3">
        <label for="bookname" class="form-label">BOOK NAME</label>
        <input type="text" class="form-control"  name="bookname" placeholder="BOOK NAME" value="<?=$bookname ?>">
    </div>
    <div class="mb-3">
        <label for="ISSUEDDATE" class="form-label">ISSUED</label>
        <input type="date" class="form-control"   name="issueddate" value="<?=$issueddate ?>">
    </div>
    <div class="mb-3">
        <label for="expirydate" class="form-label">EXPIRY DATE</label>
        <input type="date" class="form-control"  name="expirydate" value="<?=$expirydate ?>">
    </div>
    <div class="mb-3">
        <label for="section" class="form-label">SECTION</label>
        <input type="text" class="form-control"  name="section" placeholder="SECTION" value="<?=$section ?>">
    </div>
    <div class=" d-flex justify-content-end">
        <div class="modal-footer">
            <a  href="student-intern.php" type="submit" class="pt-1 pb-2 btn btn-secondary rounded-0 me-3" >Close</a>
            <button type="submit" class="btn btn-success ps-4 pe-4 pt-2 border rounded-0" name="subb">UPDATE</button>
        </div>
    </div>
</div>
</form>





<!-- js -->
<script src="../js/bootstrap.bundle.min.js"></script>
<script src="../js/popper.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/script.js"></script>

</body>
</html>