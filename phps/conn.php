<?php
define("DBHOST","localhost");
define("DBUSERNAME","root");
define("DBPASSWORD","");
define("DB","lib");
$conn = mysqli_connect(DBHOST,DBUSERNAME,DBPASSWORD,DB);
$db=new PDO('mysql:host=localhost;dbname=lib','root','');
?>
