<?php
class Bid {
  // (A) CONSTRUCTOR - CONNECT TO DATABASE
  private $pdo = null;
  private $stmt = null;
  public $error = "";
  function __construct () {
    $this->pdo = new PDO(
      "mysql:host=".DB_HOST.";dbname=".DB_NAME.";charset=".DB_CHARSET,
      DB_USER, DB_PASSWORD, [
      PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
      PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);
  }

  // (B) DESTRUCTOR - CLOSE DATABASE CONNECTION
  function __destruct () {
    if ($this->stmt!==null) { $this->stmt = null; }
    if ($this->pdo!==null) { $this->pdo = null; }
  }

  // (C) EXECUTE SQL QUERY
  function query ($sql, $data=null) {
    $this->stmt = $this->pdo->prepare($sql);
    $this->stmt->execute($data);
  }

  // (D) GET ITEM
  function getItem ($id) {
    // (D1) GET ITEM
    $this->query("SELECT * FROM `auction_items` WHERE `item_id`=?", [$id]);
    $item = $this->stmt->fetch();
    if (!is_array($item)) { return null; }

    // (D2) LAST HIGHEST BID + MINIMUM BID AMOUNT
    $this->query("SELECT MAX(`bid_amount`) FROM `auction_bids` WHERE `item_id`=?", [$id]);
    $item["highest"] = $this->stmt->fetchColumn();
    if (!is_numeric($item["highest"])) { $item["highest"] = 0; }
    $item["min"] = $item["highest"] + $item["bid_min"];

    // (D3) RETURN RESULT
    return $item;
  }

  // (E) UPDATE BID AMOUNT
  function setBid ($iid, $uid, $amount) {
    // (E1) CHECK IF ITEM EXIST
    $item = $this->getItem($iid);
    if ($item===null) {
      $this->error = "Invalid Item";
      return false;
    }

    // (E2) CHECK IF BIDDING ENDED
    if (isset($item["bid_end"]) && strtotime("now") >= strtotime($item["bid_end"])) {
      $this->error = "Bidding has ended";
      return false;
    }

    // (E3) CHECK MINIMUM BID AMOUNT
    if ($amount < $item["min"]) {
      $this->error = "Please bid at least " . $item["min"];
      return false;
    }

    // (E4) UPDATE HIGHEST BID
    $this->query(
      "REPLACE INTO `auction_bids` (`item_id`, `user_id`, `bid_amount`) VALUES (?,?,?)",
      [$iid, $uid, $amount]
    );
    return true;
  }
}

// (F) DATABASE SETTINGS - CHANGE TO YOUR OWN!
define("DB_HOST", "localhost");
define("DB_NAME", "user_form");
define("DB_CHARSET", "utf8");
define("DB_USER", "root");
define("DB_PASSWORD", "");

// (G) NEW TO-DO OBJECT
$_BID = new Bid();