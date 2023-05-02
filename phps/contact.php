<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/contact.css?<?=time()?>">
    <title>CONTACT US</title>
</head>

<body>
    <section id="nav">
        <nav class="nav">
            <div class="menu">
                <a href="../admin.php">ADMIN</a>
                <a href="../index.php">HOME</a>
            </div>
        </nav>
    </section>
    <section id="header">
        <div class="sidleft">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d26637.219814880045!2d-5.261109584375004!3d33.43230359999999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xda1c5aa3bde8093%3A0xd2118653e3a0c023!2sCentre%20d&#39;Azrou%20pour%20le%20D%C3%A9veloppement%20Communautaire!5e0!3m2!1sen!2sma!4v1679321500198!5m2!1sen!2sma"
                width="650" height="450" style="border:none" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
        <div class="sidright">
            <form action="sendemail.php" method="POST">
                <h1>HOW CAN WE HELP ?</h1>
                <div class="form-group">
                    <div class="form-rows1">
                        <label>FIRST NAME</label><br>
                        <input name="firstname" type="text" class="too" id="firstname" required>
                    </div>
                    <div class="form-rows2">
                        <label>LAST NAME</label><br>
                        <input name="lastname" type="text" class="too" id="lastname" required>
                    </div>
                </div>
                <div class="form-email">
                    <label>EMAIL</label>
                    <input  name="email" type="email" required>
                </div>
                <div class="form-text">
                    <label>MESSAGE</label><br>
                    <textarea name="message" cols="30" rows="5" class="too"></textarea>
                </div>
                <button class="btn" type="submit">Send</button>
            </form>
        </div>
    </section>


</body>

</html>