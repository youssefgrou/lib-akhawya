<?php 
include("conn.php");
$bdd=new PDO('mysql:host=localhost;dbname=lib', 'root','');
?>
<!DOCTYPE html>
<html >
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/studentpage.css?<?=time() ?>">
    <title>Library book Al Akhawayn</title>
</head>
<body>
<section>
    <nav class="nav">
        <div class="menu">
            <a href="../visitor.php">VISITOR</a> 
            <a href="../admin.php" class="admin">ADMIN</a>
            <a href="contact.php">CONTACT US</a>
        </div>
    </nav>
</section>
<!--  -->
<section id="books">
    <div class="desc">
        <h1>Please select which type of student !</h1>
    </div>
    <div class="grid-btn">
        <a href="student-intern.php">STUDENT INTERN</a>
        <a href="student-extern.php">STUDENT EXTERN</a>
    </div>
</section>


    <!-- ------------JS-------------- -->
    <script src="../js/script.js"></script>
</body>
</html>
