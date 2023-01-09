<!--This page is for view deals-->
<!DOCTYPE html>

<head>
  <title>ManageLanka/UserHome</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="CSS/1.css">
  <link rel="stylesheet" href="CSS/2.css">
  <link rel="stylesheet" href="CSS/3.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <style media="screen">
    body {
      background-color: #cad2c5;
    }

    .div1 {
      border: 2px solid black;
      width: 470px;
      float: left;
      margin-left: 10px;
      padding-bottom: 15px;
      margin-top: 15px;
    }

    .div2 {
      width: 200px;
      border: 1px solid white;
      max-height: 150px;
      overflow: hidden;
      float: left;
      margin-top: 10px;
      margin-left: 10px;
      padding: 1px;
      font-size: 23px;
      font-weight: bold;
    }

    img {
      width: 220px;
      height: 160px;
      float: left;
      margin-left: 20px;
      margin-top: 10px;
    }

    .divmain {
      margin-left: 60px;
    }

    .div3 {
      float: left;
      margin-top: 10px;
      margin-right: 200px;

    }

    #label1 {
      font-size: 20px;
      font-weight: bold;
      margin-left: 60px;
    }

    #label2 {
      font-size: 20px;

      margin-left: 14px;
    }

    form {
      margin-top: -60px;
      float: right;
      margin-right: 55px;

    }

    #readfulldeals {
      font-size: 20px;

    }

    .buttonsub{
      background-color: #4CAF50;
      border: none;
      color: white;
      padding: 10px 32px;
      text-align: center;
      text-decoration: none;
      display:inline-block;
      font-size: 16px;
      margin: 4px 2px;
      cursor: pointer;
    
 ; 
    }
  </style>
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


  </form>
  <br><br>
  <div class="divmain">
    <?php
    include 'db.php';

    $sql = "SELECT * from deals order by id desc";
    $query = mysqli_query($conn, $sql);

    while ($info = mysqli_fetch_array($query)) {
      ?>

      <div class="div1" style="background-color:#fff">

        <div class="div2">
          <?php echo $info['deals']; ?>
        </div>

        <div class="div3">
          <label id="label1">
            <?php echo formatDate3($info['date']); ?>
          </label><br><br>
          <label id="label2"> <?php echo formatDate1($info['date']); ?></label>
          <label id="label2">
            <?php echo formatDate2($info['date']); ?>
          </label>

        </div>
        <form class="" action="fulldeals.php" method="post">
          <input type="text" name="id" value="<?php echo $info['id']; ?>" hidden>
          <a href="https://www.ubereats.com/lk" class="navBar-item buttonML">VIEW ON UBER EATS</a>
        </form>

      </div>

    <?php
    }

    ?>

  </div>

  <input type="button" class="buttonsub" value="Subscribe to recieve notifications!">
  </form>



  <script>
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
    function openForm() {
      document.getElementById("myForm").style.display = "block";
    }

    function closeForm() {
      document.getElementById("myForm").style.display = "none";
    }

  </script>

</body>

</html>