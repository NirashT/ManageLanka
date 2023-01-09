
<!--This page is for deals upload-->
<!DOCTYPE html>

<head>
  <title>ManageLanka/UserHome</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="CSS/1.css">
  <link rel="stylesheet" href="CSS/2.css">
  <link rel="stylesheet" href="CSS/3.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

<body class="ml-margin ml-light-green">

  <!-- Navigation bar with links -->
  <div class="navBar ml-dark-greenie blackText" style="max-width:100%">
    <a href="Home.html"><img src="Images/logo-removebg.png" class="left tagML ml-dark-greenie" width="200px"></a>
    <a href="user_page.php" class="ml-hide-small navBar-item buttonML ml-mobile ml-medium ml-right"
      style="margin-top:15px;">USER</a>
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
    <a href="user_page.php" class="navBar-item buttonML">USER</a>
  </div>
  <br>
  <!--Slide show-->
  <div class="ml-content ml-section" style="max-width: 1500px;">
    <img class="mySlides ml-image" src="Images/s1.jpeg" style="width:100%">
    <img class="mySlides ml-image" src="Images/s2.jpeg" style="width:100%">
    <img class="mySlides ml-image" src="Images/s3.jpeg" style="width:100%">
    <img class="mySlides ml-image" src="Images/s4.jpeg" style="width:100%">
    <img class="mySlides ml-image" src="Images/s5.jpeg" style="width:100%">
  </div>

  <div class="ml-content ml-center" style="max-width:1600px">
    <form class="" action="dealsandoffers.php" method="post" enctype="multipart/form-data">
      <textarea name="deals" rows="8" cols="80"
        placeholder="Enter Restaurant name:&#10;Enter details:&#10;Enter coupon code:&#10;Uber Eats link:"
        required></textarea><br><br>

      <input type="submit" name="submit" value="Submit" class="buttonML roundBorder ml-pale-green ml-block">

    </form>
    <?php
    include 'db.php';

    if (isset($_POST['submit'])) {
      $deals = $_POST['deals'];




      $sql = "INSERT INTO deals(deals) values('$deals')";
      $query = mysqli_query($conn, $sql);

    }


    ?>

  </div>


  <p><a href="notifications.php"><button class="buttonML roundBorder ml-pale-green ml-block">Send
        notifications</button></a></p>















  <!--footer-->

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
        <a href="Home.html"><img src="Images/logo-removebg.png" class="left tagML ml-dark-greenie" width="180px"></a>
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
    <h6>&reg; 2022 Magma. All rights reserved. The ManageLanka name, logos, and related marks are trademarks of Magma.
    </h6>
  </footer>

  <script>
    function myFunction() {
      var x = document.getElementById("demo");
      if (x.className.indexOf("ml-show") == -1) {
        x.className += " ml-show";
      } else {
        x.className = x.className.replace(" ml-show", "");
      }
    }

    var myIndex = 0;
    carousel();

    function carousel() {
      var i;
      var x = document.getElementsByClassName("mySlides");
      for (i = 0; i < x.length; i++) {
        x[i].style.display = "none";
      }
      myIndex++;
      if (myIndex > x.length) { myIndex = 1 }
      x[myIndex - 1].style.display = "block";
      setTimeout(carousel, 4000); // Change image every 2 seconds
    }


  </script>

</body>

</html>