<?php

include 'config.php';

if (isset($_POST['submit'])) {

   $name = $_POST['name'];
   $name = filter_var($name, FILTER_SANITIZE_STRING);
   $license = $_POST['license'];
   $license = filter_var($license, FILTER_SANITIZE_STRING);
   $email = $_POST['email'];
   $email = filter_var($email, FILTER_SANITIZE_STRING);
   $pass = md5($_POST['pass']);
   $pass = filter_var($pass, FILTER_SANITIZE_STRING);
   $cpass = md5($_POST['cpass']);
   $cpass = filter_var($cpass, FILTER_SANITIZE_STRING);

   $image = $_FILES['image']['name'];
   $image_tmp_name = $_FILES['image']['tmp_name'];
   $image_size = $_FILES['image']['size'];
   $image_folder = 'uploaded_img/' . $image;

   $select = $conn->prepare("SELECT * FROM `users` WHERE email = ?");
   $select->execute([$email]);

   if ($select->rowCount() > 0) {
      $message[] = 'user already exist!';
   } else {
      if ($pass != $cpass) {
         $message[] = 'confirm password not matched!';
      } elseif ($image_size > 2000000) {
         $message[] = 'image size is too large!';
      } else {
         $insert = $conn->prepare("INSERT INTO `users`(name,license, email, password, image) VALUES(?,?,?,?,?)");
         $insert->execute([$name, $license, $email, $cpass, $image]);
         if ($insert) {
            move_uploaded_file($image_tmp_name, $image_folder);
            $message[] = 'registered succesfully!';
            header('location:login.php');
         }
      }
   }

}

?>

<!DOCTYPE html>
<html lang="en">

<head>

   <title>ManageLanka/Register</title>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">

   <link rel="stylesheet" href="CSS/1.css">
   <link rel="stylesheet" href="CSS/2.css">
   <link rel="stylesheet" href="CSS/3.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   

<body class="ml-margin ml-light-green">

   <!-- Navigation bar with links -->
   <div class="navBar ml-dark-greenie blackText" style="max-width:100%">
      <a href="Home.html"><img src="Images/logo-removebg.png" class="left tagML ml-dark-greenie" width="200px"></a>
      <a href="login.php" class="ml-hide-small navBar-item buttonML ml-mobile ml-medium ml-right"
         style="margin-top:15px;">LOGIN/REGISTER</a>
      <a href="ContactUs.html" class="ml-hide-small navBar-item buttonML ml-mobile ml-medium ml-right"
         style="margin-top:15px;">CONTACT US</a>
      <a href="About Us.html" class="ml-hide-small navBar-item buttonML ml-mobile ml-medium ml-right"
         style="margin-top:15px;">ABOUT US</a>
      <a href="#Home" class="ml-hide-small navBar-item buttonML ml-mobile ml-medium ml-right"
         style="margin-top:15px;">HOME</a>
      <a href="javascript:void(0)" class="navBar-item buttonML ml-right ml-hide-medium ml-hide-large"
         style="margin-top:15px;" onclick="myFunction()"> &#9776;</a>
   </div>

   <div id="demo" class="navBar-block whiteBg ml-hide ml-hide-large ml-small">
      <a href="#Home" class="navBar-item buttonML">HOME</a>
      <a href="About Us.html" class="navBar-item buttonML">ABOUT US</a>
      <a href="ContactUs.html" class="navBar-item buttonML">CONTACT US</a>
      <a href="login.php" class="navBar-item buttonML">LOGIN/REGISTER</a>
   </div>
   <br>

   

   </head>

   <body>


      <?php
      if (isset($message)) {
         foreach ($message as $message) {
            echo '
         <div class="message">
            <span>' . $message . '</span>
            <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
         </div>
         ';
         }
      }
      ?>

<div class="ml-content" style="max-width:800px">
<div class="whiteBg" id="Contact" style="border:1mm inset black">
        <div class="ml-container ml-padding-40-16">
            <div class="ml-center ml-padding-40-16">
                <h2 class="ml-wide">REGISTER NOW</h2>
                <p class="ml-opacity"><i></i></p><br>
                
            </div>

         <form action="" method="post" enctype="multipart/form-data" class="ml-center">
            
            <input type="text" required placeholder="enter your username" class="box" name="name"><br><br>
            <input type="email" required placeholder="enter your email" class="box" name="email"><br><br>
            <input type="password" required placeholder="enter your password" class="box" name="pass"><br><br>
            <input type="password" required placeholder="confirm your password" class="box" name="cpass"><br><br>
            <input type="file" name="image" required class="box" accept="image/jpg, image/png, image/jpeg">
            <p>already have an account? <a href="login.php" class="ml-text-red">login now</a></p>
            <input type="submit" value="register now" class="buttonML roundBorder ml-pale-green" name="submit">
         </form>
   </div>
   </div>
   </div>
      
      <!-- Footer. This section contains an ad for social media accounts of managelanka. -->
      <footer class="ml-container ml-dark-greenie ml-center ml-margin-top">
        <p>Find us on social media.</p>
        <i class="fa fa-facebook-official ml-hover-opacity"></i>
        <i class="fa fa-instagram ml-hover-opacity"></i>
        <i class="fa fa-snapchat ml-hover-opacity"></i>
        <i class="fa fa-pinterest-p ml-hover-opacity"></i>
        <i class="fa fa-twitter ml-hover-opacity"></i>
        <i class="fa fa-linkedin ml-hover-opacity"></i>
        <br><br>
        <div class="ml-row-padding ml-footer" style="float:left;width: 100%;">
          <div class="ml-third left-align ml-hide-small">
            <a href="Home.html"><img src="Images/logo-removebg.png" class="left tagML ml-dark-greenie"
                width="180px"></a>
          </div>
          <div class="ml-third">
            <i><a href="About Us.html">ABOUT US</a><br>
              <a href="privacyPolicy.html">PRIVACY POLICY</a><br>
              <a href="faq.html">FAQ</a></i>
          </div>
          <div class="ml-third ">
            <i><a
                href="https://www.google.com/maps/place/Indian+Bank/@6.9364406,79.8281313,15z/data=!4m10!1m2!2m1!1sIndian+Bank+near+Fort,+Colombo!3m6!1s0x3ae25926b85d1b33:0x42d616e056bd9173!8m2!3d6.9364406!4d79.8456408!15sCh5JbmRpYW4gQmFuayBuZWFyIEZvcnQsIENvbG9tYm8iA4gBAZIBBGJhbmvgAQA!16s%2Fg%2F11b_004t3b">
                LOCATE US
              </a></i>
          </div>
        </div>
        <br><br><br>
        <h6>&reg; 2022 Magma. All rights reserved. The ManageLanka name, logos, and related marks are trademarks of
          Magma.</h6>
  

   </body>

</html>