<!DOCTYPE html>
<html>
  <head>
    <title>Bidding Page Demo</title>
    <link rel="stylesheet" href="0-dummy.css">
  </head>
  <body>
    <?php
    // (A) LOAD LIBRARY
    require "2-bid-lib.php";
    $iid = 1; // fixed item id for this demo
    $uid = 999; // fixed user id for this demo

    // (B) UPDATE BID AMOUNT
    if (isset($_POST["bid"])) {
      $ok = $_BID->setBid($iid, $uid, $_POST["bid"]);
      echo "<div class='note'>". ($ok ? "Bid saved" : $_BID->error) ."</div>";
    }

    // (C) GET ITEM & DISPLAY
  
    $item = $_BID->getItem($iid); ?>
    <form method="post" class="bidWrap">
   
      <!-- (C2) BID -->
      <div class="bidAmt">
        <input type="number" name="bid" min="<?=$item["min"]?>" step="<?=$item["bid_min"]?>" value="<?=$item["min"]?>">
        <input type="submit" value="BID!">
      </div>
    </form>
  </body>
</html>