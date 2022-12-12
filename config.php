<!--Databse connection for users-login/registration databse -->
<?php

$db_name = "mysql:host=localhost;dbname=user_form";
$username = "root";
$password = "";

$conn = new PDO($db_name, $username, $password);

?>