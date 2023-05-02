<?php include("conn.php");
$msg="";

$ref='';
$booksname='';
$authorname='';
$dept='';


if (isset($_GET['updateid'])) {
    $id = $_GET['updateid'];
    $req = "select * from book where b_id = '$id'";
    $st = $db->prepare($req);
    $st->execute();
    $res = $st->fetchAll(PDO::FETCH_OBJ);

    if (count($res)>0) {
        $res = $res[0];
        $ref= $res->b_id ;
        $booksname=$res->booksname;
        $authorname=$res->authorname;
        $dept=$res->dept;
    }
}
if(isset($_POST['subb']))
{
    $ref=$_POST['b_id'];
    $booksname=$_POST['booksname'];
    $authorname=$_POST['authorname'];
    $dept=$_POST['dept'];

    $sql="UPDATE book SET booksname ='$booksname', authorname = '$authorname',
    dept = '$dept'  WHERE b_id ='$ref'"; 
    $st = $db->prepare($sql);
    $res = $st->execute();

    if ($res) {
        header('location:../admin.php');
    }else {
        echo 'xxxxxxxxxx';
    }
}
?>
<!DOCTYPE html>
<html lang="en-ar">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="../css/bootstrap-5.min.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">

    <link rel="stylesheet" href="../css/edit.css?x=<?=time()?>">
    <link rel="stylesheet" href="../font-awesome/css/font-awesome.min.css">
    <title>EDIT BOOK</title>
</head>

<body> 
     <!------ -----NAV---------- -->
    <section>
        <nav class="nav">
            <div class="menu">
                <a href="../admin.php">HOME</a>
                <a href="#footer">ABOUT</a>
                <a href="#books">BOOKS</a>
                <a href="contact.php">CONTACT US</a>
            </div>
        </nav>
    </section>
  
   
    <section id="books" align="center">
            <div class="fs-3 mt-3">
                <h1>UPDATE BOOK</h1> 
            </div>
            <div class="our-book btn btn-primary  rounded-3">
                <a href="../admin.php">Our Books</a>
            </div>
    </section>
    <!-- edit book -->
   
<form action="" method="POST">
   
<div class="container shadow mb-5 mt-3 w-50 p-3">
    <div class="form-group">
            <label for="REF" class="form-label">REF</label>
            <input class="form-control"  disabled type="text" name="x" placeholder="books Ref" value="<?=$ref ?>"/>
            <input class="form-control"   type="hidden" name="b_id" placeholder="REF" value="<?=$ref ?>"/>
    </div>
    <div class="form-group">
        <label for="fullname" class="form-label">BOOK NAME</label>
        <input class="form-control" type="text" name="booksname" placeholder="BOOK NAME" value="<?=$booksname ?>"/>
    </div>
    <div class=" mb-3 form-group">
        <label for="phone" class="form-label">AUTHOR NAME</label>
        <input class="form-control" type="text" name="authorname" placeholder="AUTHOR NAME"  value="<?=$authorname ?>"/>
    </div>
    <div class="form-group  mb-3 ">
        <label for="cin" class="form-label">DEPARTEMENT</label>
        <select class="form-control" name="dept" id="dp" class="departement" >
            <option value="Social Sciences">Social Sciences</option>
            <option value="Politique Sciences">Politique Sciences</option>
            <option value="Law">Law</option>
            <option value="Health">Health</option>
            <option value="Theory & Practice">Theory & Pratique </option>
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
    </div>
    
    <div class=" d-flex justify-content-end">
        <div class="modal-footer">
            <a  href="../admin.php" type="submit" class="pt-1 pb-2 btn btn-secondary rounded-0 me-3" >Close</a>
            <button type="submit" class="btn btn-success ps-4 pe-4 pt-2 border rounded-0" name="subb">UPDATE</button>
        </div>
    </div>
</div>
</form>

<?php
    include ("footer.html") 
?>



<!-- js -->
<script src="../js/bootstrap.bundle.min.js"></script>
<script src="../js/popper.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/script.js"></script>

</body>

</html>