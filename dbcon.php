<!--Databse connection for scheduling/bulk truck ordering databse-->
<?php

$con = mysqli_connect("localhost","root","","user_form");

if(!$con){
    die('Connection Failed'. mysqli_connect_error());
}

?>

