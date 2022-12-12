<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Insert News</title>
    <link rel="stylesheet" href="CSS/1.css">
  <link rel="stylesheet" href="CSS/2.css">
  <link rel="stylesheet" href="CSS/3.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
  </head>
  <body class="ml-margin ml-light-green">
  <header>
    <!-- Navigation bar with links -->
    <div class="navBar ml-dark-greenie blackText" style="max-width:100%">
      <a href="#Main"><img src="Images/logo-removebg.png" class="left tagML ml-dark-greenie" width="200px"></a>
      <a href="user_page.php" class="ml-hide-small navBar-item buttonML ml-mobile ml-medium ml-right"
        style="margin-top:15px;">COMPANY</a>
      <a href="ContactUs.html" class="ml-hide-small navBar-item buttonML ml-mobile ml-medium ml-right"
        style="margin-top:15px;">CONTACT US</a>
      <a href="About Us.html" class="ml-hide-small navBar-item buttonML ml-mobile ml-medium ml-right"
        style="margin-top:15px;">ABOUT US</a>
      <a href="#Main" class="ml-hide-small navBar-item buttonML ml-mobile ml-medium ml-right"
        style="margin-top:15px;">HOME</a>
      <a href="javascript:void(0)" class="navBar-item buttonML ml-right ml-hide-medium ml-hide-large"
        style="margin-top:15px;" onclick="myFunction()"> &#9776;</a>
    </div>

    <div id="demo" class="navBar-block whiteBg ml-hide ml-hide-large ml-small">
      <a href="#Main" class="navBar-item buttonML">HOME</a>
      <a href="About Us.html" class="navBar-item buttonML">ABOUT US</a>
      <a href="ContactUs.html" class="navBar-item buttonML">CONTACT US</a>
      <a href="user_page.php" class="navBar-item buttonML">COMPANY</a>
    </div>
    <br>
  </header>
    
  <div class="ml-content ml-center" style="max-width:1600px">
      <form class="" action="insert.php" method="post" enctype="multipart/form-data">
        <textarea name="news" rows="20" cols="80" placeholder="Upload Advertisment" required></textarea><br><br>
        <input type="file" name="image" value="" required ><br><br>
        <input type="submit" name="submit" value="Submit" class="buttonML roundBorder ml-pale-green ml-block">

      </form>
      <?php
      include 'db.php';

      if (isset($_POST['submit'])) {
        $news=$_POST['news'];
        $image=$_FILES['image']['name'];
        $image_type=$_FILES['image']['type'];
        $image_size=$_FILES['image']['size'];
        $image_tem_loc=$_FILES['image']['tmp_name'];
        $image_store="image/".$image;

        move_uploaded_file($image_tem_loc,$image_store);

        $sql="INSERT INTO news(news,image) values('$news','$image')";
        $query=mysqli_query($conn,$sql);

      }


       ?>

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
      </footer>
  </body>
</html>