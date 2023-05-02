<?php
include("phps/conn.php");
$msg='';


if (isset($_POST['sub'])) {
    
    $username = $_POST['username'];
    $password = $_POST['password'];

    $req = "select * FROM user where username='$username' and password = '$password'";

    $st = $db->prepare($req);
    $st->execute();

    $res = $st->fetchAll(PDO::FETCH_OBJ);


    if (count($res)>0) {
         session_start();
        $_SESSION['username'] = $username;
        $_SESSION['password'] = $password;

        header('Location:admin.php');
    } else {
        $msg= '<p class="error">Invalid username or password</p>';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/login.css?<?=time()?>">
    <title>LOGIN PAGE</title>
</head>
<body>

<div class="header"></div>
<form id="container" action="login.php" method="post">
    
    <div class="logoo">
        <img src="img/logo.png" alt="">
    </div>
    
    <div class="formul">
        <div class="form-group">
        
            <div class="errorr">
                <?=$msg ?>
            </div>
   
            <label>User Name</label><br>
            <input type="text" name="username" id="username" placeholder="USERNAME">
        </div>
        <div class="form-group">
            <label>Password</label><br>
            <input type="password" name="password" id="password" placeholder="PASSWORD">
        </div>
    </div><br>
     <!-- background -->
    <div id="test">
        <input type="file" id="bg-image-input" class="custom-file-input" onchange="getBgImageUrl()">
    </div>
    <!-- ---------- -->
    <button name="sub" class="btn">ACCESS</button>
    
</form>
    



	<script> 
        let input = document.getElementById("bg-image-input");
        let header = document.querySelector(".header");

        let imgurl = localStorage.getItem("imageUrl");
        if(imgurl !== null) {
            header.style.backgroundImage = "url('" + imgurl + "')";
        }


        function getBgImageUrl() {
        
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = function (e) {
            const imageUrl = e.target.result;

            header.style.backgroundImage = "url('" + imageUrl + "')";
            localStorage.clear()
            localStorage.setItem("imageUrl",imageUrl) 
            console.log(imageUrl);
            // Do something with the image URL
            }
            reader.readAsDataURL(input.files[0]);
        }
        }

	</script>

</body>
</html>
