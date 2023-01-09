<!--E-trade user page-->
<?php
include 'con.php';
?>
<!doctype html>
<html>
    <head>
        <title> E-trade </title>
        <meta charset="UTF-8">
         <meta name="viewport" content="width=device-width, initial-scale=1">
       
    
  <link href="css/crudstyles.css" rel="stylesheet" type="text/css"/>
  <link rel="stylesheet" href="css/0-dummy.css">
  <link rel="stylesheet" href="CSS/1.css">
  <link rel="stylesheet" href="CSS/2.css">
  <link rel="stylesheet" href="CSS/3.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
    
 
    <body class="ml-margin ml-light-green">
  <header>
  <!-- Navigation bar with links -->
  <div class="navBar ml-dark-greenie blackText" style="max-width:100%">
    <a href="Home.html"><img src="Images/logo-removebg.png" class="left tagML ml-dark-greenie" width="200px"></a>
    <a href="user_page.php" class="ml-hide-small navBar-item buttonML ml-mobile ml-medium ml-right"
      style="margin-top:15px;">MUNICIPAL COUNCIL</a>
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
    <a href="user_page.php" class="navBar-item buttonML">MUNICIPAL COUNCIL</a>
  </div>
  <br>
  </header>
  <div class="ml-content" style="max-width:100%">

    <?php
    require "2-bid-lib.php";
    $iid = 1; 
    $uid = 33; 

    // (B) UPDATE BID AMOUNT
    if (isset($_POST["bid"])) {
      $ok = $_BID->setBid($iid, $uid, $_POST["bid"]);
      echo "<div class='note'>". ($ok ? "Bid saved" : $_BID->error) ."</div>";
    }

    // (C) GET ITEM & DISPLAY
    $item = $_BID->getItem($iid); ?>
    <center>
    <form method="post" class="bidWrap">
      <!-- (C1) ITEM DETAILS -->
      <p> THE WEEKLY BID! </p>
      <img class="bidImg" src="<?=$item["item_img"]?>">
      <div class="bidName"><?=$item["item_name"]?></div>
      <div class="bidHigh">Highest Bid $<?=sprintf("%0.2f", $item["highest"])?></div>
      <div class="bidDesc"><?=$item["item_desc"]?></div>


      
      <!-- (C2) BID -->
      <div class="bidAmt">
        <input type="number" name="bid" min="<?=$item["min"]?>" step="<?=$item["bid_min"]?>" value="<?=$item["min"]?>">
        <input type="submit" value="BID!">
      </div>
    </form>
    </center>
        <div class="container">
            <div class="left">
                <?php require 'menu.php'; ?>
            </div>
            <div class="right">
                <?php
                $query = "SELECT * from emp";
                $result = mysqli_query($link, $query);
                if (mysqli_num_rows($result) > 0) {
                    ?>
                    <br><br>

                    <h3 class="wording">ITEMS AVAILABLE FOR TRADE</h3>
                    <table class="emplist">
                        <p> Please notice the below items are for trade and not for sale.</p>
                       
                        <thead>
                            <tr>
                                <th>Contact Number</th>
                                <th>Product Description</th>
                                <th>Email</th>
                                <th>Product</th>
                              
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            while ($row = mysqli_fetch_assoc($result)) {
                                ?>
                                <tr>
                                    <td><?= $row['id'] ?></td>
                                    <td><?= $row['name'] ?></td>
                                    <td><?= $row['email'] ?></td>
                                    <td><img src="<?= $row['profilepic'] ?>" width="100" height="100"></td>
                                   
                                </tr>

                                <?php
                            }
                            ?>
                        </tbody>
                    </table>

                    <?php
                } else {
                    echo 'Record Not found';
                }
                ?>
            </div>
        </div>

      
  
   
            </body>


</html>




